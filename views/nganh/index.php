
<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ngành</li>
                </ol>
            </nav>
        </div>
    </div>
    <table class="table table-light table-striped table-hover m-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Ngành</th>
                <th scope="col">Khoa</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php  
                $i = 1;
                while($nganh = mysqli_fetch_array($pageNganh)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $nganh['tennganh']?></td>
                <td><?php echo $nganh['tenkhoa']?></td>
                <td>
                        <button type="button" class="btn btn-primary">
                            <a class="text-white" href="admin.php?controller=nganh&action=update&id=<?php echo $nganh['idnganh']; ?>">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <a  class= "text-white" href="admin.php?controller=nganh&action=delete&id=<?php echo $nganh['idnganh'] ?>">
                                <i class="bi bi-trash3-fill"></i>
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
    $rowcount = mysqli_num_rows($allNganh);
    $trang = ceil($rowcount/10);
    ?>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=nganh&page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>"
                             aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-primary';} ?>" 
                                    href="admin.php?controller=nganh&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=nganh&page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;} ?>" 
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>



