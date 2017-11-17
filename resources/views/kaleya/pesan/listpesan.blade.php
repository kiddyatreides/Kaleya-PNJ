@extends('kaleya/layouts/app')
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
        <small>13 new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @if(count($pesan) < 1)
                    <tr>
                      <td class="mailbox-name"><p style="color: blue"></p></td>
                      <td class="mailbox-subject"><center><b></b> No Messages</center>
                      </td>
                      <td class="mailbox-attachment"></td>
                      <td class="mailbox-date"></td>
                    </tr>
                  @else
                    @foreach($pesan as $pesans)
                    <tr>
                      @foreach(\App\modelUser::where('id',$pesans->pengirim_id)->get() as $user)
                      <td class="mailbox-name"><p style="color: blue">{{ $user->nama }}</p></td>
                      @endforeach
                      <td class="mailbox-subject"><a href="{{route('pesan.show', $pesans->kode) }}"> @foreach(\App\modelAcara::where('id',$pesans->acara_id)->get() as $acara) <b>{{ $acara->judul }}</b> @endforeach - {{ substr($pesans->pesan,0,30) }} [...]</a>
                      </td>
                      <td class="mailbox-attachment"></td>
                      @php Carbon\Carbon::setLocale('id') @endphp
                      <td class="mailbox-date">{{ \Carbon\Carbon::createFromTimestamp(strtotime($pesans->created_at))->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                  @endif
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection