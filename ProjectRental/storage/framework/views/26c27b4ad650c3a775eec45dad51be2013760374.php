;

<?php $__env->startSection('isi'); ?>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Produk</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">


                        <a class="btn btn-primary" href="<?php echo e(Url('/tambah_produk')); ?>">Tambah Produk</a>

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Warna</th>
                        <th>foto</th>
                        <th>Aksi</th>
                     </tr>

                    </thead>
                    <?php $__currentLoopData = $listproduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baris): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                    <tr class="gradeX">
                       <td><?php echo e($baris->type); ?></td>
                        <td><?php echo e($baris->warna); ?></td>
                        <td><?php echo e($baris->foto); ?></td>
                        <td class="center"><?php echo e($baris->aksi); ?>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                     <tfoot>
                    <tr>
                        <th>Type</th>
                        <th>Warna</th>
                        <th>foto</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>