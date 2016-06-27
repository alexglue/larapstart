@extends('admin.layouts.app')

@section('contentheader_title')
    {{trans('admin.models.role.singular')}}
@endsection

@section('content')
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                  @include('admin.roles.show_fields')
                  <a href="{!! route('admin.roles.index') !!}" class="btn btn-default">{{ trans('admin.base.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
