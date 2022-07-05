<?
// Страница регистрации нового пользователя
// Соединямся с БД
$link = new mysqli('localhost', 'danilaj7_montaj', 'FG0E*0Ea', 'danilaj7_montaj');
if(isset($_POST['submit']))
{
    $err = [];
    // Проверяем валидность введенного логина
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }
    if(strlen($_POST['login']) < 4 or strlen($_POST['login']) > 15)
    {
        $err[] = "Логин должен быть не меньше 4-х символов и не больше 15";
    }
    // Проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }
    if(trim($_POST['pass']) != trim($_POST['repass']))
    {
        $err[] = "Введенные пароли не совпадают";
    }
    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        $login = $_POST['login'];
        // Убераем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['pass'])));
        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
        session_start();  
        //Пишем в сессию информацию о том, что мы авторизовались:
		$_SESSION['auth'] = true;
		/*
			Пишем в сессию логин и id пользователя
			(их мы берем из переменной $user!):
		*/
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    header("Location: login.php"); exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/adapt.css">
	<link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
</head>
<body class="d-flex flex-column h-100">
<center>
        <form class="form" method="POST">
            <h1 class="h3 mb-5 fw-normal">Форма регистрации</h1>
            <label for="inputEmail" class="visually-hidden">Аккаунт:</label>
            <input type="login" name="login" id="inputEmail" class="form-control" placeholder="Логин" required autofocus><br>
            <label style="margin-left: 6px;" for="inputPassword" class="visually-hidden">Пароль:</label>
            <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Пароль" required><br>
            <label style="margin-left: 6px;" for="inputPassword" class="visually-hidden">Пароль повторно:</label>
            <input type="password" name="repass" id="inputPassword" class="form-control" placeholder="Пароль повторно" required><br>
            <button style="background-color: #91c173; color: white;" class="w-100 btn btn-lg " name="submit" type="submit">Войти</button>
        </form>
</center>
</body>
</html>