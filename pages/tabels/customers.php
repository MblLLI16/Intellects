<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="form">
        <div class="heading-menu">
            <span><strong>Таблица</strong></span>
        </div>

        <div class="table">
            <table id="customersTable">
                <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>Passport Number</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Patronymic</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>

        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary mt-3 custom-btn"
                    onclick='insertRow($("#eventName1").val(), $("#eventName2").val(), $("#eventName3").val(), $("#eventName4").val())'
                    id="create-event-btn-cash">Добавить</button>
            </div>
        </div>
        <div class="elements">
        <div class="err" id="error-message"></div>
            <div class="form-group">
                <input type="number" class="form-control" id="eventName1" name="passport_number"
                    placeholder="passport_number" required min="1" >
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="eventName2" name="last_name" placeholder="last_name"
                    required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="eventName3" name="first_name" placeholder="first_name"
                    required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="eventName4" name="patronymic" placeholder="patronymic"
                    required>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Load the data from the server and populate the table
            $.ajax({
                url: "./php/select_customers_fromDb.php",
                dataType: "json",
                success: function (data) {
                    $.each(data, function (index, item) {
                        var row = $("<tr><td>" + item.ClientID + "</td><td>" + item.passport_number + "</td><td>" + item.last_name + "</td><td>" + item.first_name + "</td><td>" + item.patronymic + "</td><td><button onclick='deleteRow(" + item.ClientID + ")'>Delete</button></td> <td><button onclick='updRow(" + item.ClientID + ")'>Update</button></td></tr>");
                        $("#customersTable tbody").append(row);
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
        function deleteRow(ClientID) {
            // Send an AJAX request to the delete.php script
            $.ajax({
                url: "./php/del_customers.php",
                method: "POST",
                data: { ClientID: ClientID },
                success: function (response) {
                    // Reload the table after the row is deleted
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        function updRow(ClientID) {
            // Get the values of the input fields
            var passport_number = $("input[name='passport_number']").val();
            var last_name = $("input[name='last_name']").val();
            var first_name = $("input[name='first_name']").val();
            var patronymic = $("input[name='patronymic']").val();
            // Check correct input
            if (checkInpt(passport_number, last_name, first_name, patronymic) === true) {
                // Send an AJAX request to the upd_customers.php script
                console.log("Updating row with ClientID " + ClientID);
                $.ajax({
                    url: "./php/upd_customers.php",
                    method: "POST",
                    data: {
                        ClientID: ClientID,
                        passport_number: passport_number,
                        last_name: last_name,
                        first_name: first_name,
                        patronymic: patronymic
                    },
                    success: function (response) {
                        // Reload the table after the row is updated
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $("#error-message").text("Введите корректные значения.")
            }
        }


        function insertRow(passport_number, last_name, first_name, patronymic) {
            // Check correct input
            if (checkInpt(passport_number, last_name, first_name, patronymic) === true) {
                // Send an AJAX request to the delete.php script
                $.ajax({
                    url: "./php/ins_customers.php",
                    method: "POST",
                    data: {
                        passport_number: passport_number,
                        last_name: last_name,
                        first_name: first_name,
                        patronymic: patronymic
                    },
                    success: function (response) {
                        // Reload the table after the row is deleted
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $("#error-message").text("Введите корректные значения.")
            }
        }

        function checkPassportNumber(input) {
            if (input.value < input.min) input.value = input.min;
        }

        function checkInpt(passport_number, last_name, first_name, patronymic) {
            if (passport_number === "" || last_name === "" || first_name === "" || patronymic === "") {
                return false; // or you could do something else if the input is invalid
            } else {//добавить других проверок ввода, вроде минимального значения
                return true; // or you could do something else if the input is valid
            }
        }

    </script>

</body>

</html>