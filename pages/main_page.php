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
</head>

<body>
    <div class="form">
        <div class="heading-menu">
            <span><strong>Меню</strong></span>
        </div>
        <div class="heading">
            <span>Показать таблицы:</span>
        </div>
        <!-- <div class="elements">
            <div class="form-group">
                <input type="text" class="form-control" id="eventName1" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="eventName2" name="password" placeholder="Password"
                    required>
            </div>
        </div> -->
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-event-btn-clients">Таблица "Клиенты"</button>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-event-btn-airlines">Таблица
                "Авиакомпании"</button>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-event-btn-tickets-sold">Таблица "Купленные
                билеты"</button>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-event-btn-tickets">Таблица "Билеты"</button>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-event-btn-coupons">Таблица "Талоны"</button>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-event-btn-cashiers">Таблица "Кассиры"</button>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-event-btn-cash">Таблица "Кассы"</button>
        </div>
        <div class="heading">
            <span>Документы:</span>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-doc-btn-tickets-sold-monthly">Билеты,
                проданные за n месяц n компанией</button>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-doc-btn-tickets-sales-by-airline">Сумма продаж
                билетов каждой компании</button>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 custom-btn" id="create-doc-btn-airline-clients-by-date">Список
                клиентов авиакомпаний за n дату</button>
        </div>

    </div>

    <script src="script.js"></script>
</body>

</html>