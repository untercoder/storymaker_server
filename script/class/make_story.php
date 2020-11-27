<?php
include 'BDTools.php';
class make_story
{
    /*
        Массив с входными данными пользователя.
    */

    public $name_table = null; //поле в котором храниться имя таблицы
    public $story = array("who" => null, "where" => null,
        "do" => null, "what_for" => null, "end" => null);

    public $BD = null; // поле в котором будет хранится обьект для раюоты с базой данных.



    /*
        Коструктор заполняет массив данными полученными из формы.
        Создает обьект класса BDTools для работы с базой данных.
        Если $request != null, то в конструктор класса BDTools
        передается массив с полями из формы. Создается обьект
        для записи.
        Если $request == null, то конструктор класса BDTools
        создает объект для чтения из базы данных.

    */

    public function __construct($request,$name_table) {
        $this -> name_table = $name_table or die("Error in construct");
        if($request != null ) {
            /*
                Заполнение массива с помошью конструктора и цикла foreach
                trim() - удаляет лишние пробелы.
            */
                foreach ($this -> story as $key => $value ) {
                    $this -> story[$key] = trim($request[$key]);
                }
                $this -> BD = new BDTools($this -> story,$name_table,false); // объект для записи

        }

        else {
            $this -> BD = new BDTools($request,$name_table,false); //объект для чтения

        }
    }

    /*
        Метод для вывода данных из БД в браузер.
    */

    public function count () {
        $count = $this -> BD -> get_count();
        return $count;
    }


    public function echo_story(){
        if($this -> BD -> check_table($this -> name_table)) {
            $array = $this -> BD -> read($this ->name_table);
            foreach ($array as $value) {
                echo $value."<br/>";
            }
        }
        else {
            echo "Таблица пуста";
        }

    }

    public function echo_array() {
        if($this -> BD -> check_table($this -> name_table)) {
            $array = $this -> BD -> read($this ->name_table);
            return $array;
        }
        else {
            return "Таблица пуста";
        }
    }
}