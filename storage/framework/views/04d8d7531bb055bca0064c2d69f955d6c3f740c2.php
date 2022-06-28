
<?php $__env->startSection('content'); ?>
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add User
  </div>
  <div class="card-body">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div><br />
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('students.store')); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" />
          </div>
          <div class="form-group">
              <label for="email">Age</label>
              <input type="number" class="form-control" name="age" maxlength="3" />
          </div>
          <div class="form-group">
              <label for="phone">Gender</label>
              <select class="form-control" name="gender" value="<?php echo e(old('gender')); ?>">
                <option disabled selected> Select Gender </option>
                <option value="male"> Male </option>
                <option value="female"> Female </option>
            </select>
          </div>
          <div class="form-group">
              <label for="password">Reporting</label>
              <select class="form-control" name="reporting_id" value="<?php echo e(old('reporting_id')); ?>"> 
                <option disabled selected> Select Reporting </option>
                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->teacher_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create User</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_latest\htdocs\student_management\resources\views/create.blade.php ENDPATH**/ ?>