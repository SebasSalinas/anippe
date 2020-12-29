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
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h1 class="box-title text-bold text-primary">{{$article->title}}</h1>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p>{{$article->content}}</p>
                                <hr style="border-top:1px solid #ccc;">
                                <h4>Did you find this article useful?</h4>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">Yes</button>
                                    <button type="button" class="btn btn-danger">No</button>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
