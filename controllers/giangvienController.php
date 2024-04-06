<?php 
class giangvienController extends baseController{
    
    private $giangvienModel;
    private $nganhModel;
    private $userModel;
    private $khoaModel;
    public function __construct()
    {
       
        $this ->loadModel('giangvienModel');
        $this->giangvienModel = new giangvienModel;
        $this ->loadModel('nganhModel');
        $this->nganhModel = new nganhModel;
        $this ->loadModel('userModel');
        $this->userModel = new userModel;
        $this ->loadModel('khoaModel');
        $this->khoaModel = new khoaModel;
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
        $giangvien = $this->giangvienModel->pagegiangvien($begin,$count);
        $allgiangvien = $this->giangvienModel->getAll();
        return $this->loadview('giangvien.list-giangvien',[
            'pagegiangvien' => $giangvien,
            'allgiangvien' => $allgiangvien,
            'page' => $page,
        ]);
    }
    // public function delete(){
    //     if(!isset($_SESSION['role'])){
    //         echo "<script>window.location.href='index.php?controller=home'</script>";
    //     }
    //     if(isset($_GET['id'])){
    //         $id = $_GET['id'];
    //         $giangvien = $this->giangvienModel->delete($id);
    //         echo "<script>window.location.href='?controller=giangvien'</script>";
    //     }
    // }
    public function insert(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $allnganh = $this->nganhModel->getAll();
        $alluser = $this->userModel->getAll();
        $allkhoa = $this->khoaModel->getAll();
        if(isset($_POST['themgv'])){
            $magv = $_POST['magv'];
            $hogv= $_POST['hogv'];
            $tengv= $_POST['tengv'];
            $email= $_POST['email'];
            $sdt= $_POST['sdt'];
            $bomon= $_POST['bomon'];
            $khoa= $_POST['khoa'];
            $userid= $_POST['userid'];
            $giangvien = $this->giangvienModel->insert($magv,$hogv,$tengv,$khoa,$email,$sdt,$bomon,$userid);
            echo "<script>window.location.href='?controller=giangvien'</script>";
        }
        return $this->loadview('giangvien.insertgv',[
            'allnganh'=> $allnganh,
            'alluser'=> $alluser,
            'allkhoa'=> $allkhoa,
        ]);
    }
    public function update(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
            
        } 
        $allnganh = $this->nganhModel->getAll();
        $alluser = $this->userModel->getAll();
        $allkhoa = $this->khoaModel->getAll();
        if(isset($_GET['idgv'])){
            $id = $_GET['idgv'];
            $giangvien = $this->giangvienModel->getidgv($id);
            if(isset($_POST['suagv'])){
                $magv = $_POST['magv'];
                $hogv= $_POST['hogv'];
                $tengv= $_POST['tengv'];
                $khoa= $_POST['khoa'];
                $email= $_POST['email'];
                $sdt= $_POST['sdt'];
                $bomon= $_POST['bomon'];
                $userid= $_POST['userid'];
                $idgv=$_POST['idgv'];
                $giangvien = $this->giangvienModel->update($idgv,$magv,$hogv,$tengv,$khoa,$email,$sdt,$bomon,$userid);
                echo "<script>window.location.href='?controller=giangvien'</script>";
        }
    }
        return $this->loadview('giangvien.updategv',[
            'allnganh' => $allnganh,
            'alluser'=> $alluser,
            'giangvien'=> $giangvien,
            'allkhoa'=> $allkhoa,
            
        ]);
    }
   
   
}
?>