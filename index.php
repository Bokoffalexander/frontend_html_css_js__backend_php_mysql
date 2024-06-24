<DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" 
content="width=device-width, initial-scale=1">
    <title>ENTIRELY</title>
    <style type="text/css">
        body {
            font-size: 20px;
            padding: 10px 10px;
            }
            
            #btn {
                background-color: rgb(70, 90, 90);
                color: white;
                font-size: 15px;
            }
            
            #image1 {
                display: block;
            }
    </style>
    
</head>
<body>
    <table>
        <td>
            <a href="index.php"> 
                <img src="images/home.png" height="50px" id="home" />
            </a>
        </td>
        <td>
            <b>MY PAGE</b>
        </td>
    </table>
    <hr>
    
    <p>
    <span id="hello" style="background-color: blue; color: white;"> Hello, JS код: </span>
    <span id="num" style="background-color: yellow">
        task: 9/2
    </span>
    </p>
    
    <div>
        <img src="images/pic1.jpeg" height="140px" id="image1" />
    </div>
    <br>
    
    
    
    
    <button id="btn" onClick="changeFun()">
         Change html 
    </button>
    
    <button id="btn" onClick="hideFun()">
         Hide pic
    </button>
    
    <button id="btn" onClick="showFun()">
         Show pic
    </button>
    
    
    <hr>
    <span style="background-color: blue; color: white;"> Hello, PHP код: </span>
<form action="index.php" method="POST">
    <p>Text:<br><input type="text" name="text"> </p>
    <input type="submit">
</form>


<br>
<p>Любой человек может <br>добавить короткую запись <br> (255 симв.) </p>

<b> 
<?php 
    if (isset($_POST['text'])) {
  
    // начало if (*)
    $host = "109.71.247.68";
    $dbname = "text_db";
    $port = 3306;
    $username = "monty";
    $password = "some_pass";
    $db_table = "texts";
    
    $result = false; 
    // Переменные с формы 
$text = $_POST['text']; 
// Параметры для подключения 

// Имя Таблицы БД 
try { 
// Подключение к базе данных 
$db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", 
$username, $password); 
// Устанавливаем корректную кодировку 
//$db->exec("set names utf8"); 
// Собираем данные для запроса 
$data = array( 
'text' => $text ); 
// Подготавливаем SQL-запрос 
$query = $db->prepare(
"INSERT INTO $db_table (text) 
values (:text)"); 
// Выполняем запрос с данными 
$query->execute($data); 
// Запишим в переменую, что запрос отрабтал 
$result = true; 

// Выдаем все строки
$stm = $db->query("SELECT * FROM $db_table");
   $rows = $stm->fetchAll();
  
   // iterate over array by index and by name
   foreach($rows as $row) {
        echo "#".$row[0].". ";
        echo "запись: ".$row[1]."<br>";
   }//print
} 
catch (PDOException $e) { 
// Если есть ошибка соединения или выполнения запроса, выводим её 
print "Ошибка!: " . $e->getMessage() . 
"<br/>"; } 
if ($result) { echo "Успех"; }
    } // конец if (*)
/////////////////////////   
     ?> 
</b> <br>

<hr>
    
    
    <script type=text/javascript>
        function changeFun() {
            const a = 9;
            const b = 2;
            const res = a/b;
            document.getElementById("hello").innerHTML =
            "Код JS выполнился! ";
            
            document.getElementById("num").style.background =
            "green";
            document.getElementById("num").style.color =
            "white";
            document.getElementById("num").innerHTML =
            "answer: " + res;
            
            document.getElementById("image1").src =
            "images/pic1.png";
            document.getElementById("image1").style.display =
            "block";
        }
        
        function hideFun() {
        document.getElementById("image1").style.display =
            "none";
        }    
        
        function showFun() {
        document.getElementById("image1").style.display =
            "block";
        }    
    </script>
</body>
</html>
