@extends('frontend.base')
@section('content')

    @include('frontend.user.menu', ['menu' => 'Home' ])

    <section class="section-white small-padding">
        <div class="container">
            <div class="wrapper">
                <ul id="sb-slider" class="sb-slider">
                    <li>
                        <a href="http://www.flickr.com/photos/strupler/2969141180" target="_blank"><img src="/frontend/images/slider/festival_1.jpg" alt="image1"/></a>
                    </li>
                    <li>
                        <a href="http://www.flickr.com/photos/strupler/2969141180" target="_blank"><img  src="/frontend/images/slider/festival_2.jpg" alt="image1"/></a>
                    </li>
                    <li>
                        <a href="http://www.flickr.com/photos/strupler/2969141180" target="_blank"><img src="/frontend/images/slider/festival_3.jpg" alt="image1"/></a>
                    </li>
                    {{--<div id="shadow" class="shadow"></div>--}}
                    {{--<div id="nav-arrows" class="nav-arrows">--}}
                    {{--<a href="#">Next</a>--}}
                    {{--<a href="#">Previous</a>--}}
                    {{--</div>--}}
                    {{--<div id="nav-options" class="nav-options">--}}
                    {{--<span id="navPlay">Play</span>--}}
                    {{--<span id="navPause">Pause</span>--}}
                    {{--</div>--}}
                </ul>
            </div><!-- /wrapper -->
        </div>
        <hr>

        <div class="container">
            <!--begin row-->
            <div class="row">
                <div class="col-sm-12 margin-bottom-50">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function click(){
            swal("Good job!", "You clicked the button!", "success");
        }
    </script>

    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prevYear, prev, next, nextYear, today,',
                    center: 'title',
                    right: ', month, basicWeek, basicDay'
                },
                defaultDate: ('yy/mm/dd', new Date()),
                navLinks: true, // can click day/week names to navigate views
                eventLimit: true, // allow "more" link when too many events
                events: [
                    @foreach($user as $datas)
                    {
                        title: '{{ $datas->judul }}',
                        start: '{{ $datas->tanggal_mulai }}',
                        end: '{{ $datas->tanggal_berakhir }}',
                        url: '{{url('acara/'.base64_encode($datas->id))}}'
                    },
                    @endforeach

                ]
            });

        });

    </script>





@endsection