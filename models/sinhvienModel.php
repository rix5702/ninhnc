<?php 
class sinhvienModel extends baseModel{

    public function getAll(){
        $sql = "SELECT sinhvien.*, nganh.tennganh, users.username
        FROM sinhvien 
        INNER JOIN nganh ON sinhvien.nganh = nganh.idnganh
        INNER JOIN users ON sinhvien.userid = users.userid";
        $query = $this->_query($sql);
        return $query;
    }
    public function pagesinhvien($begin,$count){
        $sql = "SELECT sinhvien.*, nganh.tennganh, users.username
        FROM sinhvien 
        INNER JOIN nganh ON sinhvien.nganh = nganh.idnganh
        INNER JOIN users ON sinhvien.userid = users.userid
         ORDER BY idsv DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getidsv($idsv){
        $sql = "SELECT * FROM sinhvien WHERE idsv = $idsv";
        $query = $this->_query($sql);
        return $query;
    }
    public function getinfosv($idsv){
        $sql = "SELECT mssv, hosv,tensv,email,sdt,nganh,lop FROM sinhvien WHERE idsv = $idsv";
        $query = $this->_query($sql);
        return $query;
    }
    public function getUIDbyIDsv($idsv){
        $sql = "SELECT userid FROM sinhvien WHERE idsv = $idsv";
        $query = $this->_query($sql);
        return $query;
    }
    
    public function delete($idsv){
       $sql = "DELETE  FROM sinhvien WHERE idsv = $idsv";
       if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
        $query = $this->_query($sql);
        return $query;
    }  
    }
    public function insert($mssv,$hosv,$tensv,$email,$sdt,$nganh,$lop,$userid){
        $sql = "INSERT INTO sinhvien (mssv, hosv,tensv,email,sdt,nganh,lop,userid)
        values ('$mssv','$hosv','$tensv','$email','$sdt','$nganh','$lop','$userid')";
        $query = $this->_query($sql);
        return $query;
    }
    public function update($idsv, $mssv, $hosv, $tensv, $email, $sdt, $nganh, $lop, $userid) {
        $sql = "UPDATE sinhvien 
                SET mssv = '$mssv', 
                    hosv = '$hosv', 
                    tensv = '$tensv', 
                    email = '$email', 
                    sdt = '$sdt', 
                    nganh = '$nganh', 
                    lop = '$lop', 
                    userid = '$userid' 
                WHERE idsv = '$idsv'";
        if(isset($_SESSION["username"]) && $_SESSION['role'] == 1) {
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