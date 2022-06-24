
<form method="post" class='rotas_ctrate_location rotas_cteate_frm'>
    <h5 class="modal-title"><span class="model_form_title"><?php echo e(__('Add Shift')); ?></span></h5>
    <div class="row">
        <?php echo e(Form::input('hidden', 'user_id', $user_id)); ?>

        <?php echo e(Form::input('hidden', 'rotas_date', $date)); ?>

        <?php echo e(Form::input('hidden', 'location_id', $first_location, array('id' => 'rotas_ctrate_location'))); ?>


        <div class="col-4">
            <div class="form-group">
                <?php echo e(Form::label('', __('Start Time'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::input('time', 'start_time', null, array('class' => 'form-control start_time rotas_time', 'required' => true))); ?>

            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <?php echo e(Form::label('', __('End Time'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::input('time', 'end_time', null, array('class' => 'form-control end_time rotas_time', 'required' => true))); ?>

            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <?php echo e(Form::label('', __('Break'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::input('number', 'break_time', 0, array('class' => 'form-control', 'required' => true, 'min' => 0))); ?>

                <small><?php echo e(__('in minute')); ?></small>
            </div>            
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Is it a call or overtime?'), ['class' => 'form-control-label'])); ?>

                <?php echo Form::select('is_call', ['0'=>'No', '1'=>'Yes'],  0, ['data-placeholder'=> __('Select Option') ,'class'=> 'form-control js-single-select']); ?>                                                           
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Role'), ['class' => 'form-control-label'])); ?>

                <?php echo Form::select('role_id', $role_option,  null, ['data-placeholder'=> __('Select Role') ,'class'=> 'form-control js-single-select']); ?>                                                           
            </div>
        </div>        
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Note'), ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::textarea('note', null, ['class' => 'form-control autogrow' ,'rows'=>'2' ,'style'=>'resize: none'])); ?>

                <small><?php echo e(__('Employees can only see notes for their own shifts')); ?></small>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group text-right">
                <input type="button" class="btn btn-sm btn-primary rounded-pill mr-auto rotas_cteate" value="<?php echo e(__('Save')); ?>" >
                
            </div>
        </div>
    </div>
</form>
<?php /**PATH /home/jovickxe/medtimes.co/resources/views/rotas/create.blade.php ENDPATH**/ ?>