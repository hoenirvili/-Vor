<!DOCTYPE html>
<html>
<?php require_once('base/header.php');?>
<body>
    <div class="container-fluid full-layout">
        <div class="row full-layout">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-column full-layout">
                <div class="jumbotron text-center error">
                    <h1>
                        <i class="fa fa-flag-o" aria-hidden="true"></i>
                        <?php echo $code ?>
                    </h1>
                    <p><?php echo $message ?></p>
                    <p>
                        <a class="btn btn-primary btn-lg" href="/" role="button">
                            Get me out of here
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php require_once('base/footer.php'); ?>
</body>
</html>