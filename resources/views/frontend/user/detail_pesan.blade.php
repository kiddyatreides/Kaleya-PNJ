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
                        <li><a href="#"><span class="badge pull-right">1546</span> Inbox </a></li>
                        <li><a style='color:blue;' href="#">Sent Mail</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-md-10">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="list-group">
                                <h3>Detail Pesan - <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCompose">Balas</button></h3>

                                @foreach($pesan as $x)

                                        <!--begin comments_box -->

                                                <div class="comments_box">
                                                <img src="/frontend/images/team3.jpg" alt="Picture" class="comments_pic">
                                                <!--begin post_text -->
                                                @if($x->penerima_id != \Illuminate\Support\Facades\Session::get('id'))
                                                        <div class="post_text" style="background-color: grey!important">
                                                            @foreach(\App\modelUser::where('id',$x->pengirim_id)->get() as $users)
                                                                @if($users->id != \Illuminate\Support\Facades\Session::get('id'))
                                                                    <h5 style="color: white"> {{ $users->nama }}</h5>
                                                                @else
                                                                    <h5 style="color: white">You <font style="font-size: 12px;">({{ $users->nama }})</font></h5>
                                                                @endif
                                                            @endforeach
                                                            <p style="font-size: 11px; color: white">{{ \Carbon\Carbon::createFromTimestamp(strtotime($x->created_at))->diffForHumans() }}</p>
                                                            {{--<ul class="post_info"></ul>--}}
                                                            <p style="color: white">{{ $x->pesan }}</p>
                                                        </div>
                                                @else
                                                        <div class="post_text">
                                                            @foreach(\App\modelUser::where('id',$x->pengirim_id)->get() as $users)
                                                                @if($users->id != \Illuminate\Support\Facades\Session::get('id'))
                                                                    <h5> {{ $users->nama }}</h5>
                                                                @else
                                                                    <h5>You <font style="font-size: 12px;">({{ $users->nama }})</font></h5>
                                                                @endif
                                                            @endforeach
                                                            <p style="font-size: 11px">{{ \Carbon\Carbon::createFromTimestamp(strtotime($x->created_at))->diffForHumans() }}</p>
                                                            {{--<ul class="post_info"></ul>--}}
                                                            <p>{{ $x->pesan }}</p>
                                                        </div>
                                                @endif

                                                <!--end post_text -->
                                            </div>
                                            <!--end comments_box -->

                                @endforeach

                                {{--<!--begin comments_box -->--}}
                                {{--<div class="comments_box">--}}
                                    {{--<img src="/frontend/images/team3.jpg" alt="Picture" class="comments_pic">--}}
                                    {{--<!--begin post_text -->--}}
                                    {{--<div class="post_text">--}}

                                        {{--<h5> testingg</h5>--}}


                                        {{--<p style="font-size: 11px">testingg</p>--}}
                                        {{--<ul class="post_info"></ul>--}}
                                        {{--<p>testinggg</p>--}}
                                    {{--</div>--}}
                                    {{--<!--end post_text -->--}}
                                {{--</div>--}}
                                {{--<!--end comments_box -->--}}

                                {{--<!--begin comments_box -->--}}
                                {{--<div class="comments_box">--}}
                                    {{--<img src="/frontend/images/team3.jpg" alt="Picture" class="comments_pic">--}}
                                    {{--<!--begin post_text -->--}}
                                    {{--<div class="post_text">--}}

                                        {{--<h5> testingg</h5>--}}


                                        {{--<p style="font-size: 11px">testingg</p>--}}
                                        {{--<ul class="post_info"></ul>--}}
                                        {{--<p>testinggg</p>--}}
                                    {{--</div>--}}
                                    {{--<!--end post_text -->--}}
                                {{--</div>--}}
                                {{--<!--end comments_box -->--}}


                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--end container-->

    </section>

    <!-- /.modal compose message -->
    <div class="modal fade" id="modalCompose">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Kirim Pesan</h4>
                </div>
                <div class="modal-body">
                    <form role="form" class="form-horizontal" action="/messagePost" method="post" enctype="multipart/form-data">
                        @foreach($modalpesan as $x)
                            <div class="form-group">
                                <label class="col-sm-2" for="inputTo">Kepada</label>
                                <input type="hidden" name="idAcara" class="form-control" value="{{ $x->acara_id }}">
                                <input type="hidden" name="idPenerima" class="form-control" value="{{ $x->penerima_id }}">
                                @foreach(\App\modelUser::where('id',$x->penerima_id)->get() as $user)
                                    <div class="col-sm-10"><input disabled type="text" class="form-control" id="nameModal" placeholder="comma separated list of recipients" value="{{ $user->nama }}"></div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="inputBody">Pesan</label>
                                <div class="col-sm-12"><textarea name="message" class="form-control" id="inputBody" rows="7" placeholder="Masukkan pesan kamu disini...." required=""></textarea></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="inputBody">Lampiran</label>
                                <div class="col-sm-12"><input type="file" class="form-control" id="inputSubject" placeholder="subject" name="lampiran"></div>
                            </div>
                        @endforeach

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                        </div>
                    </form>

                </div>


            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal compose message -->


@endsection