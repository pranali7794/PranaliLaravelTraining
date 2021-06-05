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

<form method="post" action="<?php echo e(route('posts.store')); ?>" enctype="multipart/form-data">
	<?php echo csrf_field(); ?>
	
	 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

	<div class="form-group">
		<label for="name" class="col-md-4 text-right"> Name: </label>
		<div class="col-md-8">
			<select id='name' name='name' class="form-control">
       			<option value=''>-- Select Name --</option>
       			<?php $__currentLoopData = $crudData['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         			<option value='<?php echo e($crud->id); ?>'><?php echo e($crud->first_name." ".$crud->last_name); ?></option>
       			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    		</select>

		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="title" class="col-md-4 text-right"> Title: </label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="title"/>

			<br/><br/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="description" class="col-md-4 text-right">Description:</label>
		<div class="col-md-8">
			<textarea name="description" ></textarea>
		</div>
	</div>

	<br/><br/><br/>
	
	<div class="form-group text-center">
		<input type="submit" name="addBlog"  class="btn btn-success" value="Add Blog" />
	</div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mylaravel/resources/views/blog.blade.php ENDPATH**/ ?>