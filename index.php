<?php

require_once ('./vendor/autoload.php');
use App\Core\ControllerLoader;
?>

<!DOCTYPE html>
<html>
    <?php include ('./App/Views/templates/head.php'); ?>
    <body>
        <?php include ('./App/Views/templates/header.php'); ?>
        <div class="container mt-6">
            <div class="card">
                <?php $controller = new ControllerLoader(); ?>
            </div>
        </div>
        <?php include ('./App/Views/templates/footer.php'); ?>
    </body>
</html>


