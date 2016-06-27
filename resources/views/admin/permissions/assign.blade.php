@extends('admin.layouts.app')
@section('scripts')
    <script src="{{ asset('admin/js/rbac.js') }}"></script>
    <script src="{{ asset('admin/js/common.ui.js') }}"></script>
@endsection
@section('content')

    <div class="container-fluid admin">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
                    {{trans('admin.permissions.manage')}} &mdash; {{ $type === 'roles' ? $model->display_name : $model->name }}
                </h4>
                <div class="btn-group pull-right">
                    <button href="{{route('admin.roles.permissions.assign')}}"
                            class="btn btn-block btn-default"
                            data-model="{{$model->id}}"
                            data-type="{{$type}}"
                            data-action="AssignPermission"
                            data-loading-text="{{trans('laravel-admin.loadingText')}}">
                        <i class="fa fa-plus"></i> {{trans('laravel-admin.AssignPermission')}}
                    </button>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-10">
                        @include('flash::message')
                    </div>
                </div>
                {{--@include('admin.permissions.search')--}}
                <hr />

                @if($permissions->isEmpty())
                    <!-- Last Message: No Placements found. -->
                    <div class="well text-center">{{ trans('admin.basic.norows') }}</div>
                @else
                    <div class="table-responsive container-fluid">
                        <table id="permissions" class="table table-striped table-bordered">
                            <thead>
                            <th class="text-center">#</th>
                            <th class='text-center'> {{ trans('admin.model.permission.attributes.display_name') }} </th>
                            <th class='text-center'> {{ trans('admin.model.permission.attributes.name') }} </th>
                            <th class='text-center'> {{ trans('admin.model.permission.attributes.description') }} </th>
                            <th class="text-center">{{ trans('admin.basic.table.actions.action') }}</th>
                            </thead>
                            <tbody>

                            @foreach($permissions as $row)
                                <tr>
                                    <td class="text-center">{{ $row->id }}</td>
                                    <td class='text-center'>{{ $row->display_name }}</td>
                                    <td class='text-center'>{{ $row->name }}</td>
                                    <td class='text-center'>{{ $row->description }}</td>
                                    <td class="text-center">
                                        <a href="{!! route('admin.roles.permissions.delete', ['id' => $model->id, 'permission' => $row->id]) !!}" class="confirm"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="permissionsAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{trans('laravel-admin.AssignPermission')}}</h4>
                </div>
                {!! Form::open(['id' => 'AssignPermissionsForm', 'route' => 'admin.roles.permissions.assign', 'method'=> 'post']) !!}
                <div class="modal-body">
                    {{trans('laravel-admin.AssignPermissionModalText')}}
                    <hr />
                    <div class="form-group">
                        {!! Form::select('perms[]', [], null, ['id' => 'permissionsSelect', 'class' => 'form-control', 'multiple' => 'multiple']) !!}
                        <input type="hidden" name="type" id="Modeltype" value="" />
                        <input type="hidden" name="model" id="Modelid" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('admin.basic.cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('admin.basic.assign')}}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

