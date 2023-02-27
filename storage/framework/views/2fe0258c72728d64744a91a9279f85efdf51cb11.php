<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Optimasi Penjadwalan</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(URL::to('assets/img/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(URL::to('assets/img/favicon/favicon-32x32.png')); ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo e(URL::to('assets/img/favicon/favicon-16x16.png')); ?>" sizes="16x16">
    <link rel="manifest" href="<?php echo e(URL::to('assets/img/favicon/manifest.json')); ?>">
    <link rel="mask-icon" href="<?php echo e(URL::to('assets/img/favicon/safari-pinned-tab.svg')); ?>" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo e(URL::to('assets/img/favicon/favicon.ico')); ?>">
    <meta name="msapplication-config" content="<?php echo e(URL::to('assets/img/favicon/browserconfig.xml')); ?>">
    <meta name="theme-color" content="#ffffff">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo e(asset('admin/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/iCheck/square/blue.css')); ?>">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#">
                <b>
                    Optimasi
                </b>
                Penjadwalan
            </a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php echo $__env->make('admin._partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo Form::open(['route' => 'admin.login.submit']); ?>


            <div class="form-group has-feedback">

                <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']); ?>


                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">

                <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']); ?>


                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            
                        </label>
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        Sign In
                    </button>
                </div>
                <!-- /.col -->
            </div>

            <?php echo Form::close(); ?>


            <br>
        </div>
    </div>

<script src="<?php echo e(asset('admin/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
<?php /**PATH E:\Data\laragon\www\Penjadwalan\resources\views/admin/site/login.blade.php ENDPATH**/ ?>