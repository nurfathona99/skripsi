<?php $__env->startSection('title'); ?>
<?php echo e($title= 'Generate Algoritma'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style type="text/css">
.panel-body{
       width:auto;
       height:auto;
       overflow-x:auto;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <?php echo e($title); ?>

                        </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus">
                                </i>
                            </button>
                            <button class="btn btn-box-tool" data-widget="remove" type="button">
                                <i class="fa fa-times">
                                </i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                        <?php echo Form::open(['role' => 'form', 'route' => 'admin.generates.submit', 'id' => 'form-register', 'method' => 'get']); ?>


                            <div class="col-md-6">
                                <div class="form-group">
                                  <?php echo Form::select('kromosom', [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                  ], ); ?>

                                <label id="kromosom-error" class="error" for="kromosom" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                  <?php echo Form::select('generasi', [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                  ], ); ?>

                                <label id="generasi-error" class="error" for="generasi" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                <label id="crossover-error" class="error" for="crossover" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                 

                                  <label id="mutasi-error" class="error" for="mutasi" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-bottom: 15px;">
                                <?php echo Form::submit('Generate',['class'=>'btn btn-default btn-block']); ?>

                            </div>
                            <div class="col-md-12">
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Data\laragon\www\Penjadwalan\resources\views/admin/genetik/index.blade.php ENDPATH**/ ?>