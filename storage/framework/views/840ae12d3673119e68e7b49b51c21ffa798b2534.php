<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.employee-master','data' => []]); ?>
<?php $component->withName('employee-master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('username'); ?>
        <?php echo e(session('username')); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
            <h1>Employees</h1>
            <?php if(session('delete')): ?>
                <div align="center" class="col-lg-12 alert alert-danger"><?php echo e(session('delete')); ?></div>
            <?php elseif(session('add')): ?>
                <div align="center" class="col-lg-12 alert alert-success"><?php echo e(session('add')); ?></div>
            <?php elseif(session('update')): ?>
                <div align="center" class="col-lg-12 alert alert-primary"><?php echo e(session('update')); ?></div>
            <?php endif; ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Employee First Name</th>
                                <th>Employee Last Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><a href="<?php echo e(route('employee.edit',base64_encode($employee->id))); ?>" title="click to edit"><?php echo e($employee->first_name); ?></a></td>
                                    <td><?php echo e($employee->last_name); ?></td>
                                    <td><?php echo e($employee->CompanyTitle); ?></td>
                                    <td><?php echo e($employee->email); ?></td>
                                    <td><?php echo e($employee->phone); ?></td>
                                    <td><?php echo e($employee->created_at->diffForHumans()); ?></td>
                                    <td><?php echo e($employee->updated_at->diffForHumans()); ?></td>
                                    <td><a href="<?php echo e(route('employee.show',base64_encode($employee->id))); ?>" class="btn btn-primary">View</a></td>
                                    <td><form method="POST" action="<?php echo e(route('employee.destroy',base64_encode($employee->id))); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?> <button type="submit" class="btn btn-danger">Delete</button></form></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo e($employees->links()); ?>

    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Mini-CRM\resources\views/employee/index.blade.php ENDPATH**/ ?>