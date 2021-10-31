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
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Employee First Name: <span class="card-text"><b><?php echo e($employee->first_name); ?></b></span></div>
                <div class="card-title">Employee Last Name: <span class="card-text"><b><?php echo e($employee->last_name); ?></b></span></div>
                <div class="card-title">Company: <span class="card-text"><b><?php echo e($employee->CompanyTitle); ?></b></span></div>
                <div class="card-title">Email: <span class="card-text"><b><?php echo e($employee->email); ?></b></span></div>
                <div class="card-title">Phone: <span class="card-text"><b><?php echo e($employee->phone); ?></b></span></div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Mini-CRM\resources\views/employee/view.blade.php ENDPATH**/ ?>