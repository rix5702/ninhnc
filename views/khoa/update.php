<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=nganh">Ngành</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa Tên Ngành </li>
            </ol>
        </nav>
    </div>
 </div>
<?php 
    while($kh = mysqli_fetch_assoc($khoa)): ?>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
                <input class="form-control" type="text" name="tenkhoa" value="<?php echo $kh['tenkhoa'] ?>" aria-label="default input example">
                <input type="hidden" name="idkhoa" value="<?php echo $kh['idkhoa'] ?>">
            </div>
            <div class="col-md-3">
                <button type="submit" name="sua" class="btn text-bg-primary">Cập nhật</button>
            </div>
    </div>
</form>
<?php
    endwhile;
?>