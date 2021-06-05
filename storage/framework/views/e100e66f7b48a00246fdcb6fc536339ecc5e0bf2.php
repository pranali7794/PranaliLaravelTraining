
<h1>Customers</h1>
<form action="">
	<div class="input-group">
		<input type="text" name="">
	</div>
</form>
<ul>
	<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li><?php echo e($customer); ?></li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php /**PATH /var/www/html/mylaravel/resources/views/internals/customers.blade.php ENDPATH**/ ?>