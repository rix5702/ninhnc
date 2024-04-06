<?php 
class sinhvienController extends baseController{
    
    private $sinhvienModel;
    private $nganhModel;
    private $userModel;
    public function __construct()
    {
       
        $this ->loadModel('sinhvienModel');
        $this->sinhvienModel = new sinhvienModel;
        $this ->loadModel('nganhModel');
        $this->nganhModel = new nganhModel;
        $this ->loadModel('userModel');
        $this->userModel = new userModel;
    }

    
    public function index(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $count = 10;
        if(!isset($_GET['page'])){
            $page = 1;
        }
        else{
            $page = $_GET['page'];
        }
        $begin = ($page - 1)*$count;
        $sinhvien = $this->sinhvienModel->pagesinhvien($begin,$count);
        $allsinhvien = $this->sinhvienModel->getAll();
        return $this->loadview('sinhvien.list-sv',[
            'pagesinhvien' => $sinhvien,
            'allsinhvien' => $allsinhvien,
            'page' => $page,
        ]);
    }
    // public function delete(){
    //     if(!isset($_SESSION['role'])){
    //         echo "<script>window.location.href='index.php?controller=home'</script>";
    //     }
    //     if(isset($_GET['id'])){
    //         $id = $_GET['id'];
    //         $sinhvien = $this->sinhvienModel->delete($id);
    //         echo "<script>window.location.href='?controller=sinhvien'</script>";
    //     }
    // }
    public function insert(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $allnganh = $this->nganhModel->getAll();
        $alluser = $this->userModel->getAll();
        if(isset($_POST['themsv'])){
            $mssv = $_POST['mssv'];
            $hosv= $_POST['hosv'];
            $tensv= $_POST['tensv'];
            $email= $_POST['email'];
            $sdt= $_POST['sdt'];
            $nganh= $_POST['nganh'];
            $lop= $_POST['lop'];
            $userid= $_POST['userid'];
            $sinhvien = $this->sinhvienModel->insert($mssv,$hosv,$tensv,$email,$sdt,$nganh,$lop,$userid);
            echo "<script>window.location.href='?controller=sinhvien'</script>";
        }
        return $this->loadview('sinhvien.insertsv',[
            'allnganh'=> $allnganh,
            'alluser'=> $alluser,
        ]);
    }
    public function update(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
            
        } 
        $allnganh = $this->nganhModel->getAll();
        $alluser = $this->userModel->getAll();
        if(isset($_GET['idsv'])){
            $id = $_GET['idsv'];
            $sinhvien = $this->sinhvienModel->getidsv($id);
            if(isset($_POST['suasv'])){
                $mssv = $_POST['mssv'];
                $hosv= $_POST['hosv'];
                $tensv= $_POST['tensv'];
                $email= $_POST['email'];
                $sdt= $_POST['sdt'];
                $nganh= $_POST['nganh'];
                $lop= $_POST['lop'];
                $userid= $_POST['userid'];
                $idsv=$_POST['idsv'];
                $sinhvien = $this->sinhvienModel->update($idsv,$mssv,$hosv,$tensv,$email,$sdt,$nganh,$lop,$userid);
                echo "<script>window.location.href='?controller=sinhvien'</script>";
        }
    }
        return $this->loadview('sinhvien.updatesv',[
            'allnganh' => $allnganh,
            'alluser'=> $alluser,
            'sinhvien'=> $sinhvien,
        ]);
    }
   
   
}
?>