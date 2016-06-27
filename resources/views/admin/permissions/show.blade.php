@extends('admin.layouts.app')

@section('contentheader_title')
    {{trans('admin.models.permission.singular')}}
@endsection

@section('content')
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                  @include('admin.permissions.show_fields')
                  <a href="{!! route('admin.permissions.index') !!}" class="btn btn-default">{{ trans('admin.base.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
