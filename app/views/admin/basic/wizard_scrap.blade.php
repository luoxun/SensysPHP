@include('admin.header')
	<div class="pusher">
		<div class="ui basic segment">
			<div class="ui vertical segment">
				<div class="ui ordered steps">
					<div class="completed step">
						<div class="content">
							<div class="title">
								Crawling
							</div>
							<div class="description">
								Insert an Url to crawl
							</div>
						</div>
					</div>
					<div class="active step">
						<div class="content">
							<div class="title">
								Scrapping
							</div>
							<div class="description">
								Choose File to Scrap
							</div>
						</div>
					</div>
					<div class="disabled step">
						<div class="content">
							<div class="title">
								Classifying
							</div>
							<div class="description">
								Choose File to classify
							</div>
						</div>
					</div>
					<div class="disabled step">
						<div class="content">
							<div class="title">
								Get Report
							</div>
							<div class="description">
								You may see a report here
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ui vertical segment">
				<div class="ui form">
				{{ Form::open() }}
					<div class="eight wide field">
						<label>Title Element</label>
						{{ Form::input('text','title',null,array('placeholder'=>'e.g @ republika: div#content')) }}
					</div>
					<div class="eight wide field">
						<label>Article Element</label>
						{{ Form::input('text','article',null,array('placeholder'=>'e.g @republika: div#content')) }}
					</div> 
					{{ Form::submit('Start Scrapping', array('class'=>'ui primary button')) }}
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@include('admin.footer')