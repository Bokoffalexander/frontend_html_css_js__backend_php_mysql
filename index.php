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
            
            #chat {
                background-color: green;
                color: white;
            }
            
            #br_white {
                background-color: white;
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
    
    <button id="btn" onClick="aDownFun()">
         a-
    </button>
    <span id="a" style="background-color: yellow">
        a = 9 
    </span>
    <button id="btn" onClick="aUpFun()">
         a+
    </button>
    <br>
    <br>
    <button id="btn" onClick="bDownFun()">
         b-
    </button>
    <span id="b" style="background-color: yellow">
        a = 9 
    </span>
    <button id="btn" onClick="bUpFun()">
         b+
    </button>
    <br>
    
    <span id="numb" style="background-color: yellow">
        task: a/b
    </span>
    <br>
    <button id="btn" onClick="resultFun()">
         Calculate
    </button>
    <span id="res" style="background-color: yellow">
        result: a/b
    </span>
    <hr>
    
    <p>
    <span id="hello" style="background-color: blue; color: white;"> Hello, JS код: </span>
    <span id="num" style="background-color: yellow">
        picture: first
    </span>
    </p>
    <br>
    
    
    <div>    
      <table>
         <td>
            <img src="images/pic1.jpeg" height="140px" id="image1" />
         </td>
         <td>
            <b><span id="count"> Count: 0 </span></b>
         </td>
      </table> 
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
    
    <button id="btn" onClick="countFun()">
         Count+
    </button>
    
    
    <hr>
    <span style="background-color: blue; color: white;"> Hello, PHP код: </span>
<form action="index.php" method="POST">
    <p>Text:<br><input type="text" name="text"> </p>
    <input type="submit">
</form>


<br>
<p>Любой человек может <br>добавить короткую запись <br> (255 симв.) </p>

<div id="chat"><b>
<?php 
    if (isset($_POST['text'])) {
  
    // начало if (*)
    $host = "127.0.0.1";
    $dbname = "test";
    $port = 3306;
    $username = "root";
    $password = "root";
    $db_table = "mytable";
    
    $result = false; 
    // Переменные с формы 
$text = $_POST['text']; 
// Параметры для подключения 

// Имя Таблицы БД 
echo "Hello to You php";
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
        echo "запись: ".$row[1].'<br id="br_white">';
        echo '<div id="br_white"><br></div>';
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
</b>
</div>
<br>
<hr>
    
    
    <script type=text/javascript>
        var a = 9;
        var b = 2;
        var current = 0;
        var stateImg = 0;
        resultFun();
        document.getElementById("count").innerHTML =
            "Count: " + current;
        document.getElementById("a").innerHTML =
            "a = " + a;
        document.getElementById("b").innerHTML =
            "b = " + b;
            
        function aUpFun(){
            a++;
            document.getElementById("a").innerHTML =
            "a = " + a;
        }
        
        function bUpFun(){
            b++;
            document.getElementById("b").innerHTML =
            "b = " + b;
        }
        
        function aDownFun(){
            a--;
            document.getElementById("a").innerHTML =
            "a = " + a;
        }
        
        function bDownFun(){
            b--;
            document.getElementById("b").innerHTML =
            "b = " + b;
        }
            
        function countFun(){
            current++;
            document.getElementById("count").innerHTML =
            "Count: " + current;
        }
        
        function resultFun(){
            
            if (b == 0) {
                document.getElementById("res").innerHTML =
                "result: b is 0, change b";
            } else {
                document.getElementById("res").innerHTML =
                "result: " + (a/b);
            }
       }
        
        
        function changeFun() {
            
            function F0(){
              document.getElementById("hello").innerHTML =
              "Код JS выполнился! ";
            
              document.getElementById("num").style.background =
              "green";
              document.getElementById("num").style.color =
              "white";
              document.getElementById("num").innerHTML =
              "Other pictures";
            
              document.getElementById("image1").src =
              "images/pic1.png";
              document.getElementById("image1").style.display =
              "block";
            }
            
            function F1(){
              document.getElementById("image1").src =
              "images/pic1.jpeg";
              document.getElementById("image1").style.display =
              "block";
            }
            
            if (stateImg == 0) {
                F0();
                stateImg = 1;
            } else {
                F1();
                stateImg = 0;
            }
            
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
