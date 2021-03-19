<?php
header("Content-Type: text/html; charset=utf-8");
$email = htmlspecialchars($_POST["email"]);
$parentName = htmlspecialchars($_POST["parentName"]);
$childName = htmlspecialchars($_POST["childName"]);
$tel = htmlspecialchars($_POST["tel"]);
$age = htmlspecialchars($_POST["age"]);
$day = htmlspecialchars($_POST["day"]);
$hours = htmlspecialchars($_POST["hours"]);
$comment = htmlspecialchars($_POST["comment"]);


$refferer = getenv('HTTP_REFERER');
$date=date("d.m.y"); // число.месяц.год  
$time=date("H:i"); // часы:минуты:секунды 
$myemail = "schoolevorobotics@mail.ru";

$tema = "Новая заявка на поступление в школу оформлена";
$message_to_myemail = "
Добрый день!
<br>
Поступила новая заявка с сайта Эвороботикс.
<br>
Контактные данные:
<br>
Имя родителя: $parentName
<br>
Имя ребёнка: $childName
<br>
Контактный телефон: $tel
<br>
Возраст ребёнка: $age лет
<br>
Удобные дни посещения: $day
<br>
Удобное время посещения: $hours
<br>
Комментарий: $comment
<br>
Источник (ссылка): $refferer
";
mail($myemail, $tema, $message_to_myemail, "From: Эвороботикс <info@evorobotics.ru> \r\n Reply-To: Эвороботикс \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );



$f = fopen("leads.xls", "a+");
fwrite($f," <tr>");    
fwrite($f," <td>$email</td> <td>$parentName</td> <td>$childName</td> <td>$tel</td> <td>$age</td> <td>$day</td> <td>$hours</td> <td>$comment</td>   <td>$date / $time</td>");   
fwrite($f," <td>$refferer</td>");    
fwrite($f," </tr>");  
fwrite($f,"\n ");    
fclose($f);


?>
