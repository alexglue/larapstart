@extends('admin.layouts.app')

@section('contentheader_title')
    {{trans('admin.models.role.singular')}}
@endsection

@section('content')
   <div class="content">
       @include('admin.common.flash.message')
       @include('admin.common.errors')
       <div class="box box-primary">

           <div class="box-body">
               <div class="row">
                   {!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method' => 'patch']) !!}

                    @include('admin.roles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection