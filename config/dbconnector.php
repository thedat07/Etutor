<?php 
class DBconnector{
           public $host = 'localhost';
           public  $un = 'root';
           public  $pw = '';
           public  $dbname ='id9817382_fpt';  
           public function runQuery($sql)
           {
            $conn = new mysqli($this->host, $this->un,$this->pw,$this->dbname );
            //chay cau truy van
            $result = $conn -> query($sql);
            //doc het cau truy van, tra ve mot mang
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            //dong ket noi   
            $conn->close();
            return $rows;     
           }
           public function execStatement($sql)
           {
            $conn = new mysqli($this->host, $this->un,$this->pw,$this->dbname);
            //chay cau truy van
            $result = $conn -> query($sql);
            //dong ket noi   
            $conn->close();
            return $result;   
           }

           public function num_rows($sql)
           {
            $conn = new mysqli($this->host, $this->un,$this->pw,$this->dbname);
            //chay cau truy van
            $result = $conn -> query($sql);
            $rows = $conn -> mysqli_num_rows($result);
            //dong ket noi   
            $conn->close();
            return $rows;   
           }

} ?>