<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm Ngành mới </li>
            </ol>
        </nav>
    </div>
 </div>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
            <label  for="cars">Nhập tên ngành:</label>
                <input class="form-control" type="text" name="tennganh" placeholder="Tên Ngành" aria-label="default input example">
            </div> 
            <div class="col-md-3">
                <label  for="cars">Chọn Khoa:</label>
                <select  class="form-select"  id="khoa" name="khoa">
                <?php while($kh = mysqli_fetch_array($allKhoa)): ?>
                    <option value="<?php echo $kh['idkhoa'] ?>"><?php echo $kh['tenkhoa'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" name="them" class="btn text-bg-primary">Thêm</button>
            </div>
    </div>
</form>