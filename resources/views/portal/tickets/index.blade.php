@extends('portal.layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>
                Tickets
                <small>Manage your tickets</small>
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
                        <a href="{{route('portal.tickets.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Ticket</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-striped" id="tickets-table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Project</th>
                            <th>Last Reply</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
@stop


@push('scripts')
    <script>
        $(document).ready(function () {
            var ticketsDT = $('#tickets-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('portal.tickets.datatable')}}',
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'department', name: 'department'},
                    {data: 'status', name: 'status'},
                    {data: 'priority', name: 'priority'},
                    {data: 'project', name: 'project'},
                    {data: 'last_reply', name: 'last_reply'},
                    {data: 'created_at', name: 'created_at'},
                ]
            });
        });
    </script>
@endpush
