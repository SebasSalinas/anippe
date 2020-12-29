@extends('base.layouts.app')

@section('title')
    Tickets
@stop

@section('content')

    <section class="content-header">
        <h1>
            Tickets
            <small>Browse your tickets</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tickets</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Browse Tickets</h3>
                <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tickets-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Creator</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Last Reply</th>
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
            var ticketsDT = $('#tickets-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.tickets.datatable')}}',
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'department', name: 'department'},
                    {data: 'creator', name: 'creator'},
                    {data: 'status', name: 'status'},
                    {data: 'priority', name: 'priority'},
                    {data: 'last_reply', name: 'last_reply'},
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });
        });
    </script>
@endpush
