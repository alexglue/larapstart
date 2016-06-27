@extends('admin.layouts.app')

@section('contentheader_title')
    {{trans('admin.models.permission.singular')}}
@endsection

@section('content')
   <div class="content">
       @include('admin.common.flash.message')
       @include('admin.common.errors')
       <div class="box box-primary">

           <div class="box-body">
               <div class="row">
                   {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission->id], 'method' => 'patch']) !!}

                    @include('admin.permissions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection