<!DOCTYPE html>
<?php include_once('./php/session_start.php'); ?>
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
    <h2>Форма регистрации</h2>
        <form action="#">
            <div class="row">
                <div class="col-25">
                    <label for="regLog">Логин </label>
                </div>
                <div class="col-75">
                    <input type="text" id="regLog" name="login" placeholder="Ваш логин..">
                    <span class="error" id="regLogErr"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="regPwd">Пароль </label>
                </div>
                <div class="col-75">
                    <input type="password" id="regPwd" name="pwd" placeholder="Введите пароль..">
                    <span class="error" id="regPwdErr"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="regPwdCon">Повторите пароль</label>
                </div>
                <div class="col-75">
                    <input type="password" id="regPwdCon" name="pwdCon" placeholder="Повторите пароль..">
                    <span class="error" id="regPwdConErr"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="regEmail">Ваша Эл. почта </label>
                </div>
                <div class="col-75">
                    <input type="email" id="regEmail" name="email" placeholder="Ваш Email..">
                    <span class="error" id="regEmailErr"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="regName">Имя </label>
                </div>
                <div class="col-75">
                    <input type="text" id="regName" name="name" placeholder="Ваше имя..">
                    <span class="error" id="regNameErr"></span>
                </div>
            </div>
            <hr>
            <div class="row">
                <noscript class="error">У вас отключен JS. Для отправки вам необходимо его включить!</noscript>
                <input type="submit" id="regSend" disabled value="Отправить">
            </div>
        </form>
        <a href="./index.php">Войти</a>
    </div>
    
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/reg.js"></script>
</body>
</html>