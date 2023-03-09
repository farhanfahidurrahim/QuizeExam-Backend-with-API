

<?php $__env->startSection("body"); ?>
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">English - Noun</h4>
                    </div>



                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="<?php echo e(route("learn.noun.store")); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">PDF Title</label>
                                        	<input type="text" id="city-column" class="form-control"  placeholder="Enter PDF Title" name="pdf_file_path" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">PDF File Upload</label>
                                            <input type="file" id="city-column" class="form-control" placeholder="Enter Question"
                                                   name="question" required accept="application/pdf">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\office\Nahid24\resources\views/Learn/English/noun.blade.php ENDPATH**/ ?>