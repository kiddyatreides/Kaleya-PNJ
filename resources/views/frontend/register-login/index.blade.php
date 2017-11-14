@extends('frontend.base')
@section('content')

    <!--begin breadcrumb-wrapper-->
    <div class="breadcrumb-wrapper">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-xs-6 -->
                <div class="col-xs-6">

                    <h2 class="page-title">Contact Us</h2>

                </div>
                <!--end col-xs-6 -->

                <!--begin col-xs-6 -->
                <div class="col-xs-6 text-right">

                    <ol class="breadcrumb">
                        <li><a href="index.html">Marketer</a></li>
                        <li class="active">Contact</li>
                    </ol>

                </div>
                <!--end col-xs-6 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </div>

    <section class="section-white small-padding">

        @if(Session::has('alert-success'))
            {!!Session::get('alert-success')!!}
        @endif
        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-sm-6 -->
                <div class="col-sm-6 margin-bottom-50">

                    <h3>Masuk Kaleya</h3>

                    <!--begin success message -->
                    <p class="contact_success_box" style="display:none;">We received your message and you'll hear from us soon. Thank You!</p>
                    <!--end success message -->

                    <!--begin contact form -->
                    <form id="contact-form" class="contact" action="php/contact.php" method="post">

                        <input class="contact-input white-input" required="" name="contact_email" placeholder="Email" type="email">
                        <input class="contact-input white-input" required="" name="contact_phone" placeholder="Password" type="password">
                        <input value="Login" id="submit-button" class="contact-submit" type="submit">

                    </form>
                    <!--end contact form -->

                </div>

                <!--begin col-sm-6 -->
                <div class="col-sm-6 margin-bottom-50">
                    <h3>Daftar Akun</h3>

                    <!--begin success message -->
                    <p class="contact_success_box" style="display:none;">We received your message and you'll hear from us soon. Thank You!</p>
                    <!--end success message -->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <!--begin contact form -->
                    <form id="contact-form" class="contact" action="/registerPost" method="post">

                        <input class="contact-input white-input" required="" name="name" placeholder="Nama Lengkap*" type="text">
                        <input class="contact-input white-input" required="" name="email" placeholder="Email*" type="email">
                        <input class="contact-input white-input" required="" name="password" placeholder="Password*" type="password">
                        <input class="contact-input white-input" required="" name="confirmation" placeholder="Password Confirmation*" type="password">
                        <input class="contact-input white-input" required="" name="phone" placeholder="Nomor Telfon*" type="text">
                        <textarea class="contact-commnent white-input" rows="2" cols="20" name="address" placeholder="Alamat*"></textarea>
                        <select class="contact-input white-input form-control" required="" name="type" >
                            <option value="">-- Tipe Akun --</option>
                            <option value="1">Penyedia Acara</option>
                            <option value="2">Pengguna</option>
                            <option value="3">Sponsor</option>
                            <option value="4">Media Partner</option>
                            <option value="5">Pengusaha</option>
                        </select>
                        <input value="Send Message" id="submit-button" class="contact-submit" type="submit">

                    </form>
                    <!--end contact form -->

                </div>
                <!--end col-sm-6-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <script type="text/javascript">
        function success(){
            swal("Good job!", "You clicked the button!", "success");
        }

        function failed(){
            swal("Failed", "Failed to Regsiter!", "failed");
        }
    </script>
@endsection