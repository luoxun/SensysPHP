@include('admin.header')
<div class="ui stacked segment">
	<div class="ui one column centered grid">
		<div class="column"> 
		@if (Session::has('getscrap'))
			<div class="ui loading form">
		@else
			<div class="ui form">
		@endif
			{{ Form::open(array('action'=>'AdminController@post_advance_scraping')) }}
				<h3 class="ui dividing header">Scrap Setting</h3>
				<div class="two fields">
					<div class="field">
						<label>Crawled URL</label>
						<div class="field">
							{{ Form::select('crawled_url', $geturl, Input::old('crawled_url'), array('class'=>'ui dropdown')) }}
						</div>
						<label>Title Element</label>
						<div class="field">
							{{ Form::input('text', 'title', null, array('placeholder'=>'Ex: div#title')) }}
						</div>
						<label>Article Element</label>
						<div class="field">
							{{ Form::input('text', 'article', null, array('placeholder'=>'Ex: div#article')) }}
						</div>
					</div>
					<div class="field">
					</div>
				</div>
				{{ Form::submit('Scrap', array('class'=>'ui submit button')) }}
			{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
<div class="ui stacked segment">
	<h3 class="ui dividing header">Scrap Result</h3>
	<table class="ui unstackable table">
		<thead>
			<tr>
				<th>Scrapped URL</th>
				<th>Article Title</th>
				<th>Article Content</th>
			<tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@include('admin.footer')