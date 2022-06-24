{{Form::model($coupon, array('route' => array('coupon.update', $coupon->id), 'method' => 'PUT')) }}
<div class="row">
    <div class="form-group col-md-12">
        {{Form::label('name',__('Name'))}}
        {{Form::text('name',null,array('class'=>'form-control font-style','required'=>'required'))}}
    </div>
    <div class="form-group col-md-6">
        {{Form::label('discount',__('Discount'))}}
        {{Form::number('discount',null,array('class'=>'form-control','required'=>'required','step'=>'0.01'))}}
        <span class="small">{{__('Note: Discount in Percentage')}}</span>
    </div>
    <div class="form-group col-md-6">
        {{Form::label('limit',__('Limit'))}}
        {{Form::number('limit',null,array('class'=>'form-control','required'=>'required'))}}
    </div>
    <div class="form-group col-md-12">
        {{Form::label('code',__('Code'))}}
        {{Form::text('code',null,array('class'=>'form-control','required'=>'required'))}}
    </div>
    <div class="modal-footer col-md-12">
        {{Form::submit(__('Update'),array('class'=>'btn btn-sm btn-primary rounded-pill'))}}
    </div>
</div>
{{ Form::close() }}

