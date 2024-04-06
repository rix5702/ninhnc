<?php 
class doanController extends baseController{
    
    private $doanModel;
    private $nganhModel;
    private $giangvienModel;
    public function __construct()
    {
       
        $this ->loadModel('doanModel');
        $this->doanModel = new doanModel;
        $this ->loadModel('nganhModel');
        $this->nganhModel = new nganhModel;
        $this ->loadModel('giangvienModel');
        $this->giangvienModel = new giangvienModel;
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
        $doan = $this->doanModel->pagedoan($begin,$count);
        $alldoan = $this->giangvienModel->getAll();
        return $this->loadview('doan.list-da',[
            'pagedoan' => $doan,
            'alldoan' => $alldoan,
            'page' => $page,
        ]);
    }
    // public function delete(){
    //     if(!isset($_SESSION['role'])){
    //         echo "<script>window.location.href='index.php?controller=home'</script>";
    //     }
    //     if(isset($_GET['id'])){
    //         $id = $_GET['id'];
    //         $doan = $this->doanModel->delete($id);
    //         echo "<script>window.location.href='?controller=doan'</script>";
    //     }
    // }
    public function insert(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $allloai = $this->doanModel->getloai();
        $alltrangthai = $this->doanModel->gettrangthai();
        $allgv = $this->giangvienModel->getAll();
        $allnganh = $this->nganhModel->getAll();
        if(isset($_POST['themda'])){
            $tendoan = $_POST['tendoan'];
            $nganh = $_POST['nganh'];
            $loaidoan = $_POST['loaidoan'];
            $giangvienhd = $_POST['giangvienhd'];
            $thoigianth = $_POST['thoigianth'];
            $trangthai = $_POST['trangthai'];
            $diemdoan = 0;
            $doan = $this->doanModel->insert($tendoan, $nganh, $loaidoan, $giangvienhd, $thoigianth, $trangthai, $diemdoan);
            echo "<script>window.location.href='?controller=doan'</script>";
        }
        return $this->loadview('doan.insertda', [
            'allloai' => $allloai,
            'alltrangthai' => $alltrangthai,
            'allgv' => $allgv,
            'allnganh' => $allnganh,
        ]);
    }
    
    public function update(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
            
        } 
        $allloai = $this->doanModel->getloai();
        $alltrangthai = $this->doanModel->gettrangthai();
        $allgv = $this->giangvienModel->getAll();
        $allnganh = $this->nganhModel->getAll();
        if(isset($_GET['idda'])){
            $id = $_GET['idda'];
            $doan = $this->doanModel->getiddoan($id);
            if(isset($_POST['suada'])){
                $tendoan = $_POST['tendoan'];
                $nganh = $_POST['nganh'];
                $loaidoan = $_POST['loaidoan'];
                $giangvienhd = $_POST['giangvienhd'];
                $thoigianth = $_POST['thoigianth'];
                $trangthai = $_POST['trangthai'];
                $diemdoan = $_POST['diemdoan'];
                $iddoan = $_POST['iddoan'];
                $doan = $this->doanModel->update($tendoan,$nganh,$loaidoan,$giangvienhd,$thoigianth,$trangthai,$diemdoan,$iddoan);
                echo "<script>window.location.href='?controller=doan'</script>";
        }
    }
        return $this->loadview('doan.updateda',[
            'allloai' => $allloai,
            'alltrangthai' => $alltrangthai,
            'allgv' => $allgv,
            'allnganh' => $allnganh,
            'doan' => $doan
            
        ]);
    }
   
   
}
?>