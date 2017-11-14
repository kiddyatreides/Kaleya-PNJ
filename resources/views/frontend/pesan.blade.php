@extends('frontend.base')
@section('content')
<title>Leave Message Here</title>
<div class="container">
	<div class="row">
		<div class="col-lg-offset-4 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Kirim Pesan <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" id="addNew" aria-hidden="true"></i></a></h3>
				</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Cras justo odio</li>
						<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Dapibus ac facilisis in</li>
						<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Morbi leo risus</li>
						<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Porta ac consectetur ac</li>
						<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Vestibulum at eros</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="title">Kirim pesan baru</h4>
					</div>
					<div class="modal-body">
						<p><input type="text" placeholder="Kirim pesan" id="addItem" class="form-control"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal" id="delete" style="display: none">Delete</button>
						<button type="button" class="btn btn-primary" id="SaveChanges" style="display: none">Save changes</button>
						<button type="button" class="btn btn-primary" id="AddButton">Kirim Pesan</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.ourItem').each(function() {
			$(this).click(function(event) {
				var text = $(this).text();
				$('#title').text('Edit Pesan');
				$('#addItem').val(text);
				$('#delete').show('400');
				$('#SaveChanges').show('400');
				$('#AddButton').hide('400');
				console.log(text);
			});
		});
		$('#addNew').click(function(event) {
				$('#title').text('Tulis Pesan');
				$('#addItem').val("");
				$('#delete').hide('400');
				$('#SaveChanges').hide('400');
				$('#AddButton').show('400');
				console.log(text);
			});
		});
</script>
@endsection