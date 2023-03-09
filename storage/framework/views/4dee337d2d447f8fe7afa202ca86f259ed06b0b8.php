<?php $__env->startSection("body"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route("model_test.topics.store")); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">

                                    <select class="form-control" name="title_id" id="title_id" onchange="TitleValue()" required>
                                        <option disabled selected value="">Select Model Test Title</option>
                                        <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $titles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($titles->id); ?>"><?php echo e($titles->test_title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-control" name="test_subject_id" id="test_subject_id">
                                        <option disabled selected value="">Select Model Subject</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" id="roundText" class="form-control round" placeholder="Enter Topic Name" name="test_topic_name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn btn-primary" value="Add New">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card">

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Subject Name</th>
                        <th>Topic Name</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>




                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($subjects->test_title); ?></td>
                            <td><?php echo e($subjects->test_subject); ?></td>
                            <td><?php echo e($subjects->test_topic_name); ?></td>
                            <td><?php echo e($subjects->created_at); ?></td>
                            <td>


                                <button type="button" class="badge bg-success" data-bs-toggle="modal"
                                        data-bs-target="#backdrop<?php echo e($subjects->id); ?>" style="border: none">
                                    Edit
                                </button>
                                <a class="badge bg-danger" href="<?php echo e(route("model_test.topics.delete",[$subjects->id])); ?>">Delete</a>
                                <!--Disabled Backdrop Modal -->
                                <div class="modal fade text-left" id="backdrop<?php echo e($subjects->id); ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel4">Subject</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form method="POST" action="<?php echo e(route("model_test.topics.edit",[$subjects->id])); ?>">

                                                <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <div class="form-group">

                                                        <select class="form-control" name="title_id" id="title_id2" onchange="TitleValue2()" required>
                                                            <option disabled selected value="">Select Model Test Title</option>
                                                            <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $titles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($titles->id); ?>"><?php echo e($titles->test_title); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                    </div>
                                                </br>
                                                    <div class="form-group">
                                                        <select class="form-control" name="test_subject_id" id="test_subject_id2">
                                                            <option disabled selected value="">Select Model Subject</option>

                                                        </select>
                                                    </div>
                                                    </br>
                                                    <input type="text" class="form-control" name="test_topic_name" placeholder="Enter Topic Name" value="<?php echo e($subjects->test_topic_name); ?>">


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <input type="submit" class="btn btn-success" value="Save">
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                </table>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
    <script>
        var values=<?php echo json_encode($subject, 15, 512) ?>;



        function TitleValue(){
            var title_id=document.getElementById("title_id").value;
            var test_subject_id=document.getElementById("test_subject_id");
            test_subject_id.innerHTML="";
            for(var a=0; a<values.length; a++){
                if(values[a]["title_id"]==title_id){
                    var option=document.createElement("option");
                    option.innerHTML=values[a]["test_subject"];
                    option.value=values[a]["id"];
                    test_subject_id.appendChild(option);
                }

            }
        }

        function TitleValue2(){
            var title_id=document.getElementById("title_id2").value;
            var test_subject_id=document.getElementById("test_subject_id2");
            test_subject_id.innerHTML="";
            for(var a=0; a<values.length; a++){
                if(values[a]["title_id"]==title_id){
                    var option=document.createElement("option");
                    option.innerHTML=values[a]["test_subject"];
                    option.value=values[a]["id"];
                    test_subject_id.appendChild(option);
                }

            }
        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Salauddin\Desktop\Files\Nahid24\resources\views/ModelTest/topic.blade.php ENDPATH**/ ?>