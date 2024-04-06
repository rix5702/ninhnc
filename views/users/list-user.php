
<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User</li>
                </ol>
            </nav>
        </div>
    </div>
    <table class="table table-light table-striped table-hover m-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">UserID</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php  
                $i = 1;
                while($usr = mysqli_fetch_array($User)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $usr['userid']?></td>
                <td><?php echo $usr['username']?></td>
                <td><?php echo $usr['role']?></td>
                <td>
                        <button type="button" class="btn btn-primary">
                            <a class="text-white" href="admin.php?controller=nganh&action=update&id=<?php echo $usr['userid']; ?>">
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
    $rowcount = mysqli_num_rows($alluser);
    $trang = ceil($rowcount/10);
    ?>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=user&page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>"
                             aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-primary';} ?>" 
                                    href="admin.php?controller=user&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=user&page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;} ?>" 
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>



