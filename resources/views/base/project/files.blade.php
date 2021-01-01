@extends('base.project.layout')

@section('title')
    {{$project->name}} - Files
@stop

@section('project-content')

    <table class="table table-striped" id="files-table">
        <thead>
        <tr>
            <th>Date Created</th>
            <th>Name</th>
            <th>File Type</th>
            <th>Uploaded By</th>
            <th>Size</th>
            <th></th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            var filesDT = $('#files-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.project.files.datatable', $project)}}',
                columns: [
                    {data: 'created', name: 'created'},
                    {data: 'name', name: 'name'},
                    {data: 'tpye', name: 'tpye'},
                    {data: 'uploaded_by', name: 'uploaded_by'},
                    {data: 'size', name: 'size'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });
        });
    </script>
@endpush
