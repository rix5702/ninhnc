
<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách giảng viên</li>
                </ol>
            </nav>
        </div>
    </div>
    <table class="table table-light table-striped table-hover m-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã giảng viên</th>
                <th scope="col">Họ giảng viên</th>
                <th scope="col">Tên giảng viên</th>
                <th scope="col">Email</th>
                <th scope="col">SĐT</th>
                <th scope="col">Bộ môn</th>
                <th scope="col">Khoa</th>
                <th scope="col">username</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php  
                $i = 1;
                while($giangvien = mysqli_fetch_array($pagegiangvien)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $giangvien['magv']?></td>
                <td><?php echo $giangvien['hogv']?></td>
                <td><?php echo $giangvien['tengv']?></td>
                <td><?php echo $giangvien['email']?></td>
                <td><?php echo $giangvien['sdt']?></td>
                <td><?php echo $giangvien['tennganh']?></td> 
                <td><?php echo $giangvien['tenkhoa']?></td>
                <td><?php echo $giangvien['username']?></td>
                <td>
                        <button type="button" class="btn btn-primary">
                            <a class="text-white" href="admin.php?controller=giangvien&action=update&idgv=<?php echo $giangvien['idgv']; ?>">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                        </button>
                        
                                            
                    </td>
                </tr>
            </tbody>
        <?php 
            $i++;
            endwhile;
        ?>
    </table>

    <?php
    $rowcount = mysqli_num_rows($allgiangvien);
    $trang = ceil($rowcount/10);
    ?>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=giangvien&page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>"
                             aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-primary';} ?>" 
                                    href="admin.php?controller=giangvien&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=giangvien&page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;} ?>" 
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>



