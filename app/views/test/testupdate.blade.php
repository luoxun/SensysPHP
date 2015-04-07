@include('test/header')
	<div class="ui top attached segment">
		<h2 class="ui header">
			<i class="bug icon"></i>
			<div class="content">
				Test Update
			</div>
		</h2>
	</div>
	<div class="ui attached segment">
		<div class="ui one column stackable center aligned page grid">
		  <div class="column twelve wide">
		   @if (Session::has('message'))
		   	 @if (Session::get('message') == "Sukses")
		   	 	<div class="ui positive message">
		   	 		<div class="header">
		   	 			Apdet Berhasil gans !
		   	 		</div>
		   	 	</div>
		   	 @elseif (Session::get('message') == "Gagal")
		   	 	<div class="ui negative message">
		   	 		<div class="header">
		   	 			Apdet Gagal gans !
		   	 		</div>
		   	 	</div>
		   	 @endif
		   @endif
		   @foreach ($data as $key)
			<div class="item">
				<div class="content">
					<h3 class="ui center aligned icon header">
						@if ($key->category == "pos")
							<i class="plus icon"></i>
						@elseif ($key->category == "neg")
							<i class="minus icon"></i>
						@endif
					</h3>
					<div class="description">
						{{ $key->article }}
					</div>
				</div>
			</div>
			<br>
			<div class="item">
				<div class="ui form">
					{{ Form::open(array('TestController@post_update')) }}
					{{ Form::hidden('id',$key->id) }}
					{{ Form::hidden('stat',1) }}
					<div class="field">
						{{ Form::select('validate',array('pos'=>'Positif','neg'=>'Negatif'),$key->category,array('class'=>'ui selection dropdown')) }}
					</div>
					{{ Form::submit('Update',array('class'=>'ui submit button')) }}
					{{ Form::close() }}
				</div>
			</div>
			@endforeach
		  </div>
		</div>
	</div>
	<div class="ui bottom attached segment">
		<div class="ui one column stackable center aligned page grid">
			<div class="column twelve wide"> 
				{{ $data->links('pagination.index') }}
			</div>
		</div>
	</div>
@include('test/footer')