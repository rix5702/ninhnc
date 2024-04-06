<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm giảng viên mới </li>
            </ol>
        </nav>
    </div>
 </div>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
            <label  for="cars">Nhập mã giảng viên:</label>
                <input class="form-control" type="text" name="magv" placeholder="Mã giảng viên " aria-label="default input example">
            </div> 
            <div class="col-md-3">
            <label  for="cars">Nhập họ giảng viên:</label>
                <input class="form-control" type="text" name="hogv" placeholder="Họ tên đệm VD:'Nguyễn Văn'" aria-label="default input example">
            </div> 
            <div class="col-md-3">
            <label  for="cars">Nhập tên giảng viên:</label>
                <input class="form-control" type="text" name="tengv" placeholder=" Tên VD:'An'" aria-label="default input example">
            </div> 
            <div class="col-md-3">
            <label  for="cars">Nhập email giảng viên:</label>
                <input class="form-control" type="email" name="email" placeholder=" Email" aria-label="default input example">
            </div> 
         
            <div class="col-md-3">
            <label  for="cars">Nhập sđt giảng viên:</label>
                <input class="form-control" type="text" name="sdt" placeholder=" Số điện thoại" aria-label="default input example">
            </div> 
            <div class="col-md-3">
                <label  for="cars">Chọn bộ môn:</label>
                <select  class="form-select"  id="nganh" name="bomon">
                <?php while($ng = mysqli_fetch_array($allnganh)): ?>
                    <option value="<?php echo $ng['idnganh'] ?>"><?php echo $ng['tennganh'] ?></option>
                <?php endwhile; ?>
                </select>
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
                <label  for="cars">Chọn user:</label>
                <select  class="form-select"  id="userid" name="userid">
                <?php while($usr = mysqli_fetch_array($alluser)): ?>
                    <option value="<?php echo $usr['userid'] ?>"><?php echo $usr['username'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
            <div class="col-md-3">
                <button type="submit" name="themgv" class="btn text-bg-primary">Thêm</button>
            </div>
    </div>
</form>