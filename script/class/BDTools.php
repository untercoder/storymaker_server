<?php
define("URL", "http://localhost/php/storymaker_local/");
//Имя хоста базы данных
define("DATABASE_HOST", "localhost");
//Имя пользователя
define("DATABASE_USER", "lexamok_bd");
//Пароль от базы данных
define("DATABASE_PASSWD","Pirandolik11");
//Имя базы данных
define("DATABASE_NAME", "lexamok_bd");
class BDTools
{
    public $mysqli = null;//поле в котором будет храниться обьект класса mysqli
    public $table_name = null;

    //Если $story != null, то в кострукторе вызывается метод write()
    //который записывает данные из $story в бд.
    //Если $new_table != false, то в конструкторе вызывается метод create_table()
    //который создает новуютаблицу в базе

    public function __construct($story,$name_table,$new_table) {


        //Установка соединения с бд
        $this ->mysqli =  new mysqli(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWD, DATABASE_NAME) or die("Error in constructor");
        //Установка кодировки utf8
        $this ->mysqli->query("SET NAMES `utf8`"); // ПОМОГЛО РЕШИТЬ ПРОБЛЕМУ КОДИРОВКИ
        //Установка имени таблицы
        $this -> table_name = $name_table;
        if($story != null){
            $this->write($story,$this->mysqli,$name_table);
        }
        if($new_table != false) {
            $this->create_table($name_table, $this->mysqli);
        }

    }

    //метод который проверяет таблицу с именем $table_name на пустоту
    public function check_table($table_name) {
        $result=mysqli_query($this -> mysqli,"SELECT * FROM `$table_name` WHERE 1") or die("Error in check_table");
        $num=mysqli_num_rows($result);
        $return = true;
        if ($num == 0)
        {
            $return = false;
        }
       return $return;
    }


    //Записывает данные из $story с помошью SQL запроса в таблицу
    public function write ($story,$link,$name_table) {
      mysqli_query($link,"INSERT INTO `$name_table` (`id`, `who`, `whr`, `do`, `what_for`, `end`) VALUES (NULL ,
        '".$story["who"]."','".$story["where"]."','".$story["do"]."','".$story["what_for"]."','".$story["end"]."');") or die("Error in write");

    }

    public function create_table($table_name, $link) {
        $namedb = DATABASE_NAME;
        $query = "CREATE TABLE `$namedb`.`$table_name` ( `id` INT NOT NULL AUTO_INCREMENT , `who` TEXT NOT NULL , `whr` 
        TEXT NOT NULL , `do` TEXT NOT NULL , `what_for` TEXT NOT NULL , `end` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;";
        mysqli_query($link,$query) or dir("Error in create_table");
    }

    // метод который выводит имена всех таблиц в базе данных
    public function show_table() {
        $array = [];
        $tables = mysqli_query($this->mysqli, "SHOW TABLES") or die("Error in show_table");
        while ($row=$tables->fetch_array()) {
            array_push($array, $row[0]);
        }
        return $array;
    }


    //Читает данные из таблицы в случайном порядки возвращает массив с готовой историей
    //вызывается в классе make_story в методе echo_story
    public function read ($table_name) {

        $array = array(
           "who" => $this->get_who(rand($this->min_id(),$this->max_id()),$table_name), //Возвращает случайное поле who из таблицы story
           "where" => $this->get_where(rand($this->min_id(),$this->max_id()),$table_name),
            "do" => $this->get_do(rand($this->min_id(),$this->max_id()), $table_name),
            "what_for" => $this->get_what_for(rand($this->min_id(),$this->max_id()), $table_name),
            "end" => $this->get_end(rand($this->min_id(),$this->max_id()), $table_name)
        );


        $this->close();

        return $array;

    }



    // возвращает все поля id изV таблицы $story
    public function get_id_array($table_name) {
        $result_set = $this -> mysqli -> query("SELECT `id` FROM `$table_name`");
        $array = [];
        while(($row = $result_set -> fetch_assoc()) != false) {
            array_push($array, $row["id"]);
        }

        return $array;
    }

    //Находит максимальное id
    public function max_id (){
        $array = $this -> get_id_array($this ->table_name);
        return max($array);
    }

    //Находит минимальное id
    public function min_id () {
        $array = $this -> get_id_array($this -> table_name);
        return min($array);
    }

    public function get_count() {
        $query = $this -> mysqli -> query("SELECT COUNT(1) FROM `$this->table_name`");
        $result = mysqli_fetch_array( $query );
        $count = $result[0];
        return $count;
    }


    //методы для получения данных из таблицы
    //Переписать !!!!!
    public function get_who($id, $table_name) {
        $result = null;
        $result_set = $this -> mysqli -> query("SELECT `who` FROM `$table_name` WHERE `id` = '".$id."'");
        while(($row = $result_set -> fetch_assoc()) != false) {
             $result = $row["who"];
        }
        return $result;
    }

    public function get_where($id,$table_name) {
        $result = null;
        $result_set = $this -> mysqli -> query("SELECT `whr` FROM `$table_name` WHERE `id` = '".$id."'");
        while(($row = $result_set -> fetch_assoc()) != false) {
            $result = $row["whr"];
        }
        return $result;
    }

    public function get_do($id, $table_name) {
        $result = null;
        $result_set = $this -> mysqli -> query("SELECT `do` FROM `$table_name` WHERE `id` = '".$id."'");
        while(($row = $result_set -> fetch_assoc()) != false) {
            $result = $row["do"];
        }
        return $result;
    }

    public function get_what_for($id,$table_name) {
        $result = null;
        $result_set = $this -> mysqli -> query("SELECT `what_for` FROM `$table_name` WHERE `id` = '".$id."'");
        while(($row = $result_set -> fetch_assoc()) != false) {
            $result = $row["what_for"];
        }
        return $result;
    }

    public function get_end($id,$table_name) {
        $result = null;
        $result_set = $this -> mysqli -> query("SELECT `end` FROM `$table_name` WHERE `id` = '".$id."'");
        while(($row = $result_set -> fetch_assoc()) != false) {
            $result = $row["end"];
        }
        return $result;
    }


    //метод который закрывает соединение с бд
    public function close() {
        $this -> mysqli -> close();
    }

}