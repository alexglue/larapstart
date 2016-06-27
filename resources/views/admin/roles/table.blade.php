{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    <script src="{{ asset('admin/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/datatables/dataTables.bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/css/datatables/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/datatables/dataTables.bootstrap.css') }}">
    <script src="{{ asset('admin/js/datatables/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('admin/js/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection