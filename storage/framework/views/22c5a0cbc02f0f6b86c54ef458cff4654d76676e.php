<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.company-master','data' => []]); ?>
<?php $component->withName('company-master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php $__env->startSection('username'); ?>
    <?php echo e(session('username')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <h1>Add New Company</h1>
        <form method="POST" action="<?php echo e(route('company.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="title">Company Title: </label>
                <input type="text" name="companyTitle" id="companyTitle" class="form-control" placeholder="Enter Title">
                <?php if($errors->has('companyTitle')): ?>
                    <span style="color: red"><?php echo e($errors->first('companyTitle')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Company Email: </label>
                <input type="email" name="companyEmail" id="companyEmail" class="form-control" placeholder="Enter Email">
                <?php if($errors->has('companyEmail')): ?>
                    <span style="color: red"><?php echo e($errors->first('companyEmail')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="file">Company Logo: </label>
                <input type="file" name="company_logo" id="company_logo" class="form-control-file">
                <?php if($errors->has('company_logo')): ?>
                    <span style="color: red"><?php echo e($errors->first('company_logo')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="website">Company Website: </label>
                <input type="text" name="companyWebsite" id="companyWebsite" class="form-control" placeholder="Enter Website">
                <?php if($errors->has('companyWebsite')): ?>
                    <span style="color: red"><?php echo e($errors->first('companyWebsite')); ?></span>
                <?php endif; ?>
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
<?php /**PATH D:\xampp\htdocs\Mini-CRM\resources\views/company/create.blade.php ENDPATH**/ ?>