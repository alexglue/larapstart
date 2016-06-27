@extends('admin.layouts.app')

@section('contentheader_title')
    {{trans('admin.models.role.plural')}}
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('admin.common.flash.message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                    @include('admin.roles.table')
                    
            </div>
        </div>
    </div>
@endsection

