@extends('admin.layouts.app')

@section('title')
    Organisations
@stop

@section('content')

    <section class="content-header">
        <h1>
            Organisations
            <small>Browse your organisations</small>

        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Organisations</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Browse Organisations</h3>
                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createOrganisationModal"><i class="fa fa-plus"></i> Add Organisation</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="organisations-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <livewire:admin.organisation.create/>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#organisations-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('admin.organisations.datatable')}}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '100px'}
                ]
            });
        });
    </script>
@endpush
