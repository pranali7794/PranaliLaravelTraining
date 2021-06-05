<?php $__env->startSection('main'); ?>

<div class="jumbotron text-center">
	<div align="right">
		<a href="<?php echo e(route('crud.index')); ?>" class="btn btn-default">Back</a>
	</div>
	<br/>
	<img src="<?php echo e(URL::to('/')); ?>/images/<?php echo e($user->image); ?>" class="img-thumbnail" />
	<h3>First Name - <?php echo e($user->first_name); ?> </h3>
	<h3>Last Name - <?php echo e($user->last_name); ?> </h3>

	<br/><br/>
	<h2>Blogs</h2>
	<table class="table table-bordered table-striped">
		 <thead>
		<tr>
			<th width="40%" align="text-center">Title</th>
			<th width="40%">Description</th>
		</tr>
		</thead>

		
			<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<tbody>
				<td><?php echo e($post->title); ?> </td>
				<td><?php echo e($post->body); ?> </td>
			</tbody>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mylaravel/resources/views/view.blade.php ENDPATH**/ ?>