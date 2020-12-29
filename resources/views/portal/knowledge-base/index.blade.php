@extends('portal.layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>
                Knowledge Base
                <small>Search Knowledge Base</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Knowledge Base</a></li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-6 col-sm-offset-3">
                    <form action="">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control input-lg" placeholder="Have a question?">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div style="margin-top:50px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid ">
                            <div class="box-body" style="padding:40px;">
                                @foreach($categories as $category)
                                    <div>
                                        <h4>
                                            <a href="{{route('portal.knowledge-base.category', $category)}}"><i class="fa fa-folder"></i> {{$category->name}}
                                            </a> <span class="label label-default">{{$category->articles_count}}</span>
                                        </h4>
                                        <p>{{$category->description}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
