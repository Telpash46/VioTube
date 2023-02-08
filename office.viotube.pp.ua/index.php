<?php
//http://note.ly/pash7750gmailcom#
session_start();
if(isset($_SESSION['gg'])){
http_response_code(410);
die();
}
error_reporting();
?>
<title>VioTube Corporation</title>
<style>
	.login{
		min-width:100%;
		min-height:100%;
		width:100%;
		height:100%;
		
	}
	.office{
		margin:0px;
		min-width:100%;
		min-height:100%;
		width:100%;
		height:100%;
		display:none;
	}
.centered {
    position: fixed; /* or absolute */
    top: 50%;
    left: 50%;
	min-width:1%;
    width: 20%;
	min-height:100%;
    height:100%;
    margin: -50px 0 0 -100px;
   
}
	 @media screen and (max-width: 500px) {
  header a {
	 
    float: none;
    display: block;
     text-align: left;
  }
  nav {
       float: none;
	  margin:0px;
  }
}

	a{
		color:black;
		text-decoration-line:none;
		padding:1%;
	
		border-bottom:1%;
		
	}
	hr{
	border: 1px solid red;
	}
	

</style>
<?php
if(isset($_COOKIE['q'])){
echo "<style>.login
{
display:none;
} 

.office {
display: inline-block;
}</style>";
}

?>
<div class='login'>
<div class='centered'>
	<form method='post' autocomplete='off'>
		<h3>Добро пожаловать в VioTube Corporation!<br> Для продолжения войдите</h3><br>
		<input type='text' required placeholder='Format: domain\login' name='login'><br><br>
		<input type='password' name='pass' required placeholder='Password'><br><br>
		<input type='submit'>
	</form>
	<?php
	



 $servername = "localhost";
$username = "viooffice";
$password = "VioTube1";
$dbname = "rosoha3_viooffice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



// else {
//setcookie("gg", true, "/");
//	header("Location: /");
//}




if (isset($_POST['login']) and isset($_POST['pass'])){
	
$_SERVER['PHP_AUTH_USER'] = "";
$_SERVER['PHP_AUTH_PW'] = "";
setcookie("login", $_POST['login'], time()+1600);
	setcookie("pass", $_POST['pass'], time()+1600);
	
	
	
	
	$sql = "SELECT * FROM users WHERE login='".$_POST['login']."'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $ll = $row['login'];
	  $pp = $row['pass'];
 //   echo "id: " . $row["id"]. " - Name: " . $row["login"]. " " . $row["type"]. "<br>";
	  $_SESSION['city'] = $row['city'];
	  $_SESSION['name'] = $row['name'];
	  $_SESSION['phone'] = $row['phone'];
	  $_SESSION['surname'] = $row['surname'];
	   $_SESSION['email'] = $row['email'];
	  $_SESSION['telegram'] = $row['telegram'];
	  $_SESSION['type'] = $row["type"];
  }
}
	
	
	
	
if($_POST['login'] == $ll){
	
	
	
if($_POST['pass'] == $pp)	{
	setcookie("q", true, time()+1600, "/");
	header("Location:/");
} 
	
	
} 
	if ($_POST['login'] != $ll or $_POST['pass'] != $pp) {
$_SESSION['gg'] = true;
	//echo "<script>alert('reg');</script>";
	header("Location: ./");	
}
}

	?>
	
	</div>
</div>
	
	
	<div class='office'>
	
		 <header style='line-height: 250%;  border-bottom:1px;background-color:yellow;'>
 
  <nav>
	  <a class="active" href="/"><b>Главная</b> </a> 
    <a href="?w=people_search">Поиск соотрудника </a> 
	  <a href="?w=user_control"><b>Управление пользователями VioTube</b> </a> 
	  <a href="?w=people_control">Добавление/удаление соотрудников(доступно суперпользователю) </a> 
	  <a href="?w=live_stream"><b>Реестр прямых трянсляций</b> </a> 
	  <a href="?w=chat_control">Управление чатами </a> 
	  <a href="javascript:alert('Обратитесь к начальнику для решения этого вопроса');"><b>Получить админку(суперпользователя)</b> </a> 
	  <a onclick='document.cookie = "q=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; document.cookie = "login=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; document.cookie = "q=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";' href="https://office.viotube.pp.ua/">Выйти</a> 
  </nav>
