<?php $__env->startSection('main'); ?>
<!DOCTYPE html>

<html lang="en">
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<body>
         <div class="container">
<div align="right">
	<a href="<?php echo e(route('posts.create')); ?>" class="btn btn-success">Add Post</a>
	<a href="<?php echo e(route('crud.create')); ?>" class="btn btn-primary">Add User</a>

</div>
<br/><br/>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<br/><br/>
<table class="table table-bordered table-striped" id="laravel_datatable">
	 <thead>
	<tr>
		<th width="10%">Sr. No.</th>
		<th width="10%">Image</th>
		<th width="35%">First Name</th>
		<th width="35%">Last Name</th>		
		<th width="10%">Email ID</th>
		<th width="35%">Phone Number</th>
		<th width="35%">Address</th>
		<th width="30%">Gender</th>
		<th width="30%">Country Code</th>
		<th width="30%">Action</th>
	</tr>
	</thead>

</table>
</div>
<script>
   $(document).ready( function () {
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "<?php echo e(url('crud-list')); ?>",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'image', name: 'image', "render": function (data, type, full, meta) {
				        return "<img src=\"images/" + data + "\" height=\"50\" width=\"70\"/>";
				    },"title": "Image", "orderable": true, "searchable": true },
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'mobile', name: 'mobile' },
                    { data: 'address', name: 'address' },
                    { data: 'gender', name: 'gender' },
                    { data: 'country_code', name: 'country_code' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                 ]
        });
     });
  </script>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mylaravel/resources/views/index.blade.php ENDPATH**/ ?>