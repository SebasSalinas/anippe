@extends('base.project.layout')

@section('title')
    {{$project->name}} - Tickets
@stop

@section('project-content')
    <table class="table table-striped" id="tickets-table">
        <thead>
        <tr>
            <th></th>
            <th>Date Created</th>
            <th>Title</th>
            <th>Department</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Last Reply</th>
            <th></th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#tickets-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.project.tickets.datatable', $project)}}',
                columns: [
                    {data: 'has_attachment', name: 'has_attachment', searchable: false, width: '50px'},
                    {data: 'created', name: 'created'},
                    {data: 'title', name: 'title'},
                    {data: 'department', name: 'department'},
                    {data: 'contact', name: 'contact'},
                    {data: 'status', name: 'status'},
                    {data: 'priority', name: 'priority'},
                    {data: 'last_reply', name: 'last_reply'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });
        });
    </script>
@endpush
