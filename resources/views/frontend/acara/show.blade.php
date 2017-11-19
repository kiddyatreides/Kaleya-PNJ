@extends('frontend.base')
@section('content')
    @foreach($acaras as $x)
        @include('frontend.user.menu', ['menu' => "Detail Acara $x->judul"])
    @endforeach
    <section class="section-white small-padding">

    <!--begin container-->
    <div class="container padding-bottom-40">

        <!--begin row-->
        <div class="row">

            <!--begin col-sm-8 -->
            <div class="col-sm-8">

                <!--begin blog-item -->
                <div class="blog-item">
                @foreach($acaras as $x)
                    <!--begin popup image -->
                    <div class="popup-wrapper">
                        <div class="popup-gallery">
                            <a href="#"><img src="{{ url('uploads/foto') }}/{{ $x->foto }}" class="width-100" style="width: 100%; height:350px;" alt="pic"><span class="eye-wrapper2"><i class="icon icon-link eye-icon"></i></span></a>
                        </div>
                    </div>
                        <div id="share"></div>

                        <script src="/frontend/jssocial/jssocials.min.js"></script>
                        <script>
                            $("#share").jsSocials({
                                shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
                            });
                        </script>

                    <!--begin popup image -->

                    <!--begin blog-item_inner -->
                    <div class="blog-item-inner margin-bottom-50">

                        <h3 class="blog-title"><a href="#">{{ $x->judul }}</a></h3>

                        @foreach(\App\modelUser::where('id',$x->user_id)->get() as $y)
                            <a href="#" class="blog-icons" id="nameAcara"><i class="icon icon-user"></i> {{ $y->nama }}</a>
                            <a href="#" class="blog-icons last"><i class="icon icon-calendar"></i> {{$x->tanggal_mulai }}</a>
                            <a href="#" class="blog-icons last"><i class="icon icon-calendar"></i> {{$x->tanggal_berakhir }}</a>
                        @endforeach

                        <p>{{ $x->deskripsi }}</p>
                        <br>
                        <h4>Informasi Tambahan</h4>
                        <p>Informasi tambahan seputar acara <b>{{ $x->judul }}</b></p>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><i class="icon icon-calendar"></i>&nbsp;&nbsp;&nbsp;Harga Tiket</td>
                                <td><b>Rp. {{number_format($x->harga_tiket , "2", ",", ".") }} / Tiket</b></td>
                            </tr>
                            <tr>
                                <td><i class="icon icon-calendar"></i>&nbsp;&nbsp;&nbsp;Jumlah Tiket</td>
                                <td><b>{{$x->jumlah_tiket }}</b></td>
                            </tr>
                            <tr>
                                <td><i class="icon icon-calendar"></i>&nbsp;&nbsp;&nbsp;Status Sponsorship</td>
                                <td>@if($x->statusSponsor == 1) <font style="background-color: green; padding: 5px" color="white"> Open Sponsor </font> @else <font style="background-color: red; padding: 5px" color="white"> Tidak Open Sponsor </font> @endif</td>
                            </tr>
                            <tr>
                                <td><i class="icon icon-calendar"></i>&nbsp;&nbsp;&nbsp;Status Media Partnership</td>
                                <td>@if($x->statusMediaPartner == 1) <font style="background-color: green; padding: 5px" color="white"> Open Media Partnership </font> @else <font style="background-color: red; padding: 5px" color="white"> Tidak Open Media Partnership</font> @endif</td>
                            </tr>
                            <tr>
                                <td><i class="icon icon-calendar"></i>&nbsp;&nbsp;&nbsp;Status Open Booth</td>
                                <td>@if($x->statusOpenBooth == 1) <font style="background-color: green; padding: 5px" color="white"> Open Booth </font> @else <font style="background-color: red; padding: 5px" color="white"> Tidak Open Booth </font> @endif</td>
                            </tr>
                            </tbody>
                        </table>


                        @if(($countpesan) < 1)
                            @if(\Illuminate\Support\Facades\Session::get('tipe') != 1 OR \Illuminate\Support\Facades\Session::get('tipe') != 2)
                                <hr>
                                <p>*<b> Tertarik untuk kerjasama? Kirimkan pesan!</b></p>
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCompose">Kirim Pesan</button>
                            @endif
                        @else
                            <div class="alert alert-success">Kamu telah mengirimkan pesan, harap tunggu balasan dari penyedia acara. <br><a href="/home/pesan">Klik disini untuk melihat pesan masuk</a> </div>
                        @endif


                            @if(\Illuminate\Support\Facades\Session::get('tipe') != 1)
                                <hr>
                                <p>*<b> Ingin diingatkan mengenai acara diatas?</b></p>
                                <a class="btn btn-primary btn-md" href="/smsNotification">Ingatkan Saya</a>
                            @endif

                    </div>
                    <!--end blog-item-inner -->



                    <h4> Jumlah Review : {{ $countdata }}</h4>

                    @foreach($review as $reviews)
                    <!--begin comments_box -->
                    <div class="comments_box">
                        <img src="/frontend/images/icon/icon-reviewer.jpg" alt="Picture" class="comments_pic" >
                        <!--begin post_text -->
                        <div class="post_text">
                            @foreach(\App\modelUser::where('id',$reviews->user_id)->get() as $users)
                            <h5> {{ $users->nama }}</h5>
                            @endforeach
                            @php Carbon\Carbon::setLocale('id') @endphp
                            <p style="font-size: 11px">{{   \Carbon\Carbon::createFromTimeStamp(strtotime($reviews->created_at))->diffForHumans() }}</p>
                            {{--<ul class="post_info"></ul>--}}
                            <p>{{ $reviews->pesan }}</p>
                        </div>
                        <!--end post_text -->
                    </div>
                    <!--end comments_box -->
                    @endforeach


                    @if(count($review_user) <= 0)
                        <h5 class="padding-top-30">Hi, {{ \Illuminate\Support\Facades\Session::get('name') }}, tertarik untuk memberikan review? Bagaimana {{ $x->judul }} menurut kamu?</h5>
                        {{--<p>Pellentesque mattis quam non ullamcorper semper, risus vels tortor etim iacus pharetra. Nullam tellus arcu, moldis vels nibh ut, gravida moldis ipse. Prod sed pharetra nunc. Quisque ornare luctis augue vel facilisis etims mattis.</p>--}}
                        <!--begin comments_form -->
                        <form class="comments_form" action="/reviewPost/{{base64_encode($x->id)}}" method="post">
                            {{ csrf_field() }}
                            <textarea name="message" placeholder="Your Message..." rows="2" cols="20" class="comments_text white-input"></textarea>
                            <input type="submit" value="Submit" id="submit-button" class="comments-submit" />
                        </form>
                        <!--end comments_form -->
                    @else
                        <div class="alert alert-success">Terimakasih telah mereview acara <b>{{ $x->judul }}</b></div>
                    @endif

                    @endforeach
                </div>

            </div>
            <!--begin col-sm-4 -->
            <div class="col-sm-4 margin-top-20">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDPTN4XP15pt71SSLSJPo4JCfBe-Vrlpoc"></script>
                @foreach($acaras as $x)
                <h4>Peta Acara</h4>
                <input type="hidden" id="lat" value="{{ $x->latitude }}">
                <input type="hidden" id="long" value="{{ $x->longitude }}">
                <div id="map" style="width: 400px; height: 300px;"></div>

                <script type="text/javascript">
                    var x = document.getElementById("lat").value;
                    var y = document.getElementById("long").value;
                    //              menentukan koordinat titik tengah peta
                    var myLatlng = new google.maps.LatLng(x,y);

                    //              pengaturan zoom dan titik tengah peta
                    var myOptions = {
                        zoom: 15,
                        center: myLatlng
                    };

                    //              menampilkan output pada element
                    var map = new google.maps.Map(document.getElementById("map"), myOptions);

                    //              menambahkan marker
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: "{{ $x->judul }}"
                    });
                </script>
                @endforeach
