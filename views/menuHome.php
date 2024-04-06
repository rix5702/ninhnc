<ul>
    <?php foreach($nganh as $ng): ?>
    <li><a href='?controller=doan&action=show&id=<?php echo $ng['idnganh']?>'><?php echo $ng['tennganh'] ?></a></li>
    <?php endforeach; ?>
</ul>

