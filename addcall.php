<?php

	$link = new mysqli('localhost', 'danilaj7_montaj', 'FG0E*0Ea', 'danilaj7_montaj');
	$link->set_charset("utf8");
	if (mysqli_connect_errno()) {
	printf("ОШИБКА", mysqli_connect_error());
	exit;
	}
	if(isset($_POST['your-name'])&&($_POST['your-phone'])) {



	$name = $_POST['your-name'];
	$phone = $_POST['your-tel'];
	$text = $_POST['your-message'];
	$result = $link->query("INSERT INTO request (request_name, request_phone, request_text, request_done) VALUES ('$name', '$phone', '$text', '0')");
	mail("adavydov1738@gmail.com", "Сообщение через форму обратной связи от $name, номер телефона $phone", "$text");
	if ($result == true) {
	echo 'Отправлено';
	echo mysqli_error($result);
	}

}
?>