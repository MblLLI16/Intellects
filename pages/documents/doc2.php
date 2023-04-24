<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum sold tickets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="form">


        <!-- <div class="elements">
            <div class="err" id="error-message"></div>
            <div class="form-group">
                <input type="text" class="form-control" id="airlineId" name="airlineId" placeholder="ID авиакомпании, для которой нужны данные">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="soldData" name="soldData" placeholder="Месяц, за который продавались билеты">
            </div>
        </div> -->

        <!-- <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary mt-3 custom-btn"
                    onclick='insertRow($("#airlineId").val(), $("#soldData").val()'
                    id="create-cashier-btn">Показать</button>
            </div>
        </div>  -->

        <div class="heading-menu">
            <span><strong>Таблица</strong></span>
        </div>

        <div class="container">
            <div class="table">
                <table id="docTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>TotalPrice</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                // Load the data from the server and populate the table
                $.ajax({
                    url: "./php/select_doc2_fromDb.php",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (index, item) {
                            var row = $("<tr><td>" + item.Name + "</td><td>" + item.TotalPrice + "</td></tr>");
                            $("#docTable tbody").append(row);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });


        </script>

</body>

</html>