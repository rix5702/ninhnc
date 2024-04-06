<?php 
class doanModel extends baseModel{

    public function getAll(){
        $sql = "SELECT SELECT doan.*,nganh.tennganh,loaidoan.tenloai, giangvien.hogv, giangvien.tengv, trangthai.tentrangthai FROM doan
        INNER JOIN nganh ON doan.nganh = nganh.idnganh
        INNER JOIN loaidoan ON doan.loaidoan = loaidoan.idloaidoan
        INNER JOIN giangvien ON doan.giangvienhd = giangvien.idgv
        INNER JOIN trangthai ON doan.trangthai = trangthai.idtrangthai";
        $query = $this->_query($sql);
        return $query;
    }
    public function pagedoan($begin,$count){
        $sql = "SELECT doan.*,nganh.tennganh,loaidoan.tenloai, giangvien.hogv, giangvien.tengv, trangthai.tentrangthai FROM doan
        INNER JOIN nganh ON doan.nganh = nganh.idnganh
        INNER JOIN loaidoan ON doan.loaidoan = loaidoan.idloaidoan
        INNER JOIN giangvien ON doan.giangvienhd = giangvien.idgv
        INNER JOIN trangthai ON doan.trangthai = trangthai.idtrangthai
        ORDER BY iddoan DESC LIMIT $begin,$count ";
        $query = $this->_query($sql);
        return $query;
    }
    public function getloai(){
        $sql = "SELECT * FROM loaidoan ";
        $query = $this->_query($sql);
        return $query;
    }
    public function gettrangthai(){
        $sql = "SELECT * FROM trangthai ";
        $query = $this->_query($sql);
        return $query;
    }
    public function getiddoan($iddoan){
        $sql = "SELECT * FROM doan WHERE iddoan = $iddoan";
        $query = $this->_query($sql);
        return $query;
    }
    public function getdabyidsv($idsv,$userid){
        $sql = "SELECT * FROM doan 
        INNER JOIN thamgiadoan ON doan.iddoan = thamgiadoan.iddoan 
        WHERE thamgiadoan.idsinhvien = $idsv";
        if(isset($_SESSION["username"]) && $_SESSION['userid'] == $userid){
            $query = $this->_query($sql);
        return $query;
    }
    }
    public function getdoanbyloai($loaidoan){
        $sql = "SELECT * FROM doan WHERE loaidoan = $loaidoan";
        $query = $this->_query($sql);
        return $query;
    }
    public function getdoanbynganh($nganh){
        $sql = "SELECT * FROM doan WHERE nganh = $nganh";
        $query = $this->_query($sql);
        return $query;
    }
    public function getbyngandloai($nganh,$loaidoan){
        $sql = "SELECT * FROM doan WHERE nganh = $nganh and loaidoan=$loaidoan";
        $query = $this->_query($sql);
        return $query;
    }

    public function delete($iddoan){
       $sql = "DELETE  FROM doan WHERE iddoan = $iddoan";
       if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
        $query = $this->_query($sql);
        return $query;
    }  
    }
    public function insert($tendoan,$nganh,$loaidoan,$giangvienhd,$thoigianth,$trangthai,$diemdoan){
        $sql = "INSERT INTO doan (tendoan,nganh,loaidoan,giangvienhd,thoigianth,trangthai,diemdoan)
        values ('$tendoan','$nganh','$loaidoan','$giangvienhd','$thoigianth','$trangthai','$diemdoan')";
        $query = $this->_query($sql);
        return $query;
    }
    public function update($tendoan,$nganh,$loaidoan,$giangvienhd,$thoigianth,$trangthai,$diemdoan,$iddoan){
        $sql = "UPDATE doan SET  tendoan = '$tendoan', nganh='$nganh',loaidoan='$loaidoan',giangvienhd='$giangvienhd',thoigianth='$thoigianth',trangthai='$trangthai',diemdoan='$diemdoan'
        WHERE iddoan = '$iddoan'";
        if(isset($_SESSION["username"]) && $_SESSION['role'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
    }
   
}
?>