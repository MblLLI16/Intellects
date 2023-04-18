<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airlines</title>
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
            <table id="airlineTable">
                <thead>
                    <tr>
                        <th>Airline ID</th>
                        <th>Name</th>
                        <th>Address</th>
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
                    onclick='insertRow($("#eventName1").val(), $("#eventName2").val())'
                    id="create-event-btn-cash">Добавить</button>
            </div>
        </div>
        <div class="elements">
            <div class="err" id="error-message"></div>
            <div class="form-group">
                <input type="text" class="form-control" id="eventName1" name="airline_name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="eventName2" name="airline_address" placeholder="Address"
                    required>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Load the data from the server and populate the table
            $.ajax({
                url: "./php/select_airline_fromDb.php",
                dataType: "json",
                success: function (data) {
                    $.each(data, function (index, item) {
                        var row = $("<tr><td>" + item.ID + "</td><td>" + item.Name + "</td><td>" + item.Address + "</td><td><button onclick='deleteRow(" + item.ID + ")'>Delete</button></td> <td><button onclick='updRow(" + item.ID + ")'>Update</button></td></tr>");
                        $("#airlineTable tbody").append(row);
                    });

                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
        function deleteRow(ID) {
            // Send an AJAX request to the delete.php script
            $.ajax({
                url: "./php/del_airlines.php",
                method: "POST",
                data: { ID: ID },
                success: function (response) {
                    // Reload the table after the row is deleted
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        function updRow(id) {
            var name = $("input[name='airline_name']").val();
            var address = $("input[name='airline_address']").val();
            if (checkInpt(name, address) === true) {
                console.log("Updating row with ID " + id);
                $.ajax({
                    url: "./php/upd_airlines.php",
                    method: "POST",
                    data: {
                        id: id,
                        name: name,
                        address: address
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $("#error-message").text("Введите корректные значения.");
            }
        }


        function insertRow(name, address) {
            // Check correct input
            if (checkInpt(name, address)) {
                // Send an AJAX request to the ins_airline.php script
                $.ajax({
                    url: "./php/ins_airlines.php",
                    method: "POST",
                    data: {
                        name: name,
                        address: address
                    },
                    success: function (response) {
                        // Reload the table after the row is inserted
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


        function checkInpt(name, address) {
            if (name === "" || address === "") {
                return false;
            } else {
                return true;
            }
        }


    </script>

</body>

</html>