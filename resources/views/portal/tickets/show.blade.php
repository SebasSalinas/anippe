@extends('portal.layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>
                {{$ticket->title}}
                <small>Ticket View</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tickets</a></li>
            </ol>
        </section>

        <section class="content">

            @if($ticket->project_id != null)
                <div class="callout callout-warning">
                    <p>This ticket is linked with project {{$ticket->project->name}}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ticket Informations</h3>
                        </div>
                        <div class="box-body no-padding">
                            <table class="table">
                                <tr>
                                    <td>Department:</td>
                                    <td>
                                        <b>{{$ticket->department->name}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date Created:</td>
                                    <td>
                                        <b>{{$ticket->created_at}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Submitted By:</td>
                                    <td>
                                        <b>{{$ticket->creator->fullName}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td>
                                        <b>{{$ticket->status}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Priority:</td>
                                    <td>
                                        <b>{{$ticket->priority}}</b>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Add Reply </h3>
                        </div>
                        <div class="box-body border-bottom-1">
                            <blockquote>
                                <p>{{$ticket->content}}</p>
                                <small>Created by <cite title="Source Title">{{$ticket->creator->fullName}}</cite>
                                </small>
                            </blockquote>
                        </div>
                        <form action="{{route('portal.tickets.reply', $ticket)}}" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                @csrf
                                <div class="form-group">
                                    <textarea name="reply" rows="5" class="form-control" placeholder="Add your reply"></textarea> @error('reply')
                                    <p class="help-block text-red text-bold">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="file" name="attachment[]" multiple> @error('attachment')
                                    <p class="help-block text-red text-bold">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>

                    @if(count($ticket->replies) > 0)
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Replies</h3>
                            </div>
                            <div class="box-body no-padding">
                                @foreach($ticket->replies as $reply)
                                    <div class="post" style="padding:10px;">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="https://adminlte.io/themes/AdminLTE/dist/img/user7-128x128.jpg" alt="user image">
                                            <span class="username">
                                            <a href="#">{{$reply->creator->fullName}}</a>
                                        </span> <span class="description">{{$reply->created_at}}</span>
                                        </div>
                                        <p>
                                        {{$reply->content}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p class="text-muted text-center">No replies for this ticket</p>
                    @endif
                </div>
            </div>
        </section>
    </div>
@stop
