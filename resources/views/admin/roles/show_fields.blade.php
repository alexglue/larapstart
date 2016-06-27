<!-- id Field -->
<div class="form-group">
    {!! Form::label('id', trans('admin.models.role.fields.id') . ':') !!}
    <p>{!! $role->id !!}</p>
</div>

<!-- name Field -->
<div class="form-group">
    {!! Form::label('name', trans('admin.models.role.fields.name') . ':') !!}
    <p>{!! $role->name !!}</p>
</div>

<!-- display_name Field -->
<div class="form-group">
    {!! Form::label('display_name', trans('admin.models.role.fields.display_name') . ':') !!}
    <p>{!! $role->display_name !!}</p>
</div>

<!-- description Field -->
<div class="form-group">
    {!! Form::label('description', trans('admin.models.role.fields.description') . ':') !!}
    <p>{!! $role->description !!}</p>
</div>

<!-- created_at Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('admin.models.role.fields.created_at') . ':') !!}
    <p>{!! $role->created_at !!}</p>
</div>

<!-- updated_at Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('admin.models.role.fields.updated_at') . ':') !!}
    <p>{!! $role->updated_at !!}</p>
</div>

