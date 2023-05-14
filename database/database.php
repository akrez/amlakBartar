<?php
namespace ConnectDatabase;
session_start(); 

class DataBase{

    public function connect(){
        $error = 'ارتباط با دیتابیس امکانپذیر نیست';
        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $mysql_pass = '';                       
        $mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
        $mysql_db = 'amlakbartar';                   
        if(!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysqli_select_db($mysql_connect, $mysql_db))
            {
                die($error);        
            }else{
                return $mysql_connect;
            }
    }

    public function select($query){

        $con =$this->connect();
        $query_run = mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)){
            $query_row = mysqli_fetch_assoc($query_run);
            $_SESSION['user_id'] = $query_row['id'];
            return true;
        }else{
            return false;
        }
    }

    public function change($query){

        $con =$this->connect();
        if(mysqli_query($con,$query)){
            return true;
        }else{
            return false;
        }  
    }

    function getField($query,$field){

        $con =$this->connect();
        if($query_run = mysqli_query($con, $query))
        {
            $query_row = mysqli_fetch_assoc($query_run);
            $return_field = $query_row[$field];
            return $return_field;  
        }	
    }
}

?>