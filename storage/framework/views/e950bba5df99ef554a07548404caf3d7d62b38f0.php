
<?php $__env->startSection('content'); ?>
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>  
    </div><br />
  <?php endif; ?>
  <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a href="/<?php echo e(Request::path()); ?>/create">
                            <button type="button" class="btn btn-secondary" title="Add New" data-original-title="Add New">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
                        </a> &nbsp;
                        <a href="<?php echo e(route('marks.index')); ?>">
                            <button type="button" class="btn btn-secondary" title="Marks" data-original-title="Marks">
                            <i class="fa fa-plus" aria-hidden="true"></i> Marks</button>
                        </a>
                </div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Name</td>
          <td>Age</td>
          <td>Gender</td>
          <td>reporting</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($students->name); ?></td>
            <td><?php echo e($students->age); ?></td>
            <td><?php echo e($students->gender); ?></td>
            <td><?php echo e($students->teacher_name); ?></td>
            <td class="text-center">
                <a href="<?php echo e(route('students.edit', $students->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                <form action="<?php echo e(route('students.destroy', $students->id)); ?>" method="post" style="display: inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_latest\htdocs\student_management\resources\views/index.blade.php ENDPATH**/ ?>