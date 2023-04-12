<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form">
        <div class="heading">
            <span><strong>Login to Ticket sales Db</strong></span>
        </div>
        <div class="elements">
            <div class="form-group">
                <input type="text" class="form-control" id="eventName1" name="eventName1" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="eventName2" name="eventName2" placeholder="Password"
                    required>
            </div>
        </div>
        <div class="heading">
            <span>Or</span>
        </div>
        <div class="row">
            <button class="btn btn-primary mt-3" id="create-event-btn">Tap to Sign up</button>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>