@extends('frontend.base')
@section('content')

    @include('frontend.homepage.slider')

    <!--begin section-white-->
    <section class="section-white small-padding-bottom">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row margin-bottom-10">

                <!--begin col-md-12-->
                <div class="col-md-12 text-center">
                    <h2 class="section-title">Beragam Keuntungan Untuk Penyelenggara Acara</h2>
                </div>
                <!--end col-md-12-->

            </div>
            <!--end row-->

            <!--begin row-->
            <div class="row">

                <!--begin col-sm-4-->
                <div class="col-sm-4 features-item">

                    <img src="/frontend/images/icon2.png" alt="Service Title" class="icon-pic">

                    <h3>Tentukan Jadwal Sendiri</h3>

                    <p>Ragu kalau acara kamu akan mundur? Tentukan dan ubah jadwal acara-mu kapan saja!</p>

                </div>
                <!--end col-sm-4-->

                <!--begin col-sm-4-->
                <div class="col-sm-4 features-item">

                    <img src="/frontend/images/icon1.png" alt="Service Title" class="icon-pic">

                    <h3>Sebarkan Acaramu</h3>

                    <p>Sebarkan acaramu kemana saja tanpa batas melalui Kaleya. Masyarakat akan melihat detail acaramu!</p>

                </div>
                <!--end col-sm-4-->

                <!--begin col-sm-4-->
                <div class="col-sm-4 features-item">

                    <img src="/frontend/images/icon3.png" alt="Service Title" class="icon-pic">

                    <h3>Terhubung Dengan Banyak Pihak</h3>

                    <p>Terhubung dengan pihak sponsor, media partner, hingga pengusaha yang akan menjadi partner di acara-mu!</p>

                </div>
                <!--end col-sm-4-->

                <!--begin col-sm-4-->
                <div class="col-sm-4 features-item">

                    <img src="/frontend/images/icon4.png" alt="Service Title" class="icon-pic">

                    <h3>Sistem Pengingat</h3>

                    <p>Kamu lupa dengan halaman-mu? Kami akan ingatkan dirimu melalui SMS!</p>

                </div>
                <!--end col-sm-4-->

                <!--begin col-sm-4-->
                <div class="col-sm-4 features-item">

                    <img src="/frontend/images/icon8.png" alt="Service Title" class="icon-pic">

                    <h3>Biaya 0 Rupiah</h3>

                    <p>Tak perlu takut keluar biaya! Kaleya tidak akan meminta biaya sedikitpun kepada kamu!</p>

                </div>
                <!--end col-sm-4-->

                <!--begin col-sm-4-->
                <div class="col-sm-4 features-item">

                    <img src="/frontend/images/icon5.png" alt="Service Title" class="icon-pic">

                    <h3>Privasi Terjaga</h3>

                    <p>Privasi kamu dengan salah satu media partner sangat kami jaga kerahasiannya! Tidak perlu takut percakapanmu dicuri!</p>

                </div>
                <!--end col-sm-4-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end section-white-->


    <!--begin section-grey -->
    <section class="section-grey">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-6-->
                <div class="col-md-6 margin-top-10">

                    <iframe width="560" height="315" src="https://www.youtube.com/embed/SWRUeB_Mngo?rel=0" frameborder="0" allowfullscreen></iframe>

                </div>
                <!--end col-sm-6-->

                <!--begin col-md-6-->
                <div class="col-md-6 margin-top-10">

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">

                            <div class="panel-heading" role="tab" id="headingOne">

                                <h4 class="panel-title">

                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="icon icon-rocket panel-icon"></i> Apa itu Kaleya?
                                    </a>

                                </h4>

                            </div>

                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                                <div class="panel-body">
                                    <p>Kaleya adalah website yang membantu anda mencari acara kebudayaan Indonesia dalam bentuk kalendar. Kamu dapat mencari acara dengan cara yang berbeda, cari acara kebudayaan dengan metode yang menarik layaknya kamu menghitung hari !</p>
                                </div>

                            </div>

                        </div>


                    </div>

                </div>
                <!--end col-sm-6-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end section-grey-->


    {{--<!--begin team -->--}}
    {{--<section class="section-dark small-padding-bottom">--}}

        {{--<!--begin container-->--}}
        {{--<div class="container">--}}

            {{--<!--begin row-->--}}
            {{--<div class="row margin-bottom-20">--}}

                {{--<!--begin col-md-12-->--}}
                {{--<div class="col-md-10 col-md-offset-1 text-center">--}}
                    {{--<h2 class="section-title grey">Temukan Team Terbaik</h2>--}}

                    {{--<p class="section-subtitle grey">Kamu ingin konsultasi mengenai acaramu? Temukan team terbaik dari kami!</p>--}}
                {{--</div>--}}
                {{--<!--end col-md-12-->--}}

            {{--</div>--}}
            {{--<!--end row-->--}}

            {{--<!--begin row-->--}}
            {{--<div class="row">--}}

                {{--<!--begin team-item -->--}}
                {{--<div class="col-sm-4 team-item">--}}

                    {{--<img src="/frontend/images/team1.jpg" class="team-img" alt="pic">--}}

                    {{--<h3>JOHNATHAN HAWKINS</h3>--}}

                    {{--<div class="team-info"><p>Head of SEO</p></div>--}}

                    {{--<p class="white">Johnathan is our  co-founder and has developed search strategies for a variety of clients from international brands to medium sized businesses for over five years.</p>--}}

                    {{--<ul class="team-icon">--}}

                        {{--<li><a href="#" class="twitter"><i class="icon icon-twitter"></i></a></li>--}}

                        {{--<li><a href="#" class="pinterest"><i class="icon icon-pinterest"></i></a></li>--}}

                        {{--<li><a href="#" class="facebook"><i class="icon icon-facebook"></i></a></li>--}}

                        {{--<li><a href="#" class="dribble"><i class="icon icon-dribble"></i></a></li>--}}

                    {{--</ul>--}}

                {{--</div>--}}
                {{--<!--end team-item -->--}}

                {{--<!--begin team-item -->--}}
                {{--<div class="col-sm-4 team-item">--}}

                    {{--<img src="/frontend/images/team3.jpg" class="team-img" alt="pic">--}}

                    {{--<h3>ALEXANDRA SMITHS</h3>--}}

                    {{--<div class="team-info"><p>SEO Specialist</p></div>--}}

                    {{--<p class="white">Graduating with a degree in Spanish and English, Alexandra has always loved writing and now she’s lucky enough to do it as part of her new job inside our agency.</p>--}}

                    {{--<ul class="team-icon">--}}

                        {{--<li><a href="#" class="twitter"><i class="icon icon-twitter"></i></a></li>--}}

                        {{--<li><a href="#" class="pinterest"><i class="icon icon-pinterest"></i></a></li>--}}

                        {{--<li><a href="#" class="facebook"><i class="icon icon-facebook"></i></a></li>--}}

                        {{--<li><a href="#" class="dribble"><i class="icon icon-dribble"></i></a></li>--}}

                    {{--</ul>--}}

                {{--</div>--}}
                {{--<!--end team-item -->--}}

                {{--<!--begin team-item -->--}}
                {{--<div class="col-sm-4 team-item">--}}

                    {{--<img src="/frontend/images/team4.jpg" class="team-img" alt="pic">--}}

                    {{--<h3>RICHARD JOHANSON</h3>--}}

                    {{--<div class="team-info"><p>Marketing Manager</p></div>--}}

                    {{--<p class="white">Richard first fell in love with digital marketing at university. He loves to learn, and looks forward to being part of this exciting industry for many years.</p>--}}

                    {{--<ul class="team-icon">--}}

                        {{--<li><a href="#" class="twitter"><i class="icon icon-twitter"></i></a></li>--}}

                        {{--<li><a href="#" class="pinterest"><i class="icon icon-pinterest"></i></a></li>--}}

                        {{--<li><a href="#" class="facebook"><i class="icon icon-facebook"></i></a></li>--}}

                        {{--<li><a href="#" class="dribble"><i class="icon icon-dribble"></i></a></li>--}}

                    {{--</ul>--}}

                {{--</div>--}}
                {{--<!--end team-item -->--}}

            {{--</div>--}}
            {{--<!--end row-->--}}

        {{--</div>--}}
        {{--<!--end container-->--}}

    {{--</section>--}}
    {{--<!--end team-->--}}

    <!--begin process-wrapper -->
    <section class="section-white process-wrapper">

        <!--begin process-inner -->
        <div class="process-inner">

            <!--begin container-->
            <div class="container">

                <!--begin row-->
                <div class="row margin-bottom-50">

                    <!--begin col-md-12-->
                    <div class="col-md-12 text-center">
                        <h2 class="section-title">Langkah Mudah Menggunakan Kaleya</h2>

                        {{--<p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>--}}
                    </div>
                    <!--end col-md-12-->

                </div>
                <!--end row-->

                <!--begin row-->
                <div class="row">

                    <!--begin col-md-3-->
                    <div class="col-sm-6 col-md-3">

                        <!--begin process-->
                        <div class="process">

                            <div class="process-circle">

                                <div class="process-circle-icon">

                                    <img src="/frontend/images/process1.jpg" alt="" class="width-100">

                                    <p class="process-description">Tunggu apalagi? Segera daftarkan dirimu jika belum bergabung!</p>

                                </div>

                            </div>

                            <p class="process-title">Masuk / Daftar!</p>

                        </div>
                        <!--end process-->

                    </div>
                    <!--end col-md-3-->

                    <!--begin col-md-3-->
                    <div class="col-sm-6 col-md-3">

                        <!--begin process-->
                        <div class="process">

                            <div class="process-circle">

                                <div class="process-circle-icon">

                                    <img src="/frontend/images/process2.jpg" alt="" class="width-100">

                                    <p class="process-description">Buat sebuah acara dan masukkan segala informasi mengenai acaramu!</p>

                                </div>

                            </div>

                            <p class="process-title">Masukkan Data</p>

                        </div>
                        <!--end process-->

                    </div>
                    <!--end col-md-3-->

                    <!--begin col-md-3-->
                    <div class="col-sm-6 col-md-3">

                        <!--begin process-->
                        <div class="process">

                            <div class="process-circle">

                                <div class="process-circle-icon">

                                    <img src="/frontend/images/process3.jpg" alt="" class="width-100">

                                    <p class="process-description">Sebarkan acaramu kemana saja dan tunggu respon dari masyarakat!.</p>

                                </div>

                            </div>

                            <p class="process-title">Sebarkan</p>

                        </div>
                        <!--end process-->

                    </div>
                    <!--end col-md-3-->

                    <!--begin col-md-3-->
                    <div class="col-sm-6 col-md-3">

                        <!--begin process-->
                        <div class="process">

                            <div class="process-circle">

                                <div class="process-circle-icon">

                                    <img src="/frontend/images/process5.jpg" alt="" class="width-100">

                                    <p class="process-description">Dapatkan kerjasama dari pihak ketiga!</p>

                                </div>

                            </div>

                            <p class="process-title">Kerjasama</p>

                        </div>
                        <!--end process-->

                    </div>
                    <!--end col-md-3-->

                </div>
                <!--end row-->

            </div>
            <!--end container-->

        </div>
        <!--end process-inner -->

    </section>
    <!--end process-wrapper -->

        </div>
        <!--begin container-->

    </div>
    <!--end newsletter_wrapper-->
@endsection