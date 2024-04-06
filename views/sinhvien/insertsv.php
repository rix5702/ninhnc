<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm sinh viên mới </li>
            </ol>
        </nav>
    </div>
 </div>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
            <label  for="cars">Nhập mã số sinh viên:</label>
                <input class="form-control" type="text" name="mssv" placeholder="Mã số sinh viên " aria-label="default input example">
            </div> 
            <div class="col-md-3">
            <label  for="cars">Nhập họ sinh viên:</label>
                <input class="form-control" type="text" name="hosv" placeholder="Họ tên đệm VD:'Nguyễn Văn'" aria-label="default input example">
            </div> 
            <div class="col-md-3">
            <label  for="cars">Nhập tên sinh viên:</label>
                <input class="form-control" type="text" name="tensv" placeholder=" Tên VD:'An'" aria-label="default input example">
            </div> 
            <div class="col-md-3">
            <label  for="cars">Nhập email sinh viên:</label>
                <input class="form-control" type="email" name="email" placeholder=" Email" aria-label="default input example">
            </div> 
         
            <div class="col-md-3">
            <label  for="cars">Nhập sđt sinh viên:</label>
                <input class="form-control" type="text" name="sdt" placeholder=" Số điện thoại" aria-label="default input example">
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
            <label  for="cars">Nhập Lớp sinh viên:</label>
                <input class="form-control" type="text" name="lop" placeholder=" VD:'KTPM0220'" aria-label="default input example">
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
                <button type="submit" name="themsv" class="btn text-bg-primary">Thêm</button>
            </div>
    </div>
</form>