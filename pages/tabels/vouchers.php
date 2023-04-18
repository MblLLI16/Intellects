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
            <table id="couponTable">
                <thead>
                    <tr>
                        <th>Coupon ID</th>
                        <th>Type</th>
                        <th>Ticket Price</th>
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
                    onclick='insertRow($("#couponType").val(), $("#couponPrice").val())'
                    id="create-coupon-btn">Добавить</button>
            </div>
        </div>

        <div class="elements">
            <div class="err" id="error-message"></div>
            <div class="form-group">
                <input type="text" class="form-control" id="couponType" name="Type" placeholder="Type">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="couponPrice" name="Ticket Price" placeholder="Ticket Price"
                    required>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Load the data from the server and populate the table
            $.ajax({
                url: "./php/select_coupons_fromDb.php",
                dataType: "json",
                success: function (data) {
                    $.each(data, function (index, item) {
                        var row = $("<tr><td>" + item.CouponID + "</td><td>" + item.Type + "</td><td>" + item.Ticket_price + "</td><td><button onclick='deleteRow(" + item.CouponID + ")'>Delete</button></td> <td><button onclick='updRow(" + item.CouponID + ")'>Update</button></td></tr>");
                        $("#couponTable tbody").append(row);
                    });

                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        function deleteRow(couponID) {
            // Send an AJAX request to the delete.php script
            $.ajax({
                url: "./php/del_coupons.php",
                method: "POST",
                data: { couponID: couponID },
                success: function (response) {
                    // Reload the table after the row is deleted
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function updRow(couponID) {
            var type = $("input[name='Type']").val();
            var ticket_price = $("input[name='Ticket Price']").val();
            if (checkInpt(type, ticket_price) === true) {
                console.log("Updating row with ID " + couponID);
                $.ajax({
                    url: "./php/upd_coupons.php",
                    method: "POST",
                    data: {
                        couponID: couponID,
                        type: type,
                        ticket_price: ticket_price
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

        function insertRow(type, ticket_price) {
            // Check correct input
            if (checkInpt(type, ticket_price)) {
                // Send an AJAX request to the ins_airline.php script
                $.ajax({
                    url: "./php/ins_coupons.php",
                    method: "POST",
                    data: {
                        type: type,
                        ticket_price: ticket_price
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

        function checkInpt(type, ticket_price) {
            if (type === "" || isNaN(ticket_price)) {
                return false;
            } else {
                return true;
            }
        }

    </script>

</body>

</html>