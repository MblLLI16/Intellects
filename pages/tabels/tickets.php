<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
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
            <table id="ticketTable">
                <thead>
                    <tr>
                        <th>Ticket_code</th>
                        <th>CouponID</th>
                        <th>Date_of_sale</th>
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
                    onclick='insertRow($("#couponID").val(), $("#dateOfSale").val())'
                    id="create-ticket-btn">Добавить</button>
            </div>
        </div>

        <div class="elements">
            <div class="err" id="error-message"></div>
            <div class="form-group">
                <input type="text" class="form-control" id="couponID" name="coupon_id" placeholder="Coupon ID">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="dateOfSale" name="date_of_sale" placeholder="Date of Sale"
                    required>
            </div>
        </div>



        <script>
            $(document).ready(function () {
                // Load the data from the server and populate the table
                $.ajax({
                    url: "./php/select_tickets_fromDb.php",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (index, item) {
                            var row = $("<tr><td>" + item.Ticket_code + "</td><td>" + item.CouponID + "</td><td>" + item.Date_of_sale + "</td><td><button onclick='deleteRow(" + item.TicketID + ")'>Delete</button></td> <td><button onclick='updRow(" + item.TicketID + ")'>Update</button></td></tr>");
                            $("#ticketTable tbody").append(row);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            function deleteRow(ticketCode) {
                // Send an AJAX request to the del_tickets.php script
                $.ajax({
                    url: "./php/del_tickets.php",
                    method: "POST",
                    data: { ticketCode: ticketCode },
                    success: function (response) {
                        // Reload the table after the row is deleted
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function updRow(ticketCode) {
                var couponID = $("input[name='coupon_id']").val();
                var dateOfSale = $("input[name='date_of_sale']").val();
                if (checkInpt(couponID, dateOfSale) === true) {
                    console.log("Updating row with ID " + ticketCode);
                    $.ajax({
                        url: "./php/upd_tickets.php",
                        method: "POST",
                        data: {
                            ticketCode: ticketCode,
                            couponID: couponID,
                            dateOfSale: dateOfSale,
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

            function insertRow(couponID, date_of_sale) {
                // Check correct input
                if (checkInpt(couponID, date_of_sale)) {
                    // Send an AJAX request to the ins_tickets.php script
                    $.ajax({
                        url: "./php/ins_tickets.php",
                        method: "POST",
                        data: {
                            couponID: couponID,
                            date_of_sale: date_of_sale
                        },
                        success: function (response) {
                            // Reload the table after the row is inserted
                            if (response.startsWith("Error inserting record:")) {
                                $("#error-message").text("Введенный CuponID не существует в coupon table");
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



            function checkInpt(couponID, date_of_sale) {
                if (couponID === "" || date_of_sale === "") {
                    return false;
                } else {
                    return true;
                }
            }


        </script>

</body>

</html>