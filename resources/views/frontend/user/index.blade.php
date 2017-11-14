@extends('frontend.base')
@section('content')

    @include('frontend.user.menu')

    <section class="section-white small-padding">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">
                <div class="col-sm-12 margin-bottom-50">
                    <div id="calendar"></div>
                </div>
            </div>
            <!--end row-->

        </div>
        <!--end container-->

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
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month, basicWeek, basicDay'
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