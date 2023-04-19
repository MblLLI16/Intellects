<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash</title>
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
            <table id="cashTable">
                <thead>
                    <tr>
                        <th>Cash ID</th>
                        <th>Address</th>
                        <th>Cash_number</th>
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
                <input type="text" class="form-control" id="eventName1" name="cash_address" placeholder="Address">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="eventName2" name="cash_number" placeholder="Cash Number"
                    required>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                // Load the data from the server and populate the table
                $.ajax({
                    url: "./php/select_cash_fromDb.php",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (index, item) {
                            var row = $("<tr><td>" + item.CashID + "</td><td>" + item.Address + "</td><td>" + item.Cash_number + "</td><td><button onclick='deleteRow(" + item.CashID + ")'>Delete</button></td> <td><button onclick='updRow(" + item.CashID + ")'>Update</button></td></tr>");
                            $("#cashTable tbody").append(row);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
            function deleteRow(cashID) {
                // Send an AJAX request to the delete.php script
                $.ajax({
                    url: "./php/del_cash.php",
                    method: "POST",
                    data: { cashID: cashID },
                    success: function (response) {
                        // Reload the table after the row is deleted
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            function updRow(cashID) {
                var address = $("input[name='cash_address']").val();
                var cash_number = $("input[name='cash_number']").val();
                if (checkInpt(address, cash_number) === true) {
                    console.log("Updating row with ID " + cashID);
                    $.ajax({
                        url: "./php/upd_cash.php",
                        method: "POST",
                        data: {
                            cashID: cashID,
                            address: address,
                            cash_number: cash_number
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


            function insertRow(address, cash_number) {
                // Check correct input
                if (checkInpt(address, cash_number)) {
                    // Send an AJAX request to the ins_cash.php script
                    $.ajax({
                        url: "./php/ins_cash.php",
                        method: "POST",
                        data: {
                            address: address,
                            cash_number: cash_number
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


            function checkInpt(address, cash_number) {
                if (address === "" || cash_number === "" || isNaN(cash_number)) {
                    return false;
                } else {
                    return true;
                }
            }


        </script>

</body>

</html>