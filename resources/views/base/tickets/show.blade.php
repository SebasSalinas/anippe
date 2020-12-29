@extends('base.layouts.app')

@section('title')
    View Ticket - {{$ticket->title}}
@stop

@section('content')

    <section class="content-header">
        <h1>
            View Ticket
            <small>View ticket - {{$ticket->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tickets</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#addReply" data-toggle="tab"><i class="fa fa-reply"></i> Add Reply</a></li>
                        <li><a href="#relatedTickets" data-toggle="tab"><i class="fa fa-ticket"></i> Related Tickets</a></li>
                        <li><a href="#tasks" data-toggle="tab"><i class="fa fa-tasks"></i> Tasks</a></li>
                        <li class="dropdown pull-right">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-gears"></i> Actions <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                               {{-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                <li role="presentation" class="divider"></li>--}}
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <b>How to use:</b>

                            <p>Exactly like the original bootstrap tabs except you should use
                                the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                            A wonderful serenity has taken possession of my entire soul,
                            like these sweet mornings of spring which I enjoy with my whole heart.
                            I am alone, and feel the charm of existence in this spot,
                            which was created for the bliss of souls like mine. I am so happy,
                            my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                            that I neglect my talents. I should be incapable of drawing a single stroke
                            at the present moment; and yet I feel that I never was a greater artist than now.
                        </div>
                        <div class="tab-pane" id="tab_2">
                            The European languages are members of the same family. Their separate existence is a myth.
                            For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                            in their grammar, their pronunciation and their most common words. Everyone realizes why a
                            new common language would be desirable: one could refuse to pay expensive translators. To
                            achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                            words. If several languages coalesce, the grammar of the resulting language is more simple
                            and regular than that of the individual languages.
                        </div>
                        <div class="tab-pane" id="tab_3">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                            like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
                            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                            <span class="description">Shared publicly - 7:30 PM Today</span>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- post text -->
                        <p>Far far away, behind the word mountains, far from the
                            countries Vokalia and Consonantia, there live the blind
                            texts. Separated they live in Bookmarksgrove right at</p>

                        <p>the coast of the Semantics, a large language ocean.
                            A small river named Duden flows by their place and supplies
                            it with the necessary regelialia. It is a paradisematic
                            country, in which roasted parts of sentences fly into
                            your mouth.</p>

                        <!-- Attachment -->
                        <div class="attachment-block clearfix">
                            <img class="attachment-img" src="https://adminlte.io/themes/AdminLTE/dist/img/photo1.png" alt="Attachment Image">

                            <div class="attachment-pushed">
                                <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                                <div class="attachment-text">
                                    Description about the attachment can be placed here.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                                </div>
                                <!-- /.attachment-text -->
                            </div>
                            <!-- /.attachment-pushed -->
                        </div>
                        <!-- /.attachment-block -->

                        <!-- Social sharing buttons -->
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                        <span class="pull-right text-muted">45 likes - 2 comments</span>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer box-comments">
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="https://adminlte.io/themes/AdminLTE/dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <form action="#" method="post">
                            <img class="img-responsive img-circle img-sm" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </div>
    </section>

@stop

@push('scripts')
    <script>
        $(document).ready(function () {
        });
    </script>
@endpush
