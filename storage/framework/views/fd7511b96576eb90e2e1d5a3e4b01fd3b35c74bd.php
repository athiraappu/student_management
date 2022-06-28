<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(url('student/create')); ?>" class="btn btn-info float-right"><i class="fas fa-plus-circle"></i> Add New </a>
        </div>
    </div>

    <table class="table table-striped table-bordered mt-4">
        <thead>
            <th> Name </th>
            <th> Age </th>
            <th> Gender </th>
            <th> reporting </th>
            <th> Action </th>
        </thead>

        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td> <?php echo e($student->full_name); ?> </td>
                <td> <?php echo e($student->dob); ?> </td>
                <td> <?php echo e($student->gender); ?> </td>
                <td> <?php echo e($student->email); ?> </td>
                <td> <?php echo e($student->phone); ?> </td>

                <td style="display: -webkit-inline-box;"> <a href="<?php echo e(route('student.show', $student->id )); ?>" class="badge badge-info"> View </a>
                    <a href="<?php echo e(route('student.edit', $student->id )); ?>" class="badge badge-success"> Edit </a>
                    <form action="<?php echo e(route('student.destroy', $student->id)); ?>" method="post">
                     <?php echo csrf_field(); ?>
                     <?php echo method_field('DELETE'); ?>
                        <button class="badge btn-danger" type="submit"> Delete </button>
                   </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<style>
    .btn-danger {
        height:20px;
        margin: 2px 3px;
        height: 20px;
        line-height: 1px;
        border: 0;
        padding: 0 5;
    }
</style>

<?php echo $__env->make('./student/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_latest\htdocs\student_management\resources\views/students/index.blade.php ENDPATH**/ ?>