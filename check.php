<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Skmontajstroy</title>
</head>
<body>
<div class="table-wrap">
        <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Имя</th>
                                                            <th>Телефон</th>
                                                            <th>Описание</th>
                                                            
                                                 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                       
$link = new mysqli('localhost', 'danilaj7_montaj', 'FG0E*0Ea', 'danilaj7_montaj');                                                       $link->set_charset("utf8");
									                         if (mysqli_connect_errno()) {
									                             printf("ОШИБКА", mysqli_connect_error());
									                             exit;
									                         }
									                         $link->set_charset("utf8");
									                         $result = $link->query("SELECT * FROM request");
									                         while($article = $result->fetch_assoc()) {
									                   echo '
                                                        <tr>
                                                            <td>'.$article['request_name'].'</td>
                                                            <td>'.$article['request_phone'].'</td>
                                                            <td>'.$article['request_text'].'</td>

                                                          
                                                            <td>
                        
                                                            
                                                            </td>
                                                            </td>
                                                        </tr>';
									                   }
                                				

                                                        ?>
                                                    </tbody>
                                                </table>
                                                
          <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
}
</script>
</div>
</body>
</html>