@include('test/header')
	<div class="ui top attached segment">
		<h2 class="ui header">
			<i class="bug icon"></i>
			<div class="content">
				Test Lihat
			</div>
		</h2>
	</div>
	<div class="ui attached segment">
		<table class="ui unstackable table">
			<thead>
				<tr>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1; ?>
				@foreach ($getdata as $key)

				<tr>
					<td>
						@if ($key['new_kelas'] == $key['user_validation'])
							@if ($key['new_kelas']== "pos")
								++|1
							@elseif ($key['new_kelas'] == "neg")
								--|1
							@endif
						@elseif ($key['new_kelas'] != $key['user_validation'])
							@if ($key['new_kelas'] == "pos" && $key['user_validation'] == "neg")
								+-|0
							@elseif ($key['new_kelas'] == "neg" && $key['user_validation'] == "pos")	
								-+|0
							@endif
						@endif
					</td>
					<?php $no++; ?>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="ui bottom attached segment">
		<div class="ui one column stackable center aligned page grid">
			<div class="column twelve wide"> 
				{{ $getdata->links('pagination.index') }}
			</div>
		</div>
	</div>
@include('test/footer')
