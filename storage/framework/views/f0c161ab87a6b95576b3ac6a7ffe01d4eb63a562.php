

<?php $__env->startSection("body"); ?>
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add E'book : Class Seven - Category PDF</h3>
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
	                        <ol class="breadcrumb">
	                            <li class="breadcrumb-item"><a href="<?php echo e(route('english.grammer.index')); ?>" class="btn btn-primary">Index</a></li>
	                        </ol>
                    	</nav>
                    </div>

                     <!-- Alert message (start) -->
                    <?php if(Session::has('message')): ?>
                        <div class="alert <?php echo e(Session::get('alert-class')); ?> ">
                             <?php echo e(Session::get('message')); ?>

                        </div>
                    <?php endif; ?>
                    <!-- Alert message (end) -->

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="<?php echo e(route("seven.cat.store")); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Add Category</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Enter Category" name="category_name" required>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page-heading">
        <section class="section">
            <div class="card">
                
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($result->category_name); ?></td>
                                
                                <td class="d-flex">
                                    <form class="px-3"
                                        onclick="return confirm('Are you sure you want to delete this contact?')"
                                        method="POST" action="<?php echo e(route('catenglit.destroy', $result->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger active">Delete</button>
                                    </form>
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

<?php $__env->startSection("js"); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\office\quizeApp\resources\views/Ebook/Seven/add_category.blade.php ENDPATH**/ ?>