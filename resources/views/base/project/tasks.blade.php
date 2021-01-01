@extends('base.project.layout')

@section('title')
    {{$project->name}} - Tasks
@stop

@section('project-content')

    <table class="table table-striped" id="tasks-table">
        <thead>
        <tr>
            <th></th>
            <th>Date Created</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Assigned To</th>
            <th>Priority</th>
            <th></th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            var tasksDT = $('#tasks-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.project.tasks.datatable', $project)}}',
                columns: [
                    {data: 'has_attachment', name: 'has_attachment', searchable: false, width: '50px'},
                    {data: 'created', name: 'created'},
                    {data: 'name', name: 'name'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'due_date', name: 'due_date'},
                    {data: 'status', name: 'status'},
                    {data: 'assigned_to', name: 'assigned_to'},
                    {data: 'priority', name: 'priority'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });
        });
    </script>
@endpush
