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
                    <h3 class="box-title">Add Ticket</h3>
                    <div class="box-tools pull-right">
                        <a href="{{route('portal.tickets.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Ticket</a>
                    </div>
                </div>
                <form action="{{route('portal.tickets.store')}}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name *</label>
                                    <input type="text" class="form-control" name="title" placeholder="Ticket title" required> @error('title')
                                    <p class="help-block text-red text-bold">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Department *</label>
                                    <div class="form-group">
                                        <select name="department_id" class="form-control">
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select> @error('department')
                                        <p class="help-block text-red text-bold">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Project</label>
                                    <div class="form-group">
                                        <select name="project_id" class="form-control">
                                            @foreach($projects as $project)
                                                <option value="{{$project->id}}">{{$project->name}}</option>
                                            @endforeach
                                        </select> @error('project_id')
                                        <p class="help-block text-red text-bold">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Priority</label>
                                    <div class="form-group">
                                        <select name="priority_id" class="form-control">
                                            @foreach($priorities as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @error('priority_id')
                                        <p class="help-block text-red text-bold">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Content *</label>
                            <textarea class="form-control" name="content" placeholder="Write your message" rows="5" required></textarea> @error('content')
                            <p class="help-block text-red text-bold">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </form>

            </div>
        </section>
    </div>
@stop