</header>
		<br><br>
		<?php

    if($_GET['w'] == 'chat_control'){
      
    $chats=file_get_contents("https://viotube.pp.ua/chat/users/all.php");
      $cha =explode("~", $chats);
      
      echo "<ol> <b>Все чаты</b><br>";

 foreach($cha as $k => $v){

    echo "<li><a href='https://viotube.pp.ua/chat/users/".$v."/?user=Компания VioTube. Модераторы&q=&delmes='>$v</a></li><br><br>";

  }

  echo "</ol><br><br>";

  

  

  
    }
      
if($_GET['w'] == "live_stream"){
 $str = file_get_contents("https://viotube.pp.ua/lives/gt.php");
  $ad = explode("~", $str);
  echo "<ol> <b>Все ВОЗМОЖНЫЕ прямые трансляции(можно нажать на эфир)</b><br>";
  foreach($ad as $k => $v){
    echo "<li><a href='https://viotube.pp.ua?search=live=$v'>$v</a></li><br><br>";
  }
  echo "</ol><br><br>
  
  
  
 <form action='https://viotube.pp.ua/lives/act.php' method='post' autocomplete='off'>
        Удалить эфир<br>
        <input type='text' name='login' placeholder='Канал'><br><br>
        <input type='submit' value='Удалить'>
        </form><br><br>
        
        <button onclick='window.location.reload ();' href='#НАЖМИТЕ ОБЯЗАТЕЛЬНО'>НАЖМИТЕ НА ЭТУ КНОПКУ ПОСЛЕ УДАЛЕНИЯ ЭФИРА</button><br>
        
        <span>P.S: Человек может перезапустить эфир</span>
  ";
  
}
      
      
      

      if($_GET['w'] == "user_control"){
       $allu= file_get_contents("https://viotube.pp.ua/acc/logs"); 
        $u = explode("~", $allu);
        $allp = file_get_contents("https://viotube.pp.ua/acc/pss");
        $p = explode("~", $allp);
        echo "<table border='1'>
        <tr>
        <th>
        Логин пользователя
        </th>
       
        </tr>
        
        ";
        $arr = [];
        foreach ($u as $k => $l){
         foreach ($p as $k => $pp){
           if(!in_array($l, $arr)){
          echo "<tr><td>$l</td></tr>"; 
           $arr[] = $l;
         }}
        }
        echo "</table><br><br><hr>";
        echo "<form action='https://viotube.pp.ua/acc/act.php' method='post' autocomplete='off'>
        Удалить пользователя<br>
        <input type='text' name='login' placeholder='Логин пользователя'><br><br>
        <input type='submit' value='Удалить'>
        </form><br><br>
        
        <button onclick='window.location.reload ();' href='#НАЖМИТЕ ОБЯЗАТЕЛЬНО'>НАЖМИТЕ НА ЭТУ КНОПКУ ПОСЛЕ УДАЛЕНИЯ ПОЛЬЗОВАТЕЛЯ</button>
        ";
      }
      
      
      
      
