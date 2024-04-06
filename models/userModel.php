<?php 
class userModel extends baseModel{

    public function CheckUser($username,$password){
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $query = $this->_query($sql);
        return $query;
    }

    public function getAll(){
        $sql = "SELECT userid, username, role FROM users WHERE username != 'admin'"; // Lấy các trường id, username, email, role
        $query = $this->_query($sql);
        return $query;
    }
    

    public function pageUser($begin,$count){
        $sql = "SELECT userid, username, role FROM users WHERE username != 'admin' ORDER BY userid DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getUserByid($user){
        $sql = "SELECT * FROM users WHERE userid = $user";
        $query = $this->_query($sql);
        return $query;
    }

    public function register($username,$password,$role){
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
        $query = $this->_query($sql);
        return $query;
    }
   
    public function checkTaiKhoan($username){
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $query = $this->_query($sql);
        return $query;
    }

    public function checkpassword($password){
        $sql = "SELECT * FROM users WHERE password = '$password'";
        $query = $this->_query($sql);
        return $query;
    }
    public function changePass($newPass,$userid){
        $sql = "UPDATE users SET password = '$newPass' WHERE userid = '$userid'";
        $query = $this->_query($sql);
        return $query;
    }

  
    public function insertInfo($username,$password,$role){

        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
        $query = $this->_query($sql);
        $userid = mysqli_insert_id($this->conn);
        return $userid;
    }

    public function getInfo() {
        // Câu truy vấn SQL để lấy thông tin người dùng từ bảng "users" dựa trên ID
        $sql = "SELECT * FROM users WHERE userid = ".$_SESSION['userid'];
        // Trả về kết quả câu truy vấn
        $query = $this->_query($sql);
        return $query;
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