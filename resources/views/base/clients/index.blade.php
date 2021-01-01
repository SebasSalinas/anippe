@extends('base.layouts.app')

@section('title')
    Clients
@stop

@section('content')

    <section class="content-header">
        <h1>
            Clients
            <small>Browse your clients</small>

        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Clients</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Browse Clients</h3>
                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createClientModal"><i class="fa fa-plus"></i> Add Client</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="clients-table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Groups</th>
                        <th>Address</th>
                        <th>Date Created</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </section>

    <livewire:base.client.create/>
    <livewire:base.client.edit/>

@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            var clientsDT = $('#clients-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.clients.datatable')}}',
                columns: [
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'groups', name: 'groups'},
                    {data: 'address', name: 'address'},
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '100px'}
                ]
            });
        });
    </script>
@endpush
