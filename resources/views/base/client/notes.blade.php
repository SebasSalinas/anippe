@extends('base.client.layout')

@section('title')
    {{$client->name}} - Notes
@stop

@section('client-content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Browse Notes</h3>
            <div class="box-tools pull-right">
                <a href="#" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i> Add Note</a>

            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="notes-table">
                <thead>
                <tr>
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
            var notesDT = $('#notes-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.client.notes.datatable', $client)}}',
                columns: [
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });
        });
    </script>

    <script>

    </script>
@endpush
