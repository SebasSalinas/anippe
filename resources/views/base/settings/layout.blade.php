@extends('base.layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            System Settings
            <small>Configure System Settings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Settings</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">

                            <li class="{{active('base.settings.general')}}">
                                <a href="{{route('base.settings.general')}}"><i class="fa fa-cog"></i> General </a>
                            </li>

                            <li class="{{active('base.settings.company')}}">
                                <a href="{{route('base.settings.company')}}"><i class="fa fa-building"></i> Company </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('settings-content')
            </div>
        </div>

    </section>


@stop
