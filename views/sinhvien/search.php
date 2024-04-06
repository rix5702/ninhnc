
<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none" href="admin.php?controller=sinhvien">Danh sách sinh viên</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm sinh viên</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container bg-white mb-2 ">
        <div class="col-md-4">
            <h4>sinh viên tìm được</h4>
        </div>
    </div>
    <p>
        <?Php 
            if(isset($txtErro) && ($txtErro !='')){
                echo $txtErro;
            }
        ?>
    </p>
    <table class="table table-light table-striped table-hover m-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">MSSV</th>
                <th scope="col">Họ</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">SĐT</th>
                <th scope="col">Ngành</th>
                <th scope="col">username</th>
                <th scope="col">Lớp</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php  
                $i = 1;
                while($sinhvien = mysqli_fetch_array($txtSearch)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $sinhvien['mssv']?></td>
                <td><?php echo $sinhvien['hosv']?></td>
                <td><?php echo $sinhvien['tensv']?></td>
                <td><?php echo $sinhvien['email']?></td>
                <td><?php echo $sinhvien['sdt']?></td>
                <td><?php echo $sinhvien['tennganh']?></td> 
                <td><?php echo $sinhvien['username']?></td>
                <td><?php echo $sinhvien['lop']?></td>
                <td>
                        <button type="button" class="btn btn-primary">
                            <a class="text-white" href="admin.php?controller=sinhvien&action=update&idsv=<?php echo $sinhvien['idsv']; ?>">
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
    $rowcount = mysqli_num_rows($allsinhvien);
    $trang = ceil($rowcount/10);
    ?>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=sinhvien&page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>"
                             aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-primary';} ?>" 
                                    href="admin.php?controller=sinhvien&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=sinhvien&page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;} ?>" 
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>



