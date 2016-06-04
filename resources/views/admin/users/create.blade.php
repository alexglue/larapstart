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
                    {!! Form::open(['route' => 'admin.users.store']) !!}

                              @include('admin.users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
