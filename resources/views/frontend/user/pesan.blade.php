@extends('frontend.base')
@section('content')

    @include('frontend.user.menu', ['menu' => 'Home' ])

    <section class="section-white small-padding">

        <!--begin container-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Kaleya
                        </button>
                    </div>
                </div>
                <div class="col-sm-9 col-md-10">

                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><span class="badge pull-right">1546</span> Inbox </a></li>
                        <li><a style='color:black;' href="http://www.coderglass.com">Sent Mail</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-md-10">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="list-group">

                                <a href="#" class="list-group-item">
                                    <span class="name" style="min-width: 120px; display: inline-block;">Varun Singh</span>
                                    <span class="">You have uploaded 2 files</span>
                                    <span class="text-muted" style="font-size: 11px;">
						- The files will be available for a limited time only unless
						you are a sendspace Premium member.
						</span>
                                    <span class="badge">12:10 AM</span>
                                    <span class="pull-right">
						<span class="glyphicon glyphicon-paperclip">
						</span></span>
                                </a>

                                <a href="#" class="list-group-item">
                                    <span class="name" style="min-width: 120px; display: inline-block;">Varun Singh</span>
                                    <span class="">You have uploaded 2 files</span>
                                    <span class="text-muted" style="font-size: 11px;">
						- The files will be available for a limited time only unless
						you are a sendspace Premium member.
						</span>
                                    <span class="badge">12:10 AM</span>
                                    <span class="pull-right">
						<span class="glyphicon glyphicon-paperclip">
						</span></span>
                                </a>

                                <a href="#" class="list-group-item">
                                    <span class="name" style="min-width: 120px; display: inline-block;">Varun Singh</span>
                                    <span class="">You have uploaded 2 files</span>
                                    <span class="text-muted" style="font-size: 11px;">
						- The files will be available for a limited time only unless
						you are a sendspace Premium member.
						</span>
                                    <span class="badge">12:10 AM</span>
                                    <span class="pull-right">
						<span class="glyphicon glyphicon-paperclip">
						</span></span>
                                </a>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--end container-->

    </section>


@endsection