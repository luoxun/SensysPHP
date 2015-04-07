@include('user.header')
	<div class="ui attached menu">
		<a class="active item">
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
	<div class="ui attached segment" style="height: 100%" id="gradient-center">
		<div class="ui centered grid">
			<div class="column">
				<center style="margin-top: 150px">
				<div class="ui black label">v2.0 beta</div>
				<h1 class="ui inverted header">
					<span id="blinkcursor"></span><span class="typed-cursor"></span>
				</h1>
				<a class="large ui inverted teal basic button">Download <i class="download icon"></i></a>
				</center>
			</div>
		</div>
	</div>
	<div class="ui attached segment">
		<div class="ui vertical segment">
			<h2 class="ui center aligned icon header">
				<i class="circular search icon"></i>
				Search
			</h2>
			<div class="ui centered grid">
				<div class="eight wide column">
				{{ Form::open(array('url'=>' ','method'=>'post')) }}
					<div class="ui form">
						{{ Form::input('text', 'search', null, array('placeholder'=>'Search Here...')) }}
						{{ Form::submit('search', array('class'=>'ui button')) }}
					</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<div class="ui bottom attached segment">
		<div class="ui three column equal height center aligned divided relaxed stackable page grid">
			<div class="column">
				<div class="ui fluid card">
					<div class="image">
						<img src="">
					</div>
					<div class="content">
						<div class="header">Improved Naive Bayes Classifier</div>
						<div class="description">
							When you make an aquintance better be a smaller or else die !
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui fluid card">
					<div class="image">
						<img src="">
					</div>
					<div class="content">
						<div class="header">Improved Naive Bayes Classifier</div>
						<div class="description">
							When you make an aquintance better be a smaller or else die !
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui fluid card">
					<div class="image">
						<img src="">
					</div>
					<div class="content">
						<div class="header">Improved Naive Bayes Classifier</div>
						<div class="description">
							When you make an aquintance better be a smaller or else die !
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('user.footer')