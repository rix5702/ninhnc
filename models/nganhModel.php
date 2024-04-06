<?php 
class nganhModel extends baseModel{

    public function getAll(){
        $sql = "SELECT nganh.*,khoa.tenkhoa FROM nganh
        INNER JOIN khoa ON nganh.khoa = khoa.idkhoa";
        $query = $this->_query($sql);
        return $query;
    }
    public function pageNganh($begin,$count){
        $sql = "SELECT nganh.*,khoa.tenkhoa FROM nganh
        INNER JOIN khoa ON nganh.khoa = khoa.idkhoa
        ORDER BY idnganh DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getidnganh($idnganh){
        $sql = "SELECT * FROM nganh WHERE idnganh = $idnganh";
        $query = $this->_query($sql);
        return $query;
    }
    public function delete($idnganh){
       $sql = "DELETE  FROM nganh WHERE idnganh = $idnganh";
       if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
        $query = $this->_query($sql);
        return $query;
    }  
    }
    public function insert($tennganh,$khoa){
        $sql = "INSERT INTO nganh (tennganh, khoa) values ('$tennganh','$khoa')";
        $query = $this->_query($sql);
        return $query;
    }
    public function update($tennganh,$idnganh, $khoa){
        $sql = "UPDATE nganh SET  tennganh = '$tennganh', khoa='$khoa' WHERE idnganh = '$idnganh'";
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