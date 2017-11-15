@extends('frontend.base')
@section('content')
    @include('frontend.user.menu')
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
                            <a href="#"><img src="/frontend/images/blog1.jpg" class="width-100" alt="pic"><span class="eye-wrapper2"><i class="icon icon-link eye-icon"></i></span></a>
                        </div>
                    </div>

                    <!--begin popup image -->

                    <!--begin blog-item_inner -->
                    <div class="blog-item-inner margin-bottom-50">

                        <h3 class="blog-title"><a href="#">{{ $x->judul }}</a></h3>

                        @foreach(\App\modelUser::where('id',$x->user_id)->get() as $y)
                            <a href="#" class="blog-icons"><i class="icon icon-user"></i> {{ $y->nama }}</a>

                        <a href="#" class="blog-icons last"><i class="icon icon-calendar"></i> {{$x->tanggal_mulai }}</a>
                        @endforeach

                        <p>{{ $x->deskripsi }}</p>

                    </div>
                    <!--end blog-item-inner -->



                    <h4>2 Comments</h4>

                    @foreach($review as $reviews)
                    <!--begin comments_box -->
                    <div class="comments_box">
                        <img src="/frontend/images/team3.jpg" alt="Picture" class="comments_pic">
                        <!--begin post_text -->
                        <div class="post_text">
                            @foreach(\App\modelUser::where('id',$reviews->user_id)->get() as $users)
                            <h5> {{ $users->nama }}</h5>
                            @endforeach
                            <ul class="post_info">
                                <li>
                                    <a href="#"></a>
                                </li>
                            </ul>
                            <p>{{ $reviews->pesan }}</p>
                        </div>
                        <!--end post_text -->
                    </div>
                    <!--end comments_box -->
                    @endforeach




                    <h4 class="padding-top-30">Hi, {{ \Illuminate\Support\Facades\Session::get('name') }}, tertarik untuk memberikan review? Bagaimana {{ $x->judul }} menurut kamu!</h4>

                    {{--<p>Pellentesque mattis quam non ullamcorper semper, risus vels tortor etim iacus pharetra. Nullam tellus arcu, moldis vels nibh ut, gravida moldis ipse. Prod sed pharetra nunc. Quisque ornare luctis augue vel facilisis etims mattis.</p>--}}

                    <!--begin comments_form -->
                    <form class="comments_form" action="/reviewPost/{{base64_encode($x->id)}}" method="post">
                        {{ csrf_field() }}
                        <textarea name="message" placeholder="Your Message..." rows="2" cols="20" class="comments_text white-input"></textarea>
                        <input type="submit" value="Submit" id="submit-button" class="comments-submit" />
                    </form>
                    <!--end comments_form -->
                    @endforeach
                </div>

            </div>
            <!--end col-sm-8-->

            <!--begin col-sm-4 -->
            <div class="col-sm-4 margin-top-20">

                <!--begin recent_posts -->
                <h5>Recent Posts</h5>
                <div class="sidebar_posts">
                    <a href="#" title=""><img src="/frontend/images/footer1.jpg" alt=""></a>
                    <a href="#" title="">Eodem modo typi, quisty et nunc nobis videntur parum clarits, it magna...</a>
                    <span class="sidebar_post_date">21 July 2017</span>
                </div>
                <div class="sidebar_posts">
                    <a href="#" title=""><img src="/frontend/images/footer2.jpg" alt=""></a>
                    <a href="#" title="">Eodem modo typi, quisty et nunc nobis videntur parum clarits, it magna...</a>
                    <span class="sidebar_post_date">17 September 2017</span>
                </div>
                <div class="sidebar_posts last">
                    <a href="#" title=""><img src="/frontend/images/footer3.jpg" alt=""></a>
                    <a href="#" title="">Eodem modo typi, quisty et nunc nobis videntur parum clarits, it magna...</a>
                    <span class="sidebar_post_date">27 October 2017</span>
                </div>
                <!--begin recent_posts -->

            </div>
            <!--end col-sm-4-->

        </div>
        <!--end row-->

    </div>
    <!--end container-->

    </section>
@endsection