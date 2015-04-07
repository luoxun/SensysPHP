@include('user.header')
	<div class="ui attached menu">
		<a class="item">
			<i class="home icon"></i>Home
		</a>
		<a class="item">
			<i class="book icon"></i>Articles
		</a>
		<a class="item">
			<i class="feed icon"></i>Feedback
		</a>
		<a class="item">
			<i class="info icon"></i>About
		</a>
	</div>
	<div class="ui bottom attached segment">
		<div class="ui vertical segment">
			<div class="ui grid">
				<div class="eight wide column">
				{{ Form::open(array('action'=>'UserController@submit_search')) }}
					<div class="ui form">
						{{ Form::input('text', 'search', null, array('placeholder'=>'Search Here...')) }}
						{{ Form::submit('search', array('class'=>'ui button')) }}
					</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
		<div class="ui vertical segment">
			<h5 ui class="ui header">Search Result</h5>
		</div>
		<div class="ui vertical segment">
			<div class="ui items" style="margin-left: 10%">
				@foreach ( Session::get('datadom') as $key)
					<div class="item">
						<div class="content">
							<div class="header">{{ $key->title }}</div>
							<div class="meta">
								<a href="{{ $key->url }}">{{ $key->url }}</a>
							</div>
							<div class="description">
								<p>
									{{ substr($key->article, 0,200) }}
									<a href="#">Read More</a>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	
@include('user.footer')