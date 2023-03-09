;

<?php $__env->startSection("body"); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Video Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e($course->thumbnail); ?>" height="50px"></td>
                                <td><?php echo e($course->title); ?></td>
                                <td><?php echo e($course->class); ?></td>
                                <td><?php echo e($course->subject); ?></td>
                                <td><a href="<?php echo e($course->subject); ?>" target="_blank" class="btn btn-warning">View</a></td>
                                <td>
                                    <a href="<?php echo e(route("courses.edit",["id"=>$course->id])); ?>" class="badge bg-success">Edit</a>
                                    <a href="<?php echo e(route("courses.delete",["id"=>$course->id])); ?>" class="badge bg-danger">Delete</a>


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

<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\office\Nahid24\resources\views/VideoCourse/allcourse.blade.php ENDPATH**/ ?>