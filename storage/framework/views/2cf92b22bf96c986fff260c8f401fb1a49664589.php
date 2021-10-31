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
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Company Title: <span class="card-text"><b><?php echo e($company->CompanyTitle); ?></b></span></div>
                    <div class="card-title">Company Email: <span class="card-text"><b><?php echo e($company->Email); ?></b></span></div>
                    <div class="card-title">Company Image: <img class="card-img-top" height="100px" style="width: 100px !important;" src="<?php if(\Illuminate\Support\Str::contains($company->CompanyLogo,"images")): ?> <?php echo e(asset('storage/'.$company->CompanyLogo)); ?> <?php else: ?> <?php echo e($company->CompanyLogo); ?> <?php endif; ?>"></div>
                    <div class="card-title">Company Website: <span class="card-text"><b><?php echo e($company->CompanyWebsite); ?></b></span></div>
                </div>
            </div>
    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Mini-CRM\resources\views/company/view.blade.php ENDPATH**/ ?>