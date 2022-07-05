<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>СК Монтажстрой</title>
	<link rel="stylesheet" href="css/adapt.css">
	<link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
	<link rel='stylesheet' href='css/table.css' type='text/css'>
</head>
<body class="d-flex flex-column h-100">
            <a style="position: absolute;margin-left: 5%; text-decoration: none; color: black;" href="index.php">Назад</a>
<div class="table-wrap">
        
       <table id="tablepress-16" class="tablepress tablepress-id-16">
        <thead>
        <tr class="row-1 odd">
            <th class="column-1">ID </th>
            <th class="column-2">Имя</th>
            <th class="column-3">Дата</th>
            <th class="column-4">Описание</th>
            <th class="column-5">Статус</th>
            <th class="column-6">Этажность </th>
            <th class="column-7">Цокольный этаж</th>
            <th class="column-8">Площадь</th>
            <th class="column-9">Гараж</th>
            <th class="column-10">Тип фундамента</th>
              <th class="column-11">Тип покрытия кровли</th>
            <th class="column-12">Внешняя отделка</th>
            <th class="column-13">Материал стен</th>
            <th class="column-14">Тип перекрытия</th>
            <th class="column-15">Телефон</th>
           
        </tr>
        </thead>
        <tbody>
           
            <?php 
            $link = new mysqli('localhost', 'danilaj7_montaj', 'FG0E*0Ea', 'danilaj7_montaj');

            $link->set_charset("utf8");
				if (mysqli_connect_errno()) {
				printf("ОШИБКА", mysqli_connect_error());
				exit;}
			$link->set_charset("utf8");
			$result = $link->query("SELECT * FROM orders");
			while($article = $result->fetch_assoc()) {
				echo '
            <tr class="row-2 even">
                <td class="column-1">'.$article['order_id'].'</td>
                <td class="column-2">'.$article['order_name'].'</td>
                <td class="column-3">'.$article['order_date'].'</td>
                <td class="column-4" >'.$article['order_description'].'</td>
                <td class="column-5" >'.$article['order_status'].'</td>
                <td class="column-6">'.$article['order_floors'].'</td>
                <td class="column-7">'.$article['order_groundfloor'].'</td>
                <td class="column-8">'.$article['order_area'].'</td>
                <td class="column-9" >'.$article['order_garage'].'</td>
                <td class="column-10" >'.$article['order_fund'].'</td>
                     <td class="column-11">'.$article['order_krovl'].'</td>
                <td class="column-12">'.$article['order_outside'].'</td>
                <td class="column-13" >'.$article['order_material'].'</td>
                <td class="column-14" >'.$article['order_perekr'].'</td>
                <td class="column-15" >'.$article['order_phone'].'</td>
                </td>
            </tr>';}
                if (isset($_POST['submitvalueid'])){
                $result = $link->query("UPDATE orders SET order_name = '{$_POST['submitvaluename']}', 
                order_date = '{$_POST['submitvaluedate']}', order_description = '{$_POST['submitvaluedesc']}', 
                order_status = '{$_POST['submitvaluestatus']}', order_floors = '{$_POST['submitvaluefloor']}', order_groundfloor = '{$_POST['submitvalueground']}', order_area = '{$_POST['submitvaluearea']}', 
                order_garage = '{$_POST['submitvaluegarage']}', 
                order_fund = '{$_POST['submitvaluefund']}', 
                order_krovl = '{$_POST['submitvaluekrovl']}', 
                order_outside = '{$_POST['submitvalueoutside']}', 
                order_material = '{$_POST['submitvaluematerial']}', 
                order_perekr = '{$_POST['submitvalueperekr']}', 
                order_phone = '{$_POST['submitvaluephone']}' 
                WHERE order_id = '{$_POST['submitvalueid']}'");
                ;
  
                                                        }
                                                        
                                                        
                                                         if (isset($_POST['addsubmit'])){
                                                             
                                                             $result = $link->query("INSERT INTO orders SET order_name = '{$_POST['addvaluename']}', 
                order_date = '{$_POST['addvaluedate']}', order_description = '{$_POST['addvaluedesc']}', 
                order_status = '{$_POST['addvaluestatus']}', order_floors = '{$_POST['addvaluefloor']}', order_groundfloor = '{$_POST['addvalueground']}', order_area = '{$_POST['addvaluearea']}', 
                order_garage = '{$_POST['addvaluegarage']}', 
                order_fund = '{$_POST['addvaluefund']}', 
                order_krovl = '{$_POST['addvaluekrovl']}', 
                order_outside = '{$_POST['addvalueoutside']}', 
                order_material = '{$_POST['addvaluematerial']}', 
                order_perekr = '{$_POST['addvalueperekr']}', 
                order_phone = '{$_POST['addvaluephone']}'");
                ;
                                                         }
                                                         
                                                          if (isset($_POST['deletefield'])){
                                                             
                                                             $result = $link->query("DELETE from orders WHERE order_id = '{$_POST['deleteid']}'");
                                                         }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <h4>Введите ID заказа, введите данные, которые хотели бы изменить и нажмите кнопку "Отправить", чтобы подтвердить изменение.</h4>
                                                <form name="changevalue" method="POST" style = "display: flex;flex-direction: column;flex-wrap: wrap;align-content: stretch;justify-content: flex-end;align-items: stretch;">
                                                    <input type="text" placeholder="ID" name="submitvalueid" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Имя" name="submitvaluename" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Дата" name="submitvaluedate" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Описание" name="submitvaluedesc" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Статус" name="submitvaluestatus" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Этажность" name="submitvaluefloor" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Цокольный этаж" name="submitvalueground" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Площадь" name="submitvaluearea" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Гараж" name="submitvaluegarage" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Тип фундамента" name="submitvaluefund" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Тип покрытия кровли" name="submitvaluekrovl" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Внешняя отделка" name="submitvalueoutside" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Материал стен" name="submitvaluematerial" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Тип перекрытия" name="submitvalueperekr" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Телефон" name="submitvaluephone" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>

                                                    <button placeholder="Отправить" type="submit" name="changesubmit" style="padding: 0;">Отправить</button> 
                                                </form>
                                                <br>
                                                <h4>Введите данные для нового заказа и нажмите кнопку отправить.</h4>
                                                <form name="changevalue" method="POST" style = "display: flex;flex-direction: column;flex-wrap: wrap;align-content: stretch;justify-content: flex-end;align-items: stretch;">
                                                    
                                                    <input type="text" placeholder="Имя" name="addvaluename" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Дата" name="addvaluedate" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Описание" name="addvaluedesc" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Статус" name="addvaluestatus" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Этажность" name="addvaluefloor" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Цокольный этаж" name="addvalueground" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Площадь" name="addvaluearea" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Гараж" name="addvaluegarage" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Тип фундамента" name="addvaluefund" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Тип покрытия кровли" name="addvaluekrovl" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Внешняя отделка" name="addvalueoutside" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Материал стен" name="addvaluematerial" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Тип перекрытия" name="addvalueperekr" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
                                                    <input type="text" placeholder="Телефон" name="addvaluephone" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
<button placeholder="Отправить" type="submit" name="addsubmit" style="padding: 0;">Отправить</button>                                                </form>
                                                <br>
                                                <h4>Введите ID заказа, который нужно удалить и нажмите кнопку "Удалить"</h4>
                                                <form name="deletevalue" method="POST" style = "display: flex;flex-direction: column;flex-wrap: wrap;align-content: stretch;justify-content: flex-end;align-items: stretch;">
                                                    <input type="text"  placeholder="ID" name="deleteid" style="margin-bottom: 5px;border-color: black;border-radius: 3px;border-width: 1px;width: 100%;height: 25px;"></input>
<button placeholder="Отправить" type="submit" name="deletefield" style="padding: 0;">Удалить</button>                                                 </form>
          <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
}
</script>
        
</div>
</body>
</html>