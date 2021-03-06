@extends('site.layouts.error')

@section('htmlheader_title')
    Unauthorized
@endsection

@section('contentheader_title')
    403 Unauthorized
@endsection

@section('contentheader_description')
@endsection

@section('content')

<div class="error-page">
    <h2 class="headline text-yellow"> 403</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Access denied.</h3>
        <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href='{{ url('/') }}'>return to site home</a> or try using the search form.
        </p>
        <form class='search-form'>
            <div class='input-group'>
                <input type="text" name="search" class='form-control' placeholder="Search"/>
                <div class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                </div>
            </div><!-- /.input-group -->
        </form>
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection