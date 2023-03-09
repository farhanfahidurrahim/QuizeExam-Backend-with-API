;

<?php $__env->startSection("body"); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Users</h3>
                    <p class="text-subtitle text-muted">All Users</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Users
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Institute</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e($user->image); ?>" height="50" style="border-radius: 40px"> </td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->number); ?></td>
                        <td><?php echo e($user->institute); ?></td>
                        <td>
                            <?php if($user->is_active==0): ?>
                                <a href="<?php echo e(route("users.active",["id"=>$user->id])); ?>" class="badge bg-success">Active</a>
                            <?php else: ?>
                                <a href="<?php echo e(route("users.deactive",["id"=>$user->id])); ?>" class="badge bg-danger">Deactive</a>
                            <?php endif; ?>


                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\office\Nahid24\resources\views/Users/users.blade.php ENDPATH**/ ?>