<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=nganh">Ngành</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa thông tin đề tài nghiên cứu</li>
            </ol>
        </nav>
    </div>
 </div>
<?php 
    while($dt = mysqli_fetch_assoc($detai)):
        
?>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
                <label  for="cars">Nhập tên đề tài đồ án:</label>
                <input class="form-control" type="text" name="tendetai" value="<?php echo $dt['tendetai'] ?>" aria-label="default input example">
                <input type="hidden" name="iddetai" value="<?php echo $dt['iddetai'] ?>">
            </div>
            <div class="col-md-3">
                <label  for="cars">Chọn loại đề tài :</label>
                <select  class="form-select"  id="loaidetai" name="loaidetai">
                <?php while($loai = mysqli_fetch_array($allloai)): ?>
                    <option value="<?php echo $loai['idloaidetai'] ?>"><?php echo $loai['tenloai'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label  for="cars">Giảng viên hướng dẫn :</label>
                <select  class="form-select"  id="giangvienhd" name="giangvienhd">
                <?php while($gv = mysqli_fetch_array($allgv)): ?>
                    <option value="<?php echo $gv['idgv'] ?>"><?php echo $gv['hogv'].$gv['tengv'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label  for="cars"> Thời gian thực hiện:</label>
                <input class="form-control" type="date" name="thoigianth" value="<?php echo $dt['thoigianth'] ?>" aria-label="default input example">
            </div>
        
            <div class="col-md-3">
                <label  for="cars">Trạng thái:</label>
                <select  class="form-select"  id="trangthai" name="trangthai">
                <?php while($tt = mysqli_fetch_array($alltrangthai)): ?>
                    <option value="<?php echo $tt['idtrangthai'] ?>"><?php echo $tt['tentrangthai'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label  for="cars"> Điểm:</label>
                <input class="form-control" type="text" name="diem" value="<?php echo $dt['diem'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <button type="submit" name="suadetai" class="btn text-bg-primary">Cập nhật</button>
            </div>
    </div>
</form>
<?php
    endwhile;
?>