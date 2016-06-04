@extends('admin.layouts.app')

@section('contentheader_title')
    {{trans('admin.models.user.singular')}}
@endsection

@section('content')
   <div class="content">
       @include('admin.common.errors')
       <div class="box box-primary">

           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'patch']) !!}

                    @include('admin.users.fields')

                   {!! Form::close() !!}
               </div>
               <hr />
               <div class="row">
                   <div class="col-lg-6">
                       <h2>{{ trans('admin.model.user.reset_password') }}</h2>
                       {!! Form::open(['route' => ['admin.users.update.password', $user->id]]) !!}
                       <div class="form-group">
                           {!! Form::label('password', trans('admin.model.user.attributes.new_password')) !!}
                           {!! Form::password('password', ['class' => 'form-control']) !!}
                           @if($errors->has('password'))
                               <span class="text-danger">{{$errors->first('password')}}</span>
                           @endif
                       </div>
                       <div class="form-group">
                           {!! Form::label('password_confirmation', trans('admin.model.user.attributes.password_confirmation')) !!}
                           {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                           @if($errors->has('password_confirmation'))
                               <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                           @endif
                       </div>
                       <div class="form-group">
                           {!! Form::submit(trans('admin.basic.reset'), ['class' => 'btn btn-primary']) !!}
                       </div>
                       {!! Form::close() !!}
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection