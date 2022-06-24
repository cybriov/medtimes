<?php echo e(Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT'))); ?>

<div class="form-group">
    <?php echo e(Form::label('name',__('Name'),array('class'=>''))); ?>

    <?php echo e(Form::text('company_name',null,array('class'=>'form-control','placeholder'=>__('Enter User Name'),'required'=>'required'))); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('email',__('Email'))); ?>

    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email'),'required'=>'required'))); ?>

</div>
<div class="modal-footer">
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/jovickxe/medtimes.co/resources/views/user/edit.blade.php ENDPATH**/ ?>