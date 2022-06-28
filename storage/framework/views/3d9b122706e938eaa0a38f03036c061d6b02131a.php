
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
    Edit & Update
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
      <form method="post" action="<?php echo e(route('students.update', $student->id)); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PATCH'); ?>
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo e($student->name); ?>"/>
          </div>
          <div class="form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" name="age" value="<?php echo e($student->age); ?>"/>
          </div>
          <div class="form-group">
              <label for="phone">Gender</label>
              <select class="form-control" name="gender" required>
                <option disabled selected> Select Gender </option>
                <option value="male" <?php if($student->gender == "male"){ echo "selected"; }?> > Male </option>
                <option value="female"  <?php if($student->gender == "female"){ echo "selected";}?> > Female </option>
            </select>
          </div>
          <div class="form-group">
              <label for="password">Reporting</label>
             <select class="form-control" name="reporting_id" value="<?php echo e(old('reporting_id')); ?>" required> 
                <option disabled selected> Select Reporting </option>
                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($teacher->id); ?>" <?php if($student->reporting_id == $teacher->id){ echo "selected"; }?>><?php echo e($teacher->teacher_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_latest\htdocs\student_management\resources\views/edit.blade.php ENDPATH**/ ?>