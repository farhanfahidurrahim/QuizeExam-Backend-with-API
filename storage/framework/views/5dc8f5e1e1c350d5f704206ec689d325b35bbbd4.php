<?php $__env->startSection("body"); ?>
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">MCQ</h4>
                    </div>



                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="<?php echo e(route("mcq.store")); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">MCQ Subject</label>
                                        <select name="subject_id" class="form-control" onchange="SubjectValue()" id="subject_id" required>
                                            <option disabled selected value="">Select Subject</option>
                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sub->id); ?>"><?php echo e($sub->subject_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">MCQ Topic</label>
                                         <select class="form-control" name="topic_id" id="topic_id" required>
                                             <option disabled selected value="">Select Topic</option>
                                         </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Question</label>
                                            <input type="text" id="city-column" class="form-control"  placeholder="Enter Question"
                                                   name="question" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Option-1</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="option1" placeholder="Enter Option"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Option-2</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="option2" placeholder="Enter Option"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Option-3</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="option3" placeholder="Enter Option"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Option-4</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="option4" placeholder="Enter Option"  required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Correct Ans</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="correct_ans" placeholder="Enter Correct Ans"  required>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
    <script>
        var values=<?php echo json_encode($topics, 15, 512) ?>;



        function SubjectValue(){
            var value=document.getElementById("subject_id").value;
            var quiz_topic=document.getElementById("topic_id");
            quiz_topic.innerHTML="";
            for(var a=0; a<values.length; a++){
                if(values[a]["subject_id"]==value){

                    var option=document.createElement("option");
                    option.innerHTML=values[a]["topic_name"];
                    option.value=values[a]["id"];
                    quiz_topic.appendChild(option);
                }
            }
        }



    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\office\Nahid24\resources\views/Mcq/store.blade.php ENDPATH**/ ?>