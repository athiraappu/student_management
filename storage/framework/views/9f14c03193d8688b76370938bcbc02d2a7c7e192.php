
<?php $__env->startSection('content'); ?>
<style>
    .container {
      max-width: 1020px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add Mark
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

    <?php if($students_marks->pk){?>
       <form method="post" action="<?php echo e(route('marks.update', $students_marks->pk)); ?>">
    <?php }else{?>
       <form method="post" action="<?php echo e(route('marks.store')); ?>">
    <?php }?>
     
          <div class="form-group" style="width: 100%">
              <?php echo csrf_field(); ?>
              <label for="name">Name</label>
               <select class="form-control" name="student" value="<?php echo e(old('student')); ?>" required> 
                <option disabled selected> Select Student </option>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($student->id); ?>" <?php if($students_marks->student_id ==$student->id) echo "selected"; ?> ><?php echo e($student->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
          <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Subject</th>
                    <th>Term</th>
                    <th>Marks</th>
                    <th>Action</th>
                </tr>
                <tr>
                  <td>
                    <select class="form-control" name="addMoreInputFields[0][subject]"> 
                      <option disabled selected> Select Subject </option>
                      <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($subject->id); ?>" <?php if($students_marks->subject_id ==$subject->id) echo "selected"; ?>><?php echo e($subject->subject_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </td>
                    <td><input type="text" name="addMoreInputFields[0][term]" value="<?php echo $students_marks->term;?>" placeholder="Enter Term" class="form-control" />
                    </td>
                    <td><input type="number" name="addMoreInputFields[0][mark]" value="<?php echo $students_marks->mark;?>"  placeholder="Enter Mark" class="form-control" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></td>
                </tr>
            </table>
          <button type="submit" class="btn btn-block btn-danger"><?php if($students_marks->pk){ echo "Update"; }else{ echo "Save";} ?></button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
 <?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () { //alert('aaaa');
        ++i;
        hmtl='';
        // $("#dynamicAddRemove").append(
          hmtl = '<tr><td><select class="form-control" name="addMoreInputFields[' + i +
            '][subject]"><option value="">Select Subject</option>';
            <?php foreach($subjects as $subject){?>
               hmtl=hmtl+'<option value="<?php echo $subject->id;?>"><?php echo $subject->subject_name;?></option>'
               
            <?php }?>

            hmtl=hmtl+'</select></td><td><input type="text" name="addMoreInputFields[' + i +
            '][term]" placeholder="Enter Term" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][mark]" placeholder="Enter Mark" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>';
            // );
            $("#dynamicAddRemove").append(hmtl);
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_latest\htdocs\student_management\resources\views/marks/create.blade.php ENDPATH**/ ?>