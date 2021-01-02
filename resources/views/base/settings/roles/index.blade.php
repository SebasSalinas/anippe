@extends('base.layouts.app')

@section('title')
    Roles
@stop

@section('content')

    <section class="content-header">
        <h1>
            Roles
            <small>Browse your roles</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Roles</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Browse Roles</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="contacts-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Client</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date Created</th>
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
            $('#contacts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.contacts.datatable')}}',
                columns: [
                    {data: 'client', name: 'client'},
                    {data: 'fullName', name: 'fullName'},
                    {data: 'position', name: 'position'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });
        });
    </script>
@endpush
