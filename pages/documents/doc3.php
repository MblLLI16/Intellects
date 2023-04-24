<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of clients for data</title>
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
                    placeholder="Месяц, на который нужно отобразить список клиентов авиакомпании">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary mt-3 custom-btn" onclick='insertRow($("#airlineId").val())'
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
                        <th>Airline</th>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>Patronymic</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>


        <script>
            function insertRow(date_of_sale) {
                // Check correct input
                if (checkInpt(date_of_sale)) {
                    // Send an AJAX request to the select_doc3_fromDb.php script
                    $.ajax({
                        url: "./php/select_doc3_fromDb.php",
                        method: "POST",
                        data: {
                            date_of_sale: date_of_sale,
                        },
                        success: function (response) {
                            $("#docTable tbody").empty();
                            $.each(response, function (index, item) {
                                var row = $("<tr><td>" + item.Airline + "</td><td>" + item.last_name + "</td><td>" + item.first_name + "</td><td>" + item.patronymic + "</td></tr>");
                                $("#docTable tbody").append(row);
                            });
                        },

                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $("#error-message").text("Введите корректные значения.")
                }
            }





            function checkInpt(date_of_sale) {
                if (date_of_sale === "" || date_of_sale > 12 || date_of_sale < 1) {
                    return false;
                } else {
                    return true;
                }
            }


        </script>

</body>

</html>


