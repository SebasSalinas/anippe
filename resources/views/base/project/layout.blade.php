@extends('base.layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            {{$project->name}}
            <small>View Project</small>
        </h1>
        <ol class="breadcrumb">
            <div class="btn-group btn-group-sm ">
                <button type="button" class="btn btn-primary"><i class="fa fa-tasks"></i> New Task</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="fa fa-users"></i> Assign Members</a></li>
                    <li><a href="#"><i class="fa fa-edit"></i> Edit</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
                </ul>
            </div>
        </ol>
    </section>

    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="{{active('base.project.summary')}}">
                    <a href="{{route('base.project.summary', $project)}}"><i class="fa fa-dashboard"></i> Summary</a>
                </li>

                <li class="{{active('base.project.documents.index')}}">
                    <a href="{{route('base.project.documents.index', $project)}}"><i class="fa fa-paperclip"></i> Documents</a>
                </li>

                <li class="{{active('base.project.tickets.index')}}">
                    <a href="{{route('base.project.tickets.index', $project)}}"><i class="fa fa-ticket"></i> Tickets</a>
                </li>

                <li class="{{active('base.project.tasks.index')}}">
                    <a href="{{route('base.project.tasks.index', $project)}}"><i class="fa fa-tasks"></i> Tasks</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="active tab-pane " id="activity">
                    @yield('project-content')
                </div>

            </div>
        </div>

    </section>


@stop
