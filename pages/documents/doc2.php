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

        <div class="table">
            <table id="docTable">
                <thead>
                    <tr>
                        <th>CashierID</th>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>Patronymic</th>
                        <th>CashID</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>


        <script>
            $(document).ready(function () {
                // Load the data from the server and populate the table
                $.ajax({
                    url: "./php/select_cashiers_fromDb.php",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (index, item) {
                            var row = $("<tr><td>" + item.CashierID + "</td><td>" + item.Surname + "</td><td>" + item.Name + "</td><td>" + item.Patronymic + "</td><td>" + item.CashID + "</td><td><button onclick='deleteRow(" + item.CashierID + ")'>Delete</button></td> <td><button onclick='updRow(" + item.CashierID + ")'>Update</button></td></tr>");
                            $("#docTable tbody").append(row);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });


            function deleteRow(cashierID) {
                // Send an AJAX request to the del_cashier.php script
                $.ajax({
                    url: "./php/del_cashiers.php",
                    method: "POST",
                    data: { cashierID: cashierID },
                    success: function (response) {
                        // Reload the table after the row is deleted
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }


            function updCashier(cashierID) {
                var newSalary = $("input[name='new_salary']").val();
                if (checkInpt(newSalary) === true) {
                    console.log("Updating cashier with ID " + cashierID);
                    $.ajax({
                        url: "./php/upd_cashiers.php",
                        method: "POST",
                        data: {
                            cashierID: cashierID,
                            newSalary: newSalary
                        },
                        success: function (response) {
                            // Reload the table after the row is inserted
                            if (response.startsWith("Error inserting record:")) {
                                $("#error-message").text("Введенный CashID не существует в cash table");
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
                    $("#error-message").text("Введите корректную зарплату.");
                }
            }


            function insertRow(surname, name, patronymic, cashID) {
                // Check correct input
                if (checkInpt(surname, name, cashID)) {
                    // Send an AJAX request to the ins_cashier.php script
                    $.ajax({
                        url: "./php/ins_cashiers.php",
                        method: "POST",
                        data: {
                            surname: surname,
                            name: name,
                            patronymic: patronymic,
                            cashID: cashID
                        },
                        success: function (response) {
                            // Reload the table after the row is inserted
                            if (response.startsWith("Error inserting record:")) {
                                $("#error-message").text("Введенный CashID не существует в cash table");
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




            function checkInpt(surname, name, cashID) {
                if (surname === "" || name === "" || cashID === "") {
                    return false;
                } else {
                    return true;
                }
            }


        </script>

</body>

</html>