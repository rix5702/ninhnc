<?php 
class userController extends baseController
{
    private $userModel;
    public function __construct()
    {
        $this->loadModel('userModel');
        $this->userModel = new userModel;
    }
    public function index(){
       
        //index admin
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
        $User = $this->userModel->pageUser($begin,$count);
        $alluser = $this->userModel->getAll();
        return $this->loadview('users.list-user',[
            'User' => $User,
            'alluser' => $alluser,
            'page' => $page,

        ]);

         if(isset($_SESSION['username']) || $_SESSION['role'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        return $this->loadview('users.login',[
            
        ]);
    }
    public function login(){
        if(isset($_SESSION['username'])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        $txtErro = '';
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $check = $this->userModel->CheckUser($username,$password);
            if(mysqli_num_rows($check) > 0){
                $row = mysqli_fetch_array($check);
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role'];
                if($row['role'] == 1){
                    echo "<script>window.location.href='admin.php?controller=dashboard'</script>";
                } 
                elseif($row['role'] == 2 ){
                    echo "<script>window.location.href='index.php?controller=home'</script>";
                }
                elseif($row['role'] == 3){
                    echo "<script>window.location.href='index.php?controller=home'</script>";
                } 
            }
            else {
                $txtErro =  'Tài khoản hoặc mật khẩu không hợp lệ !';
            }
        }
        return $this->loadview('users.login',[
            'txtErro' => $txtErro
        ]);
    }
    public function register(){
        if(isset($_SESSION['username'])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        $txtErro = '';
        if(isset($_POST['dangky'])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $repassword= $_POST["repassword"];
            $role =$_POST["role"];
            if($username != "" && $password != ""){
                $checkusername = $this->userModel->checkTaikhoan($username);
                if(mysqli_num_rows($checkusername) > 0){
                    $txtErro = 'Tài khoản đã tồn tại';
                }
                elseif($password != $repassword){
                    $txtErro = 'Nhập lại mật khẩu sai';
                }
                else{
                    $register = $this->userModel->register($username,$password,$role);
                    $txtErro = 'Đăng kí thành công';
                }
            }
        }
        return $this->loadview('users.register',[
            'txtErro' => $txtErro,
        ]);
    }


    public function changePass(){
        if(!isset($_SESSION["username"])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        $txtErro = '';
       
        $getInfo = $this->userModel->getInfo();
        if(isset($_POST['confirm'])){
            $matKhau = $_POST['matKhau'];
            $matKhauMoi = $_POST['matKhauMoi'];
            $matKhauMoiXacNhan = $_POST['matKhauMoiXacNhan'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $checkPass = $this->userModel->checkpassword($matKhau);
            if(mysqli_num_rows($checkPass) > 0){
                if($matKhauMoi == $matKhauMoiXacNhan){
                    $changePass = $this->userModel->changePass($matKhauMoi,$maNguoiDung);
                    $txtErro = 'Thay đổi thành công';
                }
                if($matKhauMoi == $matKhau ){
                    $txtErro = 'Mật khẩu mới không được trùng với mật khẩu cũ';
                }
                if($matKhauMoi != $matKhauMoiXacNhan){
                    $txtErro = 'Xác nhận mật khẩu không trùng';
                }
            }
            else{
                $txtErro = 'Mật khẩu không chính xác';
            }
        }
        return $this->loadview('users.changePass',[
            'txtErro' => $txtErro,
            'getInfo' => $getInfo
        ]);    
    }

    public function logout(){
        if(session_status() === PHP_SESSION_NONE)
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        echo "<script>window.location.href='index.php?controller=home'</script>";
    }
}
?>