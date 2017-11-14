@extends('frontend.base')
@section('content')
<title>Leave Message Here</title>
<div class="container">
	<div class="row">
		<div class="col-lg-offset-4 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add Message here <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
				</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">Cras justo odio</li>
						<li class="list-group-item">Dapibus ac facilisis in</li>
						<li class="list-group-item">Morbi leo risus</li>
						<li class="list-group-item">Porta ac consectetur ac</li>
						<li class="list-group-item">Vestibulum at eros</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<p>One fine body&hellip;</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</div>
@endsection