<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm đề tài nghiên cứu</li>
            </ol>
        </nav>
    </div>
 </div>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
            <label  for="cars">Nhập Tên đề tài nghiên cứu:</label>
                <input class="form-control" type="text" name="tendetai" placeholder="Tên đồ án" aria-label="default input example">
            </div>       
            <div class="col-md-3">
            <label  for="cars">Nhập thời gian thực hiện đề tài nghiên cứu:</label>
                <input class="form-control" type="date" name="thoigianth" placeholder="Tên đồ án" aria-label="default input example">
            </div> 
            <div class="col-md-3">
                <label  for="cars">Chọn loại đề tài:</label>
                <select  class="form-select"  id="loaidetai" name="loaidetai">
                <?php while($ldt = mysqli_fetch_array($allloai)): ?>
                    <option value="<?php echo $ldt['idloaidetai'] ?>"><?php echo $ldt['tenloai'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label  for="cars">Chọn giảng viên hướng dẫn môn:</label>
                <select  class="form-select"  id="giangvienhd" name="giangvienhd">
                <?php while($gv = mysqli_fetch_array($allgv)): ?>
                    <option value="<?php echo $gv['idgv'] ?>"><?php echo $gv['hogv'].$gv['tengv'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label  for="cars">Chọn trạng thái:</label>
                <select  class="form-select"  id="trangthai" name="trangthai">
                <?php while($tt = mysqli_fetch_array($alltrangthai)): ?>
                    <option value="<?php echo $tt['idtrangthai'] ?>"><?php echo $tt['tentrangthai'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
            <div class="col-md-3">
                <button type="submit" name="themdetai" class="btn text-bg-primary">Thêm</button>
            </div>
    </div>
</form>