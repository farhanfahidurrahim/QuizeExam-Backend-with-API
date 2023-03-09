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
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Products</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><?php echo e($value->id); ?></td>
                                <td><?php echo e($value->name); ?></td>
                                <td>
                                <?php
                                    $products=json_decode($value->info);
                                ?>

                                    <table class="table">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><img src="<?php echo e($product->image); ?>" height="50px"></td>
                                            <td><?php echo e($product->product_name); ?></td>
                                            <td><?php echo e($product->price); ?></td>
                                            <td><?php echo e($product->qty); ?></td>
                                            <td><?php echo e($product->total); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>

                                </td>
                                <td>


                                    <button type="button" class="badge bg-success" data-bs-toggle="modal"
                                            data-bs-target="#backdrop<?php echo e($value->id); ?>" style="border: none">
                                        Show Info
                                    </button>
                                    <!--Disabled Backdrop Modal -->
                                    <div class="modal fade text-left" id="backdrop<?php echo e($value->id); ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel4">Payment Info</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                             <table class="table">
                                                 <tr>
                                                     <td class="text-center">Name</td>
                                                     <td class="text-center"><?php echo e($value->payment_user_name); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Email</td>
                                                     <td class="text-center"><?php echo e($value->email); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Number</td>
                                                     <td class="text-center"><?php echo e($value->number); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Address</td>
                                                     <td class="text-center"><?php echo e($value->address); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Payment Type</td>
                                                     <td class="text-center"><?php echo e($value->payment_type); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Trx ID</td>
                                                     <td class="text-center"><?php echo e($value->trx_id); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-center">Amount</td>
                                                     <td class="text-center"><?php echo e($value->amount); ?></td>
                                                 </tr>
                                             </table>

                                            </div>
                                        </div>
                                </td>






                                </td>
                                <td><p class="text text-success"><?php echo e($value->status); ?></p></td>

                                <td>
                                    <a href="<?php echo e(route("product.orders.status",[$value->id,"Approve"])); ?>" class="badge bg-warning">Approve</a>
                                    <a href="<?php echo e(route("product.orders.status",[$value->id,"Delivery"])); ?>" class="badge bg-success">Delivery</a>
                                    <a href="<?php echo e(route("product.orders.status",[$value->id,"Cancel"])); ?>" class="badge bg-danger">Cancel</a>

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

<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Salauddin\Desktop\Files\Nahid24\resources\views/Product/orders.blade.php ENDPATH**/ ?>