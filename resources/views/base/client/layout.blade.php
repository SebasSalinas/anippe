@extends('base.layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            {{$client->name}}
            <small>View Client Card</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Client Card</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">

                            <li class="{{active('base.client.summary')}}">
                                <a href="{{route('base.client.summary', $client)}}"><i class="fa fa-dashboard"></i> Summary
                                </a>
                            </li>

                            <li class="{{active('base.client.contacts.index')}}">
                                <a href="{{route('base.client.contacts.index', $client)}}"><i class="fa fa-users"></i> Contacts
                                </a>
                            </li>

                            <li class="{{active('base.client.tickets.index')}}">
                                <a href="{{route('base.client.tickets.index', $client)}}"><i class="fa fa-ticket"></i> Tickets
                                </a>
                            </li>

                            <li class="{{active('base.client.files.*')}}">
                                <a href="{{route('base.client.files.index', $client)}}"><i class="fa fa-paperclip"></i> Files </a>
                            </li>

                            <li class="{{active('base.client.notes.*')}}">
                                <a href="{{route('base.client.notes.index', $client)}}"><i class="fa fa-newspaper-o"></i> Notes </a>
                            </li>

                            <li class="{{active('base.client.tasks.*')}}">
                                <a href="{{route('base.client.tasks.index', $client)}}"><i class="fa fa-tasks"></i> Tasks </a>
                            </li>

                            <li class="{{active('base.client.projects.index')}}">
                                <a href="{{route('base.client.projects.index', $client)}}"><i class="fa fa-terminal"></i> Projects </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('client-content')
            </div>
        </div>

    </section>


@stop
