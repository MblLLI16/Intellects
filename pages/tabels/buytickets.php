<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy tickets</title>
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
            <table id="buyTicketTable">
                <thead>
                    <tr>
                        <th>BuyTicketID</th>
                        <th>Pass_number</th>
                        <th>CompanyID</th>
                        <th>CashierID</th>
                        <th>TicketID</th>
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
                    onclick='insertRow($("#passNumber").val(), $("#companyID").val(), $("#cashierID").val(), $("#ticketID").val())'
                    id="create-buyTicket-btn">Добавить</button>
            </div>
        </div>

        <div class="elements">
            <div class="err" id="error-message"></div>
            <div class="form-group">
                <input type="number" class="form-control" id="passNumber" name="passNumber"
                    placeholder="Passport Number">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="companyID" name="companyID" placeholder="Company ID">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="cashierID" name="cashierID" placeholder="Cashier ID">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="ticketID" name="ticketID" placeholder="Ticket ID">
            </div>
        </div>




        <script>
            $(document).ready(function () {
                // Load the data from the server and populate the table
                $.ajax({
                    url: "./php/select_buytickets_fromDb.php",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (index, item) {
                            var row = $("<tr><td>" + item.BuyTicketID + "</td><td>" + item.Pass_number + "</td><td>" + item.CompanyID + "</td><td>" + item.CashierID + "</td><td>" + item.TicketID + "</td><td><button onclick='deleteRow(" + item.BuyTicketID + ")'>Delete</button></td> <td><button onclick='updRow(" + item.BuyTicketID + ")'>Update</button></td></tr>");
                            $("#buyTicketTable tbody").append(row);
                        });
                    },

                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });


            function deleteRow(buyTicketID) {
                // Send an AJAX request to the del_buyticket.php script
                $.ajax({
                    url: "./php/del_buyticket.php",
                    method: "POST",
                    data: { buyTicketID: buyTicketID },
                    success: function (response) {
                        // Reload the table after the row is deleted
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }



            function updRow(buyTicketID) {
                var passNumber = $("#passNumber").val();
                var companyID = $("#companyID").val();
                var cashierID = $("#cashierID").val();
                var ticketID = $("#ticketID").val();
                if (checkInpt(passNumber, companyID, cashierID, ticketID) === true) {
                    console.log("Updating BuyTicket with ID " + buyTicketID);
                    $.ajax({
                        url: "./php/upd_buytickets.php",
                        method: "POST",
                        data: {
                            buyTicketID: buyTicketID,
                            passNumber: passNumber,
                            companyID: companyID,
                            cashierID: cashierID,
                            ticketID: ticketID
                        },
                        success: function (response) {
                            // Reload the table after the row is updated
                            if (response.startsWith("Error updating record:")) {
                                $("#error-message").text("Один или более из введенных ID не существуют");
                            } else {
                                location.reload();
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $("#error-message").text("Введите корректные значения.");
                }
            }





            function insertRow(passNumber, companyID, cashierID, ticketID) {
                // Check correct input
                if (checkInpt(passNumber, companyID, cashierID, ticketID)) {
                    // Send an AJAX request to the ins_buytickets.php script
                    $.ajax({
                        url: "./php/ins_buytickets.php",
                        method: "POST",
                        data: {
                            passNumber: passNumber,
                            companyID: companyID,
                            cashierID: cashierID,
                            ticketID: ticketID
                        },
                        success: function (response) {
                            // Reload the table after the row is inserted
                            if (response.startsWith("Error inserting record:")) {
                                $("#error-message").text("Один или более из введенных ID не существуют");
                            } else {
                                // Reload the table after the row is inserted
                                location.reload();
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $("#error-message").text("Введите корректные значения.")
                }
            }




            function checkInpt(passNumber, companyID, cashierID, ticketID) {
                if (passNumber === "" || companyID === "" || cashierID === "" || ticketID === "") {
                    return false;
                } else {
                    return true;
                }
            }


        </script>

</body>

</html>