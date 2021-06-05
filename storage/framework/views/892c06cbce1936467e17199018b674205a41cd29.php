<?php $__env->startSection('main'); ?>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
	<ul>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
<?php endif; ?>
<div align="right">
	<a href="<?php echo e(route('crud.index')); ?>" class="btn btn-default">Back</a>
</div>

<form method="post" action="<?php echo e(route('crud.store')); ?>" enctype="multipart/form-data">
	<?php echo csrf_field(); ?>

	<!-- <div class="form-group">
		<label for="image">Image :</label><br/><br/>
		<input type="file" id="image" name="image"/><br/><br/>
		
	</div> -->
	 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

	<div class="form-group">
		<label for="first_name" class="col-md-4 text-right"> First Name: </label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>" /><br/><br/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="last_name" class="col-md-4 text-right">Last Name:</label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>"/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="image" class="col-md-4 text-right">Select Image :</label>
		<div class="col-md-8">
			<input type="file" name="image" />
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="mobile" class="col-md-4 text-right"> Mobile: </label>
		<div class="col-md-8">
			<input type="number" maxlength="10" min="0" class="form-control" name="mobile" value="<?php echo e(old('mobile')); ?>"/><br/><br/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="email" class="col-md-4 text-right">Email ID:</label>
		<div class="col-md-8">
			<input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="address" class="col-md-4 text-right">Address </label>
		<div class="col-md-8">
			<textarea name="address" class="form-control"><?php echo e(old('address')); ?></textarea>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="gender" class="col-md-4 text-right"> Gender: </label>
		<div class="col-md-8">
			<input type="radio" name="gender" value="Female" <?php echo e((old('gender') == 'Female') ? 'checked' : ''); ?> > &nbsp; <label>Female</label>
			<input type="radio" name="gender" value="Male" <?php echo e((old('gender') == 'Male') ? 'checked' : ''); ?> >&nbsp; <label>
			Male</label>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="cc" class="col-md-4 text-right">Country Code:</label>
		<div class="col-md-8">
			<select name="cc" class="form-control"> 
				<option value="91" <?php echo e(old('cc') == "91" ? 'selected' : ''); ?>>91 (India) </option>
				<option value="1" <?php echo e(old('cc') == "1" ? 'selected' : ''); ?> >1 (USA)</option>
			</select>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group text-center">
		<input type="submit" name="add"  class="btn btn-success" value="Add" />
	</div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mylaravel/resources/views/create.blade.php ENDPATH**/ ?>