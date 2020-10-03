<!DOCTYPE html>
<?php include_once('./php/session_start.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div  <?php echo (!isset($_SESSION['userName']))?'style="display:none" ': '';  ?>>
        <p>hello <b><?php echo $_SESSION['userName']; ?>!</b><p>
        <a href='./php/ses_destr.php' >Выйти</a>
    </div>
    <p id="answer"></p>

    <div class="container" <?php echo (isset($_SESSION['userName']))?'style="display:none" ': '';  ?> >
    <h2>Форма входа</h2>
        <form action="#">
            <div class="row">
                <div class="col-25">
                    <label for="inLog">Логин </label>
                </div>
                <div class="col-75">
                    <input type="text" id="inLog" name="login" placeholder="Ваш логин..">
                    <span class="error" id="inLogErr"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="inPwd">Пароль </label>
                </div>
                <div class="col-75">
                    <input type="password" id="inPwd" name="pwd" placeholder="Введите пароль..">
                    <span class="error" id="inPwdErr"></span>
                </div>
            </div>
            <hr>
            <div class="row">
                <noscript class="error">У вас отключен JS. Для отправки вам необходимо его включить!</noscript>
                <input type="submit" id="inSend" disabled value="Отправить">
            </div>
        </form>
        <a href="./reg.php">Зарегистрироватся</a>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/inLog.js"></script>
</body>
</html>