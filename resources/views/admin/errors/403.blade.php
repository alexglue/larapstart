@extends('admin.layouts.error')

@section('htmlheader_title')
    Unauthorized
@endsection

@section('contentheader_title')
    403 Error Page
@endsection

@section('contentheader_description')
@endsection

@section('content')

<div class="error-page">
    <h2 class="headline text-yellow"> 403</h2>
    <div class="error-content">
        <h2><i class="fa fa-warning text-yellow"></i> Oops! Access denied.</h2>
        <p>Seems like you have not permissions to see this page.</p>
        <p>Meanwhile, you may <a href='{{ url('/admin') }}'>return to dashboard</a> or mail to <a href='mailto:{{config('common.app.email.access')}}'>{{config('common.app.email.access')}}</a>.
        </p>
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection