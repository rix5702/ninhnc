<?php
class dashboardController extends baseController{

    public function __construct()
    {
        
    }
    public function index(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        return $this->loadview('dashboard.index',[
           
        ]);
    }


}

?>