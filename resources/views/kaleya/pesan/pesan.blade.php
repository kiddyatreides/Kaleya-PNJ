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
						<!-- /.box-header -->
						@foreach($modalpesan as $pesans)
						<div class="col-md-12">
							<div class="box box-primary">

								<!-- /.box-header -->
								<div class="box-body no-padding">
									<div class="mailbox-read-info">
										@foreach(\App\modelUser::where('id',$pesans->pengirim_id)->get() as $users)
											@if($pesans->pengirim_id != \Illuminate\Support\Facades\Session::get('id'))
												<h5>{{ $users->nama }}
											@else
												<h5>You <font style="font-size: 12px;">({{ $users->nama }})</font>
											@endif
											@endforeach
													<span class="mailbox-read-time pull-right">{{ \Carbon\Carbon::createFromTimestamp(strtotime($pesans->created_at))->diffForHumans() }}</span></h5>
										</div>
										<!-- /.mailbox-read-info -->
														<!-- /.mailbox-controls -->
														<div class="mailbox-read-message">
															<p>{{ $pesans->pesan }}</p>


															{{--<p>Thanks,<br>Jane</p>--}}
														</div>
														<!-- /.mailbox-read-message -->
													</div>
													<!-- /.box-body -->
												</div>
												<!-- /.box-body -->
											</div>
							@endforeach


							</section>
							<!-- /.content -->
						</div>
						@endsection