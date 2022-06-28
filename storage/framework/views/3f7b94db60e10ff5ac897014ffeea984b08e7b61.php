
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
        <a href="<?php echo e(route('marks.create')); ?>">
            <button type="button" class="btn btn-secondary" title="Add Mark" data-original-title="Add Mark">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Mark</button>
        </a>
  </div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Name</td>
          <td>Subject</td>
          <td>Term</td>
          <td>Marks</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $students_marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_marks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($student_marks->name); ?></td>
            <td><?php echo e($student_marks->subject_name); ?></td>
            <td><?php echo e($student_marks->term); ?></td>
            <td><?php echo e($student_marks->mark); ?></td>
            <td class="text-center">
                <a href="<?php echo e(route('marks.edit', $student_marks->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                <form action="<?php echo e(route('marks.destroy', $student_marks->id)); ?>" method="post" style="display: inline-block">
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_latest\htdocs\student_management\resources\views/marks/index.blade.php ENDPATH**/ ?>