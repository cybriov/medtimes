{{Form::model($plan, array('route' => array('plan.update', $plan->id), 'method' => 'PUT', 'enctype' => "multipart/form-data")) }}
<div class="row">
    <div class="form-group col-md-6">
        {{Form::label('name',__('Name'))}}
        {{Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Plan Name'),'required'=>'required'))}}
    </div>
    <div class="form-group col-md-6">
        {{Form::label('price',__('Price'))}}
        {{Form::number('price',null,array('class'=>'form-control','placeholder'=>__('Enter Plan Price'),'step'=>'0.01'))}}
    </div>

    <div class="form-group col-md-6">
        {{Form::label('max_employee',__('Maximum Employee'))}}
        {{Form::number('max_employee',null,array('class'=>'form-control','required'=>'required'))}}
        <span class="small">{{__('Note: "-1" for Unlimited')}}</span>
    </div>    
    <div class="form-group col-md-6">
        {{ Form::label('duration', __('Duration')) }}
        {!! Form::select('duration', $arrDuration, null,array('class' => 'form-control','data-toggle'=>'select','required'=>'required')) !!}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('image', __('Image')) }}
        {{ Form::file('image', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('description', __('Description')) }}
        {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>'3']) !!}
    </div>
    <div class="modal-footer col-md-12">
        {{Form::submit(__('Create'),array('class'=>'btn btn-sm btn-primary rounded-pill'))}}
    </div>
</div>
{{ Form::close() }}

