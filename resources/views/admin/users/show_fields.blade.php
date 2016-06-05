<!-- id Field -->
<div class="form-group">
    {!! Form::label('id', trans('admin.models.user.fields.id') . ':') !!}
    <p>{{ $user->id }}</p>
</div>

<!-- name Field -->
<div class="form-group">
    {!! Form::label('name', trans('admin.models.user.fields.name') . ':') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- email Field -->
<div class="form-group">
    {!! Form::label('email', trans('admin.models.user.fields.email') . ':') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- created_at Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('admin.models.user.fields.created_at') . ':') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- updated_at Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('admin.models.user.fields.updated_at') . ':') !!}
    <p>{!! $user->updated_at !!}</p>
</div>