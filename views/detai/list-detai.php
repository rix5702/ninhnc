
<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách đề tài nghiên cứu</li>
                </ol>
            </nav>
        </div>
    </div>
    <table class="table table-light table-striped table-hover m-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên đề tài nghiên cứu</th>
                <th scope="col">Loại đề tài</th>
                <th scope="col">Giảng viên hướng dẫn</th>
                <th scope="col">Thời gian thực hiện</th>               
                <th scope="col">Trạng thái</th>
                <th scope="col">Điểm</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php  
                $i = 1;
                while($detai = mysqli_fetch_array($pagedetai)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $detai['tendetai']?></td>
                <td><?php echo $detai['tenloai']?></td>
                <td><?php echo $detai['hogv'].$detai['tengv']?></td>
                <td><?php echo $detai['thoigianth']?></td>
                <td><?php echo $detai['tentrangthai']?></td> 
                <td><?php echo $detai['diem']?></td>
                <td>
                        <button type="button" class="btn btn-primary">
                            <a class="text-white" href="admin.php?controller=detai&action=update&iddetai=<?php echo $detai['iddetai']; ?>">
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
    $rowcount = mysqli_num_rows($alldetai);
    $trang = ceil($rowcount/10);
    ?>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=detai&page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>"
                             aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-primary';} ?>" 
                                    href="admin.php?controller=detai&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=doan&page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;} ?>" 
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>