if($_GET['w'] == "people_control" and $_SESSION['type'] == "user"){
echo "<h1 style='color:red'>Произошла ошибка!</h1><br>";	
	echo "<h2>У Вас нет прав для просмотра этой страницы</h2><br>";
	echo "<h3>Обратитесь к начальнику для решения этого вопроса</h3>";
} elseif ($_GET['w'] == "people_control" and $_SESSION['type'] == "superuser") {
	
	
	
	
	
		$sql = "SELECT * FROM users";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
    echo "<table border='1'>
	  
	  <tr>
	  <th>ID в базе</th>
	   <th>Логин</th>
	   <th>Пароль</th>
	    <th>Тип</th>
		 <th>Телефон</th>
		  <th>Город</th>
		   <th>Имя</th>
		    <th>Фамилия</th>
			 <th>Telegram</th>
			  <th>Рабочий email</th>
	  </tr>";
  while($row = $result->fetch_assoc()) {
	 echo "<tr>";
    echo "<td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>".$row["pass"]."</td><td>" . $row["type"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["telegram"]. "</td><td>" . $row["email"]. "</td>";
	  echo "</tr>";
	  
	
	  
	  
	 
  } 
		
		echo "</table> <br> <br> ";
}
	echo "<a style='background-color:aqua' onclick='alert(`Логин: viooffice ; Пароль: VioTube1 `);' href='https://panel09.myhosting.name/phpmyadmin'>Управление соотрудниками</a><br><br>
    ";
/*	echo "<form method='get' autocomplete='off'>
	<input type='checkbox' value='new' name='new'>Новый пользователь?<br><br>
	<input type='text' hidden value='people_control' name='w'>
	<input type='text' hidden value='true' name='r' >
	<input type='text' placeholder='ID' name='id'><br><br>
	<input type='text' placeholder='LOGIN' name='login'><br><br>
	<input type='text' placeholder='PASSWORD' name='pass'><br><br>
	<input type='text' placeholder='TYPE' name='type'><br><br>
	<input type='text' placeholder='PHONE' name='phone'><br><br>
	<input type='text' placeholder='CITY' name='city'><br><br>
	<input type='text' placeholder='NAME' name='name'><br><br>
	<input type='text' placeholder='SURNAME' name='surname'><br><br>
	<input type='text' placeholder='TELEGRAM @' name='telegram'><br><br>
	<input type='text' placeholder='WORK EMAIL' name='email'><br><br>
	<input type='submit'>
	</form>
	";
	if(isset($_GET['r'])){
		if($_GET['new']){
		$sql = "INSERT INTO `users`(`id`,`login`, `pass`, `type`, `phone`, `city`, `name`, `surname`, `telegram`, `email`) VALUES ('".$_GET['id']."','".$_GET['login']."','".$_GET['pass']."','".$_GET['type']."','".$_GET['phone']."','".$_GET['city']."','".$_GET['name']."','".$_GET['surname']."','".$_GET['telegram']."','".$_GET['email']."')";
$result = $conn->query($sql);
        } else {
          $sql = "UPDATE `users` SET ,`login`='".$_GET['login']."',`pass`='".$_GET['pass']."',`type`='".$_GET['type']."',`phone`='".$_GET['phone']."',`city`='".$_GET['city']."',`name`='".$_GET['name']."',`surname`='".$_GET['surname']."',`telegram`='".$_GET['telegram']."',`email`='".$_GET['email']."' WHERE id=".$_GET['id']."";
          $result = $conn->query($sql);
        }
      
      
      
	
	}*/
	
}
		
		
		
		
		
		
		

		if($_GET['w'] == "people_search"){
			echo "<form style='text-align:center;' method='get' autocomplete='off'>
			<label>Внимание! База настроена так, что все значения на английском языке.</label><br>
			<input type='radio' value='phone' name='type'>Поиск по номеру телефона<br>
			<input type='radio' value='name' name='type'>Поиск по имени<br>
			<input type='radio' value='surname' name='type'>Поиск по фамилии<br>
			<input type='radio' value='city' name='type'>Поиск по городу<br>
			<input type='radio' value='login' name='type'>Поиск по логину<br>
			<input type='radio' value='email' name='type'>Поиск по рабочей почте<br>
			<input type='radio' value='username' name='type'>Поиск по telegram username<br>
			<input type='text' value='people_search' hidden name='w'>
			<input type='text' name='q' placeholder='Запрос...'><br><br>
			<input type='submit'>
			</form>";
			if(isset($_GET['type'])){
			if($_GET['type'] == "phone"){
				$sql = "SELECT * FROM users WHERE phone='".$_GET['q']."'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    echo "<table border='1'>
	  
	  <tr>
	  <th>ID в базе</th>
	   <th>Логин</th>
	    <th>Тип</th>
		 <th>Телефон</th>
		  <th>Город</th>
		   <th>Имя</th>
		    <th>Фамилия</th>
			 <th>Telegram</th>
			  <th>Рабочий email</th>
	  </tr>";
  while($row = $result->fetch_assoc()) {
	 echo "<tr>";
    echo "<td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["type"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["telegram"]. "</td><td>" . $row["email"]. "</td>";
	  echo "</tr>";
	  
	
	  
	  
	 
  } 
		
		echo "</table>";
}
	
				
			}
				
				
				
				
				if($_GET['type'] == "name"){
				$sql = "SELECT * FROM users WHERE name='".$_GET['q']."'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    echo "<table border='1'>
	  
	  <tr>
	  <th>ID в базе</th>
	   <th>Логин</th>
	    <th>Тип</th>
		 <th>Телефон</th>
		  <th>Город</th>
		   <th>Имя</th>
		    <th>Фамилия</th>
			 <th>Telegram</th>
			  <th>Рабочий email</th>
	  </tr>";
  while($row = $result->fetch_assoc()) {
	 echo "<tr>";
    echo "<td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["type"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["telegram"]. "</td><td>" . $row["email"]. "</td>";
	  echo "</tr>";
	  
	
	  
	  
	 
  } 
		
		echo "</table>";
}
	
				
			}
				
				
				
				
				
			if($_GET['type'] == "surname"){
				$sql = "SELECT * FROM users WHERE surname='".$_GET['q']."'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    echo "<table border='1'>
	  
	  <tr>
	  <th>ID в базе</th>
	   <th>Логин</th>
	    <th>Тип</th>
		 <th>Телефон</th>
		  <th>Город</th>
		   <th>Имя</th>
		    <th>Фамилия</th>
			 <th>Telegram</th>
			  <th>Рабочий email</th>
	  </tr>";
  while($row = $result->fetch_assoc()) {
	 echo "<tr>";
    echo "<td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["type"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["telegram"]. "</td><td>" . $row["email"]. "</td>";
	  echo "</tr>";
	  
	
	  
	  
	 
  } 
		
		echo "</table>";
}
	
				
			}
				
				
				
				
		


				
				
				
				
				if($_GET['type'] == "city"){
				$sql = "SELECT * FROM users WHERE city='".$_GET['q']."'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    echo "<table border='1'>
	  
	  <tr>
	  <th>ID в базе</th>
	   <th>Логин</th>
	    <th>Тип</th>
		 <th>Телефон</th>
		  <th>Город</th>
		   <th>Имя</th>
		    <th>Фамилия</th>
			 <th>Telegram</th>
			  <th>Рабочий email</th>
	  </tr>";
  while($row = $result->fetch_assoc()) {
	  
	 echo "<tr>";
    echo "<td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["type"]. "</td><td>" . $row["phone"]. "</td><td>". $row['city']. "</td><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["telegram"]. "</td><td>" . $row["email"]. "</td>";
	  echo "</tr>";
	  
	
	  
	  
	 
  } 
		
		echo "</table>";
}
	
				
			}
				
				
				
				
				
				
				if($_GET['type'] == "login"){
				$sql = "SELECT * FROM users WHERE login='".$_GET['q']."'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    echo "<table border='1'>
	  
	  <tr>
	  <th>ID в базе</th>
	   <th>Логин</th>
	    <th>Тип</th>
		 <th>Телефон</th>
		  <th>Город</th>
		   <th>Имя</th>
		    <th>Фамилия</th>
			 <th>Telegram</th>
			  <th>Рабочий email</th>
	  </tr>";
  while($row = $result->fetch_assoc()) {
	 echo "<tr>";
    echo "<td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["type"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["telegram"]. "</td><td>" . $row["email"]. "</td>";
	  echo "</tr>";
	  
	
	  
	  
	 
  } 
		
		echo "</table>";
}
	
				
			}
				
				
				
				
				
				
			if($_GET['type'] == "email"){
				$sql = "SELECT * FROM users WHERE email='".$_GET['q']."'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    echo "<table border='1'>
	  
	  <tr>
	  <th>ID в базе</th>
	   <th>Логин</th>
	    <th>Тип</th>
		 <th>Телефон</th>
		  <th>Город</th>
		   <th>Имя</th>
		    <th>Фамилия</th>
			 <th>Telegram</th>
			  <th>Рабочий email</th>
	  </tr>";
  while($row = $result->fetch_assoc()) {
	 echo "<tr>";
    echo "<td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["type"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["telegram"]. "</td><td>" . $row["email"]. "</td>";
	  echo "</tr>";
	  
	
	  
	  
	 
  } 
		
		echo "</table>";
}
	
				
			}
				
				
				
				
				
				
				
				
				
				if($_GET['type'] == "username"){
				$sql = "SELECT * FROM users WHERE telegram='".$_GET['q']."'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    echo "<table border='1'>
	  
	  <tr>
	  <th>ID в базе</th>
	   <th>Логин</th>
	    <th>Тип</th>
		 <th>Телефон</th>
		  <th>Город</th>
		   <th>Имя</th>
		    <th>Фамилия</th>
			 <th>Telegram</th>
			  <th>Рабочий email</th>
	  </tr>";
  while($row = $result->fetch_assoc()) {
	 echo "<tr>";
    echo "<td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["type"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["telegram"]. "</td><td>" . $row["email"]. "</td>";
	  echo "</tr>";
	  
	
	  
	  
	 
  } 
		
		echo "</table>";
}
	
				
			}
				
				
				
				
				
				
			}
		}

?>
		<hr>
		<?php
date_default_timezone_set('Europe/Kiev');
$date = date('m/d/Y h:i:s ', time());
echo $date. " - Время открытия страницы";
echo "<br>";
echo $_COOKIE['login'] . " - Соотрудник"; // user
		echo "<br>";
		echo session_id(). " - Session id";
		echo "<br>";
		echo $_SERVER['REMOTE_ADDR']. " - ip";
//echo $_SERVER['PHP_AUTH_PW']; // password
?>
	</div>
	


	