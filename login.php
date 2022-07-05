<?
// Страница авторизации
// Соединямся с БД
$link = new mysqli('localhost', 'danilaj7_montaj', 'FG0E*0Ea', 'danilaj7_montaj');
// Функция для генерации случайной строки
function generateCode($length=6) { 
// Набор символов 
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789"; 
// Переменная для кода 
$code = ""; 
$clen = strlen($chars) - 1; 
while (strlen($code) < $length) { 
$code .= $chars[mt_rand(0,$clen)]; 
} 
return $code; 
}

if(isset($_POST['submit']))
{
  // Вытаскиваем из БД запись, у которой логин равняеться введенному
  $query = mysqli_query($link,"SELECT user_id, user_password, user_cookie FROM users WHERE user_login='"
  .mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
  $data = mysqli_fetch_assoc($query);
  $UID = $data["user_cookie"];
  setcookie("UserID", $UID);
  // Сравниваем пароли
  if($data['user_password'] === md5(md5($_POST['password'])))
  {
    // Код, который будет выполнен, если условие истинно
    // Генерируем случайное число и шифруем его
    $hash = md5(generateCode(10));
    // Записываем в БД новый хеш авторизации
    mysqli_query($link, "UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");
    // Записываем в БД куки
    mysqli_query($link, "UPDATE users SET user_cookie='".base64_encode(base64_encode($_POST['login']))."' WHERE user_id='".$data['user_id']."'");
    setcookie("UserID", $UID);
    // Переадресовываем браузер на страницу проверки нашего скрипта
    header("Location: index.php"); exit();
    } else {
    // Код, который будет выполнен, если условие ложно
    print "Вы ввели неправильный логин/пароль";
  }
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
            <h1 class="h3 mb-5 fw-normal">Форма авторизации</h1>
            <label for="inputEmail" class="visually-hidden">Аккаунт:</label>
            <input type="login" name="login" id="inputEmail" class="form-control" placeholder="Логин" required autofocus><br>
            <label style="margin-left: 6px;" for="inputPassword" class="visually-hidden">Пароль:</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required><br>
            <button style="background-color: #91c173; color: white;" class="w-100 btn btn-lg " name="submit" type="submit">Войти</button>
        </form>
</center>
</body>
</html>