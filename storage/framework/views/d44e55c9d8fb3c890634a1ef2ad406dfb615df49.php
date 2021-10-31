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
            <h1>Companies</h1>
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
                                <th>Company Title</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><a href="<?php echo e(route('company.edit',base64_encode($company->id))); ?>" title="click to edit"><?php echo e($company->CompanyTitle); ?></a></td>
                                    <td><?php echo e($company->Email); ?></td>
                                    <td><img height="40px" src="<?php if(\Illuminate\Support\Str::contains($company->CompanyLogo,"images")): ?> <?php echo e(asset('storage/'.$company->CompanyLogo)); ?> <?php else: ?> <?php echo e($company->CompanyLogo); ?> <?php endif; ?>"></td>
                                    <td><?php echo e($company->CompanyWebsite); ?></td>
                                    <td><?php echo e($company->created_at->diffForHumans()); ?></td>
                                    <td><?php echo e($company->updated_at->diffForHumans()); ?></td>
                                    <td><a href="<?php echo e(route('company.show',base64_encode($company->id))); ?>" class="btn btn-primary">View</a></td>
                                    <td><form method="POST" action="<?php echo e(route('company.destroy',base64_encode($company->id))); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?> <button type="submit" class="btn btn-danger">Delete</button></form></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo e($companies->links()); ?>

        <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Mini-CRM\resources\views/company/index.blade.php ENDPATH**/ ?>