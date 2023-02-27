<?php $__env->startSection('title'); ?>
<?php echo e($title= 'Hasil Generate Algoritma'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style type="text/css">
.panel-body{
       width:auto;
       height:auto;
       overflow:auto;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $('#myAction').change(function(){
        var action =  $(this).val();
        window.location = action;
    });
</script>
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
                            <div class="col-md-4">

                                    <span class="glyphicon glyphicon-hand-left">
                                    </span>
                                    Kembali

                            </div>
                            <div class="col-md-4" style="padding-bottom: 3%;">
                                <a class="btn btn-info btn-block" href="<?php echo e(route('admin.generates.excel', $id)); ?>">
                                    <span class="glyphicon glyphicon-download">
                                    </span>
                                    Export Excel Data Ini
                                </a>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 3%;">
                            <?php if(!empty($data_kromosom)): ?>
                                <select class="form-control select2" id="myAction">
                                <?php $__currentLoopData = $data_kromosom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kromosom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key+1); ?>"
                                    <?php if($id == ($key+1)): ?>
                                        selected="selected">
                                    <?php else: ?>
                                        >
                                    <?php endif; ?>
                                            <?php if($kromosom['value_schedules'] == 1): ?>
                                                Jadwal Terbaik
                                            <?php else: ?>
                                                Jadwal <?php echo e($key+1); ?>

                                            <?php endif; ?>
                                    </li>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php endif; ?>
                            </div>
                            <div class="col-md-12">
                            
                            <br>
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
                                    ×
                                </button>
                                <h4>
                                    Nilai Fitness : 1 / 1 + ( 0 <?php echo e($value_schedule->value_process); ?> ) = <?php echo e($value_schedule->value); ?>

                                    <br>
                                </h4>
                                <h4>
                                    Crossover : <?php echo e($crossover->value); ?>

                                    <br>
                                </h4>
                                <h4>
                                    Mutasi : <?php echo e($mutasi->value); ?>

                                    <br>
                                </h4>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th style="text-align:center;">
                                                No.
                                            </th>
                                            <th style="text-align:center;">
                                                Hari
                                            </th>
                                            <th style="text-align:center;">
                                                Jam
                                            </th>
                                            <th style="text-align:center;">
                                                Nama Ruangan
                                            </th>
                                            <th style="text-align:center;">
                                                Kapasitas Ruangan
                                            </th>
                                            <th style="text-align:center;">
                                                Mata Kuliah
                                            </th>
                                            <th style="text-align:center;">
                                                Dosen Pengampu
                                            </th>
                                            <th style="text-align:center;">
                                                Semester
                                            </th>
                                            <th style="text-align:center;">
                                                SKS
                                            </th>
                                            <th style="text-align:center;">
                                                Kelas
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td align="center">
                                                <?php echo e($key + 1); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->day->name_day) ? $schedule->day->name_day : ''); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->time->range) ? $schedule->time->range : ''); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->room->name) ? $schedule->room->name : ''); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->room->capacity) ? $schedule->room->capacity : ''); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->teach->course->name) ? $schedule->teach->course->name : ''); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->teach->lecturer->name) ? $schedule->teach->lecturer->name : ''); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->teach->course->semester) ? $schedule->teach->course->semester : ''); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->teach->course->sks) ? $schedule->teach->course->sks : ''); ?>

                                            </td>
                                            <td >
                                                <?php echo e(isset($schedule->teach->class_room) ? $schedule->teach->class_room : ''); ?>

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
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Data\laragon\www\Penjadwalan\resources\views/admin/genetik/result.blade.php ENDPATH**/ ?>