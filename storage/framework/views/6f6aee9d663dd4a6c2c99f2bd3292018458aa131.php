  <body>
    <div class="container mt-3">
        <form action="<?php echo e(route('student.store')); ?>" method="post">
                <div class="row">
                    <div class="col-xl-8 p-4 m-auto shadow">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title text-info"> Add Student </h5>
                            </div>
                        <div class="card-body">

                    
                        <?php if(Session::has('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(Session::get('success')); ?>

                                <?php
                                    Session::forget('success');
                                ?>
                            </div>
                        <?php endif; ?>

                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                                                <div class="form-group" <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>>
                                                    <label> First Name </label>
                                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" value="<?php echo e(old('first_name')); ?>">
                                                    <?php echo $errors->first('first_name', '<small class="text-danger">:message</small>'); ?>

                                                </div>

                                                <div class="form-group" <?php echo e($errors->has('dob') ? 'has-error' : ''); ?>>
                                                    <label> Date of Birth </label>
                                                    <input type="date" name="dob" placeholder="Date of Birth" class="form-control" value="<?php echo e(old('dob')); ?>">
                                                    <?php echo $errors->first('dob', '<small class="text-danger">:message</small>'); ?>

                                                </div>

                                                <div class="form-group" <?php echo e($errors->has('email') ? 'has-error' : ''); ?>>
                                                    <label> Email </label>
                                                    <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo e(old('email')); ?>">
                                                    <?php echo $errors->first('email', '<small class="text-danger">:message </small>'); ?>

                                                </div>

                                                <div class="form-group" <?php echo e($errors->has('address') ? 'has-error' : ''); ?>>
                                                    <label> Address </label>
                                                        <input class="form-control" placeholder="Address" type="text" name="address" value="<?php echo e(old('address')); ?>">
                                                        <?php echo $errors->first('address', '<small class="text-danger">:message </small>'); ?>

                                                </div>
                                            </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                                            <div class="form-group" <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>>
                                                <label> Last Name </label>
                                                <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="<?php echo e(old('last_name')); ?>">
                                                <?php echo $errors->first('last_name', '<small class="text-danger">:message </small>'); ?>

                                            </div>

                                            <div class="form-group" <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>>
                                                <label> Gender </label>
                                                <select class="form-control" name="gender" value="<?php echo e(old('gender')); ?>">
                                                    <option disabled selected> Select Gender </option>
                                                    <option value="male"> Male </option>
                                                    <option value="female"> Female </option>
                                                </select>
                                                <?php echo $errors->first('gender', '<small class="text-danger">:message </small>'); ?>

                                            </div>

                                            <div class="form-group" <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>>
                                                <label> Phone </label>
                                                <input type="phone" name="phone" placeholder="Phone no" class="form-control" value="<?php echo e(old('phone')); ?>">
                                                <?php echo $errors->first('phone', '<small class="text-danger">:message </small>'); ?>

                                            </div>

                                            <div class="form-group" <?php echo e($errors->has('zipcode') ? 'has-error' : ''); ?>>
                                                <label> Zipcode </label>
                                                <input type="number" name="zipcode" class="form-control" placeholder="Zipcode" value="<?php echo e(old('zipcode')); ?>">
                                                <?php echo $errors->first('zipcode', '<small class="text-danger">:message </small>'); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="submit"> Submit </button>
                                    </div>
                                    <?php echo e(csrf_field()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php echo $__env->make('./student/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_latest\htdocs\student_management\resources\views/students/create.blade.php ENDPATH**/ ?>