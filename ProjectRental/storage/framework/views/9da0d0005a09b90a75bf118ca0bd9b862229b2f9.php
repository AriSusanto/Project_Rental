<?php $__env->startSection('isi'); ?>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Mobil</h5>
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

                        <?php if(Auth()->user()->akses == 'admin'): ?>
                        <a class="btn btn-primary fa fa-plus" href="<?php echo e(Url('/tambahmobil')); ?>">Tambah Mobil</a><?php endif; ?>

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Type</th>
                        <th>Warna</th>
                        <th>foto</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $listproduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baris): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="gradeX">
                        <td><?php echo e($baris->nama); ?></td>
                        <td><?php echo e($baris->type); ?></td>
                        <td class="center"><?php echo e($baris->warna); ?>

                        </td>
                   
                  
                        <td>

                            <a href="<?php echo e(Url('uploads')); ?>/<?php echo e($baris->foto); ?>" data-lightbox="gambar" data-title="<?php echo e($baris->nama); ?>">
                            <img style="width: 200px; height: 135px;" src="<?php echo e(Url('uploads')); ?>/<?php echo e($baris->foto); ?>"/>
                        </a>

                        </td>


                        <td>
                            <?php if(Auth()->user()->akses == 'admin'): ?>
                            <!--tombol hapus-->
                            <form method="post" action="<?php echo e(Url('/hapus_produk')); ?>">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                              <input type="hidden" name="id" value="<?php echo e($baris->id); ?>"/>
                            
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                

                                 <a data-toggle="modal" href="#modal-form-<?php echo e($baris->id); ?>" class="btn btn-info"> Update</a>
                             </td>
                              </tr>

                            </form>
                            
                            <!-- pop up update,form update-->
                            <div id="modal-form-<?php echo e($baris->id); ?>" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Update Mobil</h3>

                                                   

                                                <form enctype="multipart/form-data" role="form" method="post" action="<?php echo e(Url('/proses_update_produk')); ?>" class="form-horizontal">
                                                         <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                                                         <input type="hidden" name="id" value="<?php echo e($baris->id); ?>"/>

                                                        <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Nama</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="<?php echo e($baris->nama); ?>" style="width:100%" type="text" name="nama" required="" placeholder="Nama" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Type</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="<?php echo e($baris->type); ?>" style="width:100%" type="text" name="type" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Warna</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="<?php echo e($baris->warna); ?>" style="width:100%" type="text" name="warna" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                       <label class="control-label">Ubah foto</label>
                                                        <input value="<?php echo e($baris->foto); ?>" type="file" min="0" name="foto" accept="image/*"/>
                                                        <p style="color: red;"><?php echo e($errors->first('foto')); ?></p>
                                                        <br/>

                                                        <div>
                                                            
                                                            <button style="width: 100%" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Update</strong></button>
                                                        </div>
                                                </form>
                                                
                                                </div>
                                                
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <?php endif; ?>
                        </td>
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nama</th>
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
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>