@extends('base.client.layout')

@section('title')
    {{$client->name}} - Projects
@stop

@section('client-content')


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Browse Projects</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="projects-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>Deadline Date</th>
                    <th>Members</th>
                    <th>Date Created</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@stop


@push('scripts')
    <script>
        $(document).ready(function () {
            var projectsDT = $('#projects-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.client.projects.datatable', $client)}}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'starting_at', name: 'starting_at'},
                    {data: 'deadline_at', name: 'deadline_at'},
                    {data: 'members', name: 'members'},
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });
        });
    </script>
@endpush
