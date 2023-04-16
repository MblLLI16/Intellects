<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
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
            <?php include './php/select_customers_fromDb.php' ?>
        </div>

        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary mt-3 custom-btn"
                    id="create-event-btn-cash">Добавить</button>
            </div>
        </div>
        <div class="elements">
            <div class="form-group">
                <input type="number" class="form-control" id="eventName1" name="passport_number"
                    placeholder="passport_number" required min="2516100000" max="2516999999">
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
        function updRow(ClientID, passport_number, last_name, first_name, patronymic) {
            // Send an AJAX request to the delete.php script
            $.ajax({
                url: "./php/upd_customers.php",
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
    </script>

</body>

</html>