<?php $__env->startSection('isi'); ?>


            <form class="m-t" role="form" enctype="multipart/form-data" method="POST" action="<?php echo e(Url('/proses_tambahmobil')); ?>">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/> <!-- token dipakai saat ada form-->



		<label class="control-label">Nama</label>
		<input style="width: 50%;" type="text" autofocus="" name="nama" class="form-control"/>
		<p style="color: red;"><?php echo e($errors->first('nama')); ?></p>

		<label  class="control-label">Type</label>
		<select style="width: 50%;" name="type" class="form-control">
			<option value="sedan">Sedan</option>
			<option value="city car">City Car</option>
			<option value="elf">Elf</option>
			<option value="pickup">Pick Up</option>
			<p style="color: red;"><?php echo e($errors->first('type')); ?></p>
		</select>

		<label class="control-label">Warna</label>
		<input style="width: 50%;" type="text" autofocus="" name="warna" class="form-control"/>
		<p style="color: red;"><?php echo e($errors->first('warna')); ?></p>

		<label class="control-label fa fa-picture-o ">Foto</label>
		<input type="file" min="0" name="foto" required="" accept="image/*"/>
		<p style="color: red;"><?php echo e($errors->first('foto')); ?></p>
		<br/>

		<input type="submit" name="simpan" style="width: 50%" class="btn btn-primary" value="simpan"/>
	
	</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>