<?php 
class detaiModel extends baseModel{

    public function getAll(){
        $sql = "SELECT * FROM detainc";
        $query = $this->_query($sql);
        return $query;
    }
    public function pagedetainc($begin,$count){
        $sql = "SELECT * FROM detainc ORDER BY iddetai DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getiddetai($iddetai){
        $sql = "SELECT * FROM detainc WHERE iddetai = $iddetai";
        $query = $this->_query($sql);
        return $query;
    }
    public function getdabyidsv($idsv,$userid){
        $sql = "SELECT * FROM detainc INNER JOIN thamgiadetainc ON detainc.iddetai = thamgiadetai.iddetai WHERE thamgiadetainc.idsinhvien = $idsv";
        if(isset($_SESSION["username"]) && $_SESSION['userid'] == $userid){
            $query = $this->_query($sql);
        return $query;
    }
    }
    public function getdetaincbyloai($loaidetai){
        $sql = "SELECT * FROM detainc WHERE loaidetai = $loaidetai";
        $query = $this->_query($sql);
        return $query;
    }

    public function delete($iddetai){
       $sql = "DELETE  FROM detainc WHERE iddetai = $iddetai";
       if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
        $query = $this->_query($sql);
        return $query;
    }  
    }
    public function insert($tendetai,$loaidetai,$giangvienhd,$thoigianth,$trangthai,$diem){
        $sql = "INSERT INTO detainc (tendetai,loaidetai,giangvienhd,thoigianth,trangthai,diem)
        values ('$tendetai','$loaidetai','$giangvienhd','$thoigianth','$trangthai','$diem')";
        $query = $this->_query($sql);
        return $query;
    }
    public function update($tendetai,$loaidetai,$giangvienhd,$thoigianth,$trangthai,$diem,$iddetai){
        $sql = "UPDATE detainc SET  tendetai = '$tendetai', loaidetai='$loaidetai',giangvienhd='$giangvienhd',thoigianth='$thoigianth',trangthai='$trangthai',diem='$diem'
        WHERE iddetai = '$iddetai'";
        if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
    }
    public function updatetrangthai($trangthai,$iddetai){
        $sql = "UPDATE detainc SET trangthai='$trangthai'
        WHERE iddetai = '$iddetai'";
        if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
    }
}
?>