<hr>
                <!--begin recent_posts -->
                <h5>Acara Terbaru</h5>
                @foreach($recent as $recents)
                    <div class="sidebar_posts">
                        <a href="#" title=""><img src="{{ url('uploads/foto') }}/{{ $recents->foto }}" alt=""></a>
                        <a href="/acara/{{base64_encode($recents->id)}}" title="">{{ $recents->judul }}</a>
                        <span class="sidebar_post_date">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($recents->created_at))->diffForHumans() }}</span>
                    </div>
                @endforeach
                {{--<div class="sidebar_posts">--}}
                    {{--<a href="#" title=""><img src="/frontend/images/footer2.jpg" alt=""></a>--}}
                    {{--<a href="#" title="">Eodem modo typi, quisty et nunc nobis videntur parum clarits, it magna...</a>--}}
                    {{--<span class="sidebar_post_date">17 September 2017</span>--}}
                {{--</div>--}}
                {{--<div class="sidebar_posts last">--}}
                    {{--<a href="#" title=""><img src="/frontend/images/footer3.jpg" alt=""></a>--}}
                    {{--<a href="#" title="">Eodem modo typi, quisty et nunc nobis videntur parum clarits, it magna...</a>--}}
                    {{--<span class="sidebar_post_date">27 October 2017</span>--}}
                {{--</div>--}}
                <!--begin recent_posts -->

            </div>
            <!--end col-sm-4-->

        </div>
        <!--end row-->

    </div>
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
                        @foreach($acaras as $acara)
                        <div class="form-group">
                            <label class="col-sm-2" for="inputTo">Kepada</label>
                            <input type="hidden" name="idAcara" class="form-control" value="{{ $acara->id }}">
                            <input type="hidden" name="idPenerima" class="form-control" value="{{ $acara->user_id }}">
                            <div class="col-sm-10"><input disabled type="text" class="form-control" id="nameModal" placeholder="comma separated list of recipients" value="{{ $acara->judul }}"></div>
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