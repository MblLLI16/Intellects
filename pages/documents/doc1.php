<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold tickets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="form">


        <div class="elements">
            <div class="err" id="error-message"></div>
            <div class="form-group">
                <input type="text" class="form-control" id="airlineId" name="airlineId"
                    placeholder="ID авиакомпании, для которой нужны данные">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="date_of_sale" name="date_of_sale"
                    placeholder="Месяц, за который продавались билеты (1-12)">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary mt-3 custom-btn"
                    onclick='insertRow($("#airlineId").val(), $("#date_of_sale").val())'
                    id="create-cashier-btn">Показать</button>
            </div>
        </div>

        <div class="heading-menu">
            <span><strong>Таблица</strong></span>
        </div>

        <div class="table">
            <table id="docTable">
                <thead>
                    <tr>
                        <th>Ticket_code</th>
                        <th>Ticket_price</th>
                        <th>Name</th>
                        <th>Last_name</th>
                        <th>Patronymic</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>


        <script>

            function insertRow(airlineId, date_of_sale) {
                // Check correct input
                if (checkInpt(airlineId, date_of_sale)) {
                    // Send an AJAX request to the ins_buytickets.php script
                    $.ajax({
                        url: "./php/select_doc1_fromDb.php",
                        method: "POST",
                        data: {
                            airlineId: airlineId,
                            date_of_sale: date_of_sale,
                        },
                        success: function (response) {
                            if (typeof response === "string" && response.startsWith("Error show record:")) {
                                $("#error-message").text("Один или более из введенных ID не существуют");
                            } else {
                                $("#docTable tbody").empty();
                                //$.each(data, function (index, item) {
                                $.each(response, function (index, item) {
                                    var row = $("<tr><td>" + item.Ticket_code + "</td><td>" + item.Ticket_price + "</td><td>" + item.first_name + "</td><td>" + item.last_name + "</td><td>" + item.patronymic + "</td></tr>");
                                    $("#docTable tbody").append(row);
                                });
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





            function checkInpt(airlineId, date_of_sale) {
                if (airlineId === "" || date_of_sale === "" || date_of_sale > 12 || date_of_sale < 1) {
                    return false;
                } else {
                    return true;
                }
            }


        </script>

</body>

</html>