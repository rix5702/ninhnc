<?php 
class giangvienModel extends baseModel{

    public function getAll(){
        $sql = "SELECT giangvien.*, nganh.tennganh, users.username, khoa.tenkhoa
        FROM giangvien 
        INNER JOIN nganh ON giangvien.bomon = nganh.idnganh
        INNER JOIN users ON giangvien.userid = users.userid
        INNER JOIN khoa ON giangvien.khoa = khoa.idkhoa
        ";
        $query = $this->_query($sql);
        return $query;
    }
    public function pagegiangvien($begin,$count){
        $sql = "SELECT giangvien.*, nganh.tennganh, users.username, khoa.tenkhoa
        FROM giangvien 
        INNER JOIN nganh ON giangvien.bomon = nganh.idnganh
        INNER JOIN users ON giangvien.userid = users.userid
        INNER JOIN khoa ON giangvien.khoa = khoa.idkhoa
        ORDER BY idgv DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getidgv($idgv){
        $sql = "SELECT * FROM giangvien WHERE idgv = $idgv";
        $query = $this->_query($sql);
        return $query;
    }
    public function getinfosv($idgv){
        $sql = "SELECT magv, hogv,tengv,khoa,email,sdt,bomon FROM giangvien WHERE idgv = $idgv";
        $query = $this->_query($sql);
        return $query;
    }
    public function getUIDbyIDgv($idgv){
        $sql = "SELECT userid FROM giangvien WHERE idgv = $idgv";
        $query = $this->_query($sql);
        return $query;
    }
    
    public function delete($idgv){
       $sql = "DELETE  FROM giangvien WHERE idgv = $idgv";
       if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
        $query = $this->_query($sql);
        return $query;
    }  
    }
    public function insert($magv,$hogv,$tengv,$khoa,$email,$sdt,$bomon,$userid){
        $sql = "INSERT INTO giangvien (magv, hogv,tengv,khoa,email,sdt,bomon,userid)
        values ('$magv','$hogv','$tengv','$khoa','$email','$sdt','$bomon','$userid')";
        $query = $this->_query($sql);
        return $query;
    }
    public function update($idgv,$magv,$hogv,$tengv,$khoa,$email,$sdt,$bomon,$userid){
        $sql = "UPDATE giangvien SET  magv = '$magv', hogv='$hogv',tengv='$tengv',khoa='$khoa',email='$email',sdt='$sdt',bomon='$bomon',userid='$userid'
        WHERE idgv = '$idgv'";
        if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
    }
    public function searchNganh($str){
        $sql = "SELECT * FROM nganh WHERE MATCH(tennganh) against('$str' IN BOOLEAN mode)";
        $query = $this->_query($sql);
        return $query;
    }
}
?>