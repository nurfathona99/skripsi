<?php if(Session::has('success')): ?>
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
        ×
    </button>
    <h4>
        <i class="icon fa fa-check">
        </i>
        Success!
    </h4>
    <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>
<?php if(Session::has('danger')): ?>
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
        ×
    </button>
    <h4>
        <i class="icon fa fa-close">
        </i>
        Error!
    </h4>
    <?php echo e(Session::get('danger')); ?>

</div>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
        ×
    </button>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($error); ?>

    <br/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php /**PATH E:\Data\laragon\www\Penjadwalan1\resources\views/admin/_partials/notifications.blade.php ENDPATH**/ ?>