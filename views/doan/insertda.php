<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm đề tài đồ án</li>
            </ol>
        </nav>
    </div>
 </div>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
            <label  for="cars">Nhập Tên đề tài đồ án:</label>
                <input class="form-control" type="text" name="tendoan" placeholder="Tên đồ án" aria-label="default input example">
            </div>       
            <div class="col-md-3">
            <label  for="cars">Nhập thời gian thực hiện đồ án:</label>
                <input class="form-control" type="date" name="thoigianth" placeholder="Tên đồ án" aria-label="default input example">
            </div> 
            <div class="col-md-3">
                <label  for="cars">Chọn ngành:</label>
                <select  class="form-select"  id="nganh" name="nganh">
                <?php while($ng = mysqli_fetch_array($allnganh)): ?>
                    <option value="<?php echo $ng['idnganh'] ?>"><?php echo $ng['tennganh'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label  for="cars">Chọn loại đồ án:</label>
                <select  class="form-select"  id="loaidoan" name="loaidoan">
                <?php while($loai = mysqli_fetch_array($allloai)): ?>
                    <option value="<?php echo $loai['idloaidoan'] ?>"><?php echo $loai['tenloai'] ?></option>
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
                <button type="submit" name="themda" class="btn text-bg-primary">Thêm</button>
            </div>
    </div>
</form>