@extends('base.layouts.app')

@section('title')
    Log
@stop

@section('content')

    <section class="content-header">
        <h1>
            Log
            <small>Browse activity log</small>

        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Log</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Browse Log</h3>
                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createClientModal"><i class="fa fa-plus"></i> Add Client</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="log-table">
                    <thead>
                    <tr>
                        <th>Date Created</th>
                        <th>Action</th>
                        <th>User</th>
                        <th>Item</th>
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
            $('#log-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.log.datatable')}}',
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'},
                    {data: 'causer', name: 'causer'},
                    {data: 'item', name: 'item'},
                ]
            });
        });
    </script>
@endpush
