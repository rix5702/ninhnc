<?php 
class khoaController extends baseController{
    
    private $khoaModel;
    public function __construct()
    {
        
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
        $khoa = $this->khoaModel->pagekhoa($begin,$count);
        $allkhoa = $this->khoaModel->getAll();
        return $this->loadview('khoa.index',[
            'pagekhoa' => $khoa,
            'allkhoa' => $allkhoa,
            'page' => $page,
        ]);
    }
    public function delete(){
        if(!isset($_SESSION['role'])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $khoa = $this->khoaModel->delete($id);
            echo "<script>window.location.href='?controller=khoa'</script>";
        }
      
    }
    public function insert(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        if(isset($_POST['them'])){
            $tenkhoa = $_POST['tenkhoa'];
            $khoa= $_POST['khoa'];
            $khoa = $this->khoaModel->insert($tenkhoa,$khoa);
            echo "<script>window.location.href='?controller=khoa'</script>";
        }
        return $this->loadview('khoa.insert');
    }
    public function update(){
        if(!isset($_SESSION["username"]) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        if(isset($_GET['idkhoa'])){
            $id = $_GET['idkhoa'];
            $khoa = $this->khoaModel->getidkhoa($id);
            if(isset($_POST['sua'])){
                $tenkhoa = $_POST['tenkhoa'];
                $idkhoa = $_POST['idkhoa'];
                $khoa = $this->khoaModel->update($tenkhoa,$idkhoa);
                echo "<script>window.location.href='?controller=khoa'</script>";
        }
    }
        return $this->loadview('khoa.update',[
            'khoa' => $khoa,
        ]);
    }
   
   
}
?>