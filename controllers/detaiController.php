<?php 
class detaiController extends baseController{
    
    private $detaiModel;
    private $giangvienModel;
    public function __construct()
    {
       
        $this ->loadModel('detaiModel');
        $this->detaiModel = new detaiModel;
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
        $detai = $this->detaiModel->pagedetai($begin,$count);
        $alldetai = $this->giangvienModel->getAll();
        return $this->loadview('detai.list-detai',[
            'pagedetai' => $detai,
            'alldetai' => $alldetai,
            'page' => $page,
        ]);
    }
    // public function delete(){
    //     if(!isset($_SESSION['role'])){
    //         echo "<script>window.location.href='index.php?controller=home'</script>";
    //     }
    //     if(isset($_GET['id'])){
    //         $id = $_GET['id'];
    //         $detai = $this->detaiModel->delete($id);
    //         echo "<script>window.location.href='?controller=detai'</script>";
    //     }
    // }
    public function insert(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $allloai = $this->detaiModel->getloai();
        $alltrangthai = $this->detaiModel->gettrangthai();
        $allgv = $this->giangvienModel->getAll();
        if(isset($_POST['themdetai'])){
            $tendetai = $_POST['tendetai'];
            $loaidetai = $_POST['loaidetai'];
            $giangvienhd = $_POST['giangvienhd'];
            $thoigianth = $_POST['thoigianth'];
            $trangthai = $_POST['trangthai'];
            $diemdetai = 0;
            $detai = $this->detaiModel->insert($tendetai, $loaidetai, $giangvienhd, $thoigianth, $trangthai, $diemdetai);
            echo "<script>window.location.href='?controller=detai'</script>";
        }
        return $this->loadview('detai.insert-detai', [
            'allloai' => $allloai,
            'alltrangthai' => $alltrangthai,
            'allgv' => $allgv,
        ]);
    }
    
    public function update(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
            
        } 
        $allloai = $this->detaiModel->getloai();
        $alltrangthai = $this->detaiModel->gettrangthai();
        $allgv = $this->giangvienModel->getAll();
        if(isset($_GET['iddetai'])){
            $id = $_GET['iddetai'];
            $detai = $this->detaiModel->getiddetai($id);
            if(isset($_POST['suadetai'])){
                $tendetai = $_POST['tendetai'];
                $loaidetai = $_POST['loaidetai'];
                $giangvienhd = $_POST['giangvienhd'];
                $thoigianth = $_POST['thoigianth'];
                $trangthai = $_POST['trangthai'];
                $diem = $_POST['diem'];
                $iddetai = $_POST['iddetai'];
                $detai = $this->detaiModel->update($tendetai,$loaidetai,$giangvienhd,$thoigianth,$trangthai,$diem,$iddetai);
                echo "<script>window.location.href='?controller=detai'</script>";
        }
    }
        return $this->loadview('detai.update-detai',[
            'allloai' => $allloai,
            'alltrangthai' => $alltrangthai,
            'allgv' => $allgv,
            'detai' => $detai
            
        ]);
    }
   
   
}
?>