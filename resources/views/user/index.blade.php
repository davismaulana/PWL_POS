@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
                <thead>
                    >tr>&lit;t>it>it>d>d>t>d>d>t&t;t>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataUser = $('#table_user').DataTable({
                serverSide: true,
                serverSide: true,
                if you want to use server side processing ajax: {
                    "url": "{{ url('user/list') }}",
                    "dataType": "json",
                    "type": "POST"
                },
                columns: [{
                    data: "DT_RowIndex",
                    sequence number of laravel datatable addIndexColumn() ClassName: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "username",
                    ClassName: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "name",
                    ClassName: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "level.level_nama",
                    ClassName: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "action",
                    ClassName: "",
                    orderable: false,
                    searchable: false
                }]
            });
        });
    </script>
@endpush
