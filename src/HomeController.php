<?php
namespace Anisra\AmlakBartar;
use Jenssegers\Blade\Blade as LaravelBlade;



class HomeController
{
    public  function render($template,$data=[]){
        echo $this->returnTemplate($template,$data);
    }

    public  function returnTemplate($template,$data=[]){
        $blade= new LaravelBlade('./resources/views/','cache');
        $file='./resources/views/'.$template.'.blade.php';
        if(file_exists($file)){
            return $blade->render($template,$data); 
        }else{
            $template='errors/404';
            return $blade->render($template,$data); 

        }
    }



    function loggedin(){

        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    function getuserfield($field){

        global $mysql_connect;

        $query = "SELECT ".$field." FROM users WHERE id='".$_SESSION['user_id']."'";
        if($query_run = mysqli_query($mysql_connect, $query))
        {
            $query_run = mysqli_query($mysql_connect, $query);
            $query_row = mysqli_fetch_assoc($query_run);
            $return_field = $query_row[$field];
            return $return_field;
            
        }	
    }
}
?>