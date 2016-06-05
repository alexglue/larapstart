{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="{{ asset('/adm/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.js"></script>
    <script src="{{ asset('/adm/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/adm/js/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection