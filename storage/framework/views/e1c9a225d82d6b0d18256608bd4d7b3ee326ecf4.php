;

<?php $__env->startSection("body"); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Questions</h3>
                    <p class="text-subtitle text-muted">All MCQ</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Questions</li>
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
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Question</th>
                            <th>Option-1</th>
                            <th>Option-2</th>
                            <th>Option-3</th>
                            <th>Option-4</th>
                            <th>Answer</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($result->subject_name); ?></td>
                                <td><?php echo e($result->topic_name); ?></td>
                                <td><?php echo e($result->question); ?></td>
                                <td><?php echo e($result->option1); ?></td>
                                <td><?php echo e($result->option2); ?></td>
                                <td><?php echo e($result->option3); ?></td>
                                <td><?php echo e($result->option4); ?></td>
                                <td><?php echo e($result->correct_ans); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Salauddin\Desktop\Files\Nahid24\resources\views/Mcq/index.blade.php ENDPATH**/ ?>