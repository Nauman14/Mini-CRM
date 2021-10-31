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
        <h1>Add New Employee</h1>
        <form method="POST" action="<?php echo e(route('employee.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="firstname">Employee First Name: </label>
                <input type="text" name="employeeFirstName" id="employeeFirstName" class="form-control" placeholder="Enter First Name">
                <?php if($errors->has('employeeFirstName')): ?>
                    <span style="color: red"><?php echo e($errors->first('employeeFirstName')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="lastname">Employee Last Name: </label>
                <input type="text" name="employeeLastName" id="employeeLastName" class="form-control" placeholder="Enter Last Name">
                <?php if($errors->has('employeeLastName')): ?>
                    <span style="color: red"><?php echo e($errors->first('employeeLastName')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="website">Company: </label>
                <select class="form-control" id="CompanyId" name="CompanyId">
                    <option value=""> -- Select Company -- </option>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($company->id); ?>"><?php echo e($company->CompanyTitle); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('CompanyId')): ?>
                    <span style="color: red"><?php echo e($errors->first('CompanyId')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Employee Email: </label>
                <input type="email" name="employeeEmail" id="employeeEmail" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="number">Employee Number: </label>
                <input type="number" name="employeeNumber" id="employeeNumber" class="form-control" placeholder="Enter Contact Number">
            </div>
            <button class="btn btn-primary">Add</button>
        </form>
    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Mini-CRM\resources\views/employee/create.blade.php ENDPATH**/ ?>