<?php 
class khoaModel extends baseModel{

    public function getAll(){
        $sql = "SELECT * FROM khoa";
        $query = $this->_query($sql);
        return $query;
    }
    public function pagekhoa($begin,$count){
        $sql = "SELECT * FROM khoa ORDER BY idkhoa DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getidkhoa($idkhoa){
        $sql = "SELECT * FROM khoa WHERE idkhoa = $idkhoa";
        $query = $this->_query($sql);
        return $query;
    }
    public function delete($idkhoa){
       $sql = "DELETE  FROM khoa WHERE idkhoa = $idkhoa";
       if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
        $query = $this->_query($sql);
        return $query;
    }  
    }
    public function insert($tenkhoa,$khoa){
        $sql = "INSERT INTO khoa (tenkhoa) values ('$tenkhoa')";
        $query = $this->_query($sql);
        return $query;
    }
    public function update($tenkhoa,$idkhoa){
        $sql = "UPDATE khoa SET  tenkhoa = '$tenkhoa' WHERE idkhoa = '$idkhoa'";
        if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
    }
    public function searchkhoa($str){
        $sql = "SELECT * FROM khoa WHERE MATCH(tenkhoa) against('$str' IN BOOLEAN mode)";
        $query = $this->_query($sql);
        return $query;
    }
}
?>