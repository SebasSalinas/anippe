@extends('base.layouts.app')

@section('title')
    Projects
@stop

@section('content')

    <section class="content-header">
        <h1>
            Projects
            <small>Browse your projects</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projects</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-white no-shadow">
                    <h3 class="text-primary">0</h3>
                    <p class="text-muted">Not Started</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-white no-shadow">
                    <h3 class="text-primary">23</h3>
                    <p class="text-primary">In Progress</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-white no-shadow">
                    <h3 class="text-primary">1</h3>
                    <p class="text-red">On Hold</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-white no-shadow">
                    <h3 class="text-primary">0</h3>
                    <p class="text-green">Finished</p>
                </div>
            </div>
        </div>


        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Browse Projects</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('base.projects.create')}}" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i> Add Project</a>

                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="projects-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>Deadline Date</th>
                        <th>Client</th>
                        <th>Members</th>
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
            var projectsDT = $('#projects-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.projects.datatable')}}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'starting_at', name: 'starting_at'},
                    {data: 'deadline_at', name: 'deadline_at'},
                    {data: 'client', name: 'client'},
                    {data: 'members', name: 'members'},
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '100px'}
                ]
            });
        });
    </script>
@endpush
