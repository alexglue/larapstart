<!-- id Field -->
<div class="form-group">
    {!! Form::label('id', trans('admin.models.permission.fields.id') . ':') !!}
    <p>{!! $permission->id !!}</p>
</div>

<!-- name Field -->
<div class="form-group">
    {!! Form::label('name', trans('admin.models.permission.fields.name') . ':') !!}
    <p>{!! $permission->name !!}</p>
</div>

<!-- display_name Field -->
<div class="form-group">
    {!! Form::label('display_name', trans('admin.models.permission.fields.display_name') . ':') !!}
    <p>{!! $permission->display_name !!}</p>
</div>

<!-- description Field -->
<div class="form-group">
    {!! Form::label('description', trans('admin.models.permission.fields.description') . ':') !!}
    <p>{!! $permission->description !!}</p>
</div>

<!-- created_at Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('admin.models.permission.fields.created_at') . ':') !!}
    <p>{!! $permission->created_at !!}</p>
</div>

<!-- updated_at Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('admin.models.permission.fields.updated_at') . ':') !!}
    <p>{!! $permission->updated_at !!}</p>
</div>

