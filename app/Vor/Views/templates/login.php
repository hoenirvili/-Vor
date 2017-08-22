<!DOCTYPE html>
<html>
<?php require_once('base/header.php');?>
<body>
    <div class="container-fluid full-layout">
        <div class="row full-layout">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-column full-layout">
                <form class="form-horizontal login has-feedback">
                    <h1 class="text-center login__headline">Login</h1>

                    <div class="form-group">
                        <label for="user" class="sr-only control-label">User</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" id="user" placeholder="User">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="sr-only control-label">Password</label>
                         <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="login__button btn btn-primary">Sign in</button>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me </label>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php require_once('base/footer.php'); ?>
</body>
</html>