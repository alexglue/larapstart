@extends('admin.layouts.app')

@section('contentheader_title')
    {{trans('admin.models.user.singular')}}
@endsection

@section('content')
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                  @include('admin.users.show_fields')
                  <a href="{{ route('admin.users.index') }}" class="btn btn-default">{{ trans('admin.base.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
