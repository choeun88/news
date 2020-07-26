<?php
class Database {
  
    public static $severname ="localhost";
    public static $username ="root";
    public static $password ="";
    public static $dbname ="news";

    private static function connect(){
        $conn  = mysqli_connect(self::$severname,self::$username,self::$password,self::$dbname);
        return $conn;
    }
    public static function query($query,$params = array()){
        $statement = self::connect()->query($query);
        if(explode(' ',$query)['0'] == 'SELECT' ){
            // $data = $statement->fetch_assoc();
            return $statement;
        }else{
            if($statement == true){
                return true;
            }else{
                return false;
            }
        }
    }
}  
?>