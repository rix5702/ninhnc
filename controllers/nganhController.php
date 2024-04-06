<?php 
class nganhController extends baseController{
    
    private $nganhModel;
    private $khoaModel;
    public function __construct()
    {
        $this ->loadModel('khoaModel');
        $this->khoaModel = new khoaModel;
        $this ->loadModel('nganhModel');
        $this->nganhModel = new nganhModel;
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
        $Nganh = $this->nganhModel->pageNganh($begin,$count);
        $allNganh = $this->nganhModel->getAll();
        $allKhoa = $this->khoaModel->getAll();
        return $this->loadview('nganh.index',[
            'pageNganh' => $Nganh,
            'allNganh' => $allNganh,
            'page' => $page,
            'allKhoa'=> $allKhoa,
        ]);
    }
    public function delete(){
        if(!isset($_SESSION['role'])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $nganh = $this->nganhModel->delete($id);
            echo "<script>window.location.href='?controller=nganh'</script>";
        }
    }
    public function insert(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $allKhoa = $this->khoaModel->getAll();
        if(isset($_POST['them'])){
            $tennganh = $_POST['tennganh'];
            $khoa= $_POST['khoa'];
            $nganh = $this->nganhModel->insert($tennganh,$khoa);
            echo "<script>window.location.href='?controller=nganh'</script>";
        }
        return $this->loadview('nganh.insert',[
            'allKhoa'=> $allKhoa,
        ]);
    }
    public function update(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
            
        } 
        $allKhoa = $this->khoaModel->getAll();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $nganh = $this->nganhModel->getidnganh($id);
            if(isset($_POST['sua'])){
                $tennganh = $_POST['tennganh'];
                $idnganh = $_POST['idnganh'];
                $khoa = $_POST['khoa'];
                $nganh = $this->nganhModel->update($tennganh,$idnganh, $khoa);
                echo "<script>window.location.href='?controller=nganh'</script>";
        }
    }
        return $this->loadview('nganh.update',[
            'nganh' => $nganh,
            'allKhoa'=> $allKhoa,
        ]);
    }
   
   
}
?>