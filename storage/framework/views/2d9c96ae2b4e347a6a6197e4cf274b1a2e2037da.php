<?php $__env->startSection('title'); ?>
<?php echo e($title= 'Ruangan'); ?>

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
                        <?php echo Form::open(['role' => 'form', 'route' => 'admin.ruangan', 'method' =>'get']); ?>

                            
                            <div class="col-md-12" style="padding-bottom: 15px;">
                                <?php echo Form::submit('Search',['class'=>'btn btn-default btn-block']); ?>

                            </div>
                            <div class="col-md-12">
                            <?php echo Form::close(); ?>

                            <?php echo $__env->make('admin._partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th style="text-align:center;">
                                                No.
                                            </th>
                                            <th style="text-align:center;">
                                                Kode Ruangan
                                            </th>
                                            <th style="text-align:center;">
                                                Nama Ruangan
                                            </th>
                                            <th style="text-align:center;">
                                                Kapasitas
                                            </th>
                                            <th style="text-align:center;">
                                                Jenis
                                            </th>
                                           <th colspan="2" style="text-align:center;">
                                                <a class="btn btn-primary" href="<?php echo e(route('admin.ruangan.create')); ?>">
                                                    <i class="fa fa-plus">
                                                    </i>
                                                    Tambah Data
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td align="center">
                                                <?php echo e(($rooms->currentpage()-1) * $rooms->perpage() + $key + 1); ?>

                                            </td>
                                             <td>
                                                <?php echo e($room->code_rooms); ?>

                                            </td>
                                            <td>
                                                <?php echo e($room->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($room->capacity); ?>

                                            </td>
                                            <td>
                                                <?php echo e($room->type); ?>

                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-warning btn-sm" href="<?php echo e(route('admin.ruangan.edit', $room->id)); ?>">
                                                        <span class="glyphicon glyphicon-edit">
                                                        </span>
                                                        Ubah
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <?php echo Form::model($room, ['route' => ['admin.ruangan.delete', $room->id], 'onclick' => 'return confirm("Anda Yakin?");']); ?>

                                                    <?php echo Form::hidden('_method', 'DELETE'); ?>

                                                    <?php echo Form::button('
                                                    <span class="glyphicon glyphicon-trash">
                                                    </span>
                                                    Hapus', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']); ?>

                                                <?php echo Form::close(); ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Data\laragon\www\Penjadwalan\resources\views/admin/room/index.blade.php ENDPATH**/ ?>