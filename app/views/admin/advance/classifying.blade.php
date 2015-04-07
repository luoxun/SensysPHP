@include('admin.header')
<div class="ui stacked segment">
	<div class="ui one column centered grid">
		<div class="column"> 
		{{ Form::open(array('action'=>'AdminController@post_advance_classifying','class'=>'ui form')) }}
			<h3 class="ui dividing header">Classify Setting</h3>
			<div class="two fields">
				<div class="field">
					<label>Select Classifier</label>
					<div class="field">
						{{ Form::select('classifier', array('naive'=>'Naive Bayes','naive2'=>'Improved Naive Bayes'), 'naive', array('class'=>'ui dropdown')) }}
					</div>
					<label>Select Crawled URL</label>
					<div class="field">
						{{ Form::select('classifier', $geturl, 'naive', array('class'=>'ui dropdown')) }}
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
<div class="ui stacked segment">
	<h3 class="ui dividing header">Scrap Result</h3>
	<table class="ui unstackable table">
		<thead>
			<tr>
				<th>No</th>
				<th>Article</th>
				<th>Category</th>
			<tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@include('admin.footer')