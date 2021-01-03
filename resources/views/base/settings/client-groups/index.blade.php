@extends('base.layouts.app')

@section('title')
    Client groups
@stop

@section('content')

    <section class="content-header">
        <h1>
            Client groups
            <small>Browse your roles</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Client groups</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Browse Client groups</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="client-groups-table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </section>

@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#client-groups-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.settings.client-groups.datatable')}}',
                columns: [
                    {data: 'color', name: 'color'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });
        });
    </script>
@endpush
