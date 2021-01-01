@extends('base.project.layout')

@section('title')
    {{$project->name}} - Notes
@stop

@section('project-content')

    <div class="row" style="margin-bottom:15px;">
        <div class="col-md-12">
            <a href="#" data-toggle="modal" data-target="#createNoteModal" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Note</a>
        </div>
    </div>

    <table class="table table-striped" id="notes-table">
        <thead>
        <tr>
            <th></th>
            <th>Date Created</th>
            <th>Title</th>
            <th>Created By</th>
            <th></th>
        </tr>
        </thead>
    </table>

    <livewire:base.note.create :related="$project"/>
    <livewire:base.note.edit/>

@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            var notesDT = $('#notes-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.project.notes.datatable', $project)}}',
                columns: [
                    {data: 'has_attachment', name: 'has_attachment', searchable: false, width: '50px'},
                    {data: 'created', name: 'created'},
                    {data: 'title', name: 'title'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '100px'}
                ]
            });
        });
    </script>
@endpush
