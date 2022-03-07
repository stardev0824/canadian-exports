<div class="container-fluid related-program-outer" style="margin: 0px 0px">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="related-program">
						<h3>Related Programs</h3>
						<div class="table-responsive">
							<table class="table no-border">
								<thead>
									<tr>
										<th>Program name</th>
										<th>length</th>
										<th>Tuition, canadian student</th>
										<th>Tuition, international student</th>
									</tr>
								</thead>
								<tbody>
								    <?php
								    $get=DB::table('ads')->select('*')->get();
								    ?>
								    @foreach($get as $key=>$data)
									<tr>
										<td><a href="{{$data->program_url}}">{{$data->program_name}}</a></td>
										<td>{{$data->length}}</td>
										<td>$ {{$data->tuition_canadian_students}}</td>
										<td>$ {{$data->tuition_international_students}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>	