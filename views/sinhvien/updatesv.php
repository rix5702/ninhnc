<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=nganh">Ngành</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa thông tin sinh viên</li>
            </ol>
        </nav>
    </div>
 </div>
<?php 
    while($sv = mysqli_fetch_assoc($sinhvien)):
        
?>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
                <label  for="cars">Nhập mã số sinh viên:</label>
                <input class="form-control" type="text" name="mssv" value="<?php echo $sv['mssv'] ?>" aria-label="default input example">
                <input type="hidden" name="idsv" value="<?php echo $sv['idsv'] ?>">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập họ và tên đệm :</label>
                <input class="form-control" type="text" name="hosv" value="<?php echo $sv['hosv'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập tên :</label>
                <input class="form-control" type="text" name="tensv" value="<?php echo $sv['tensv'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập Email:</label>
                <input class="form-control" type="email" name="email" value="<?php echo $sv['email'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập số điện thoại :</label>
                <input class="form-control" type="text" name="sdt" value="<?php echo $sv['sdt'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label  for="cars">Nhập tên Lớp :</label>
                <input class="form-control" type="text" name="lop" value="<?php echo $sv['lop'] ?>" aria-label="default input example">
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
                <label  for="cars">Chọn user:</label>
                <select  class="form-select"  id="userid" name="userid">
                <?php while($usr = mysqli_fetch_array($alluser)): ?>
                    <option value="<?php echo $usr['userid'] ?>"><?php echo $usr['username'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" name="suasv" class="btn text-bg-primary">Cập nhật</button>
            </div>
    </div>
</form>
<?php
    endwhile;
?>