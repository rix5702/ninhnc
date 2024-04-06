<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=nganh">Ngành</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa thông tin giảng viên</li>
            </ol>
        </nav>
    </div>
 </div>
<?php 
    while($gv = mysqli_fetch_assoc($giangvien)):
        
?>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
                <label  for="cars">Nhập mã giảng viên:</label>
                <input class="form-control" type="text" name="magv" value="<?php echo $gv['magv'] ?>" aria-label="default input example">
                <input type="hidden" name="idgv" value="<?php echo $gv['idgv'] ?>">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập họ và tên đệm :</label>
                <input class="form-control" type="text" name="hogv" value="<?php echo $gv['hogv'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập tên :</label>
                <input class="form-control" type="text" name="tengv" value="<?php echo $gv['tengv'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập Email:</label>
                <input class="form-control" type="email" name="email" value="<?php echo $gv['email'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập số điện thoại :</label>
                <input class="form-control" type="text" name="sdt" value="<?php echo $gv['sdt'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label  for="cars">Chọn khoa:</label>
                <select  class="form-select"  id="khoa" name="khoa">
                <?php while($kh = mysqli_fetch_array($allkhoa)): ?>
                    <option value="<?php echo $kh['idkhoa'] ?>"><?php echo $kh['tenkhoa'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label  for="cars">Chọn bộ môn:</label>
                <select  class="form-select"  id="bomon" name="bomon">
                <?php while($ng = mysqli_fetch_array($allnganh)): ?>
                    <option value="<?php echo $ng['idnganh'] ?>"><?php echo $ng['tennganh'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label  for="cars">Chọn user:</label>
                <select  class="form-select"  id="userid" name="userid">
                <?php while($usr = mysqli_fetch_array($alluser)): ?>
                    <option value="<?php echo $usr['userid'] ?>"><?php echo $usr['username'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" name="suagv" class="btn text-bg-primary">Cập nhật</button>
            </div>
    </div>
</form>
<?php
    endwhile;
?>