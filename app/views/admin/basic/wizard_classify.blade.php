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
					<div class="completed step">
						<div class="content">
							<div class="title">
								Scrapping
							</div>
							<div class="description">
								Choose File to Scrap
							</div>
						</div>
					</div>
					<div class="active step">
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
						<label>Classifier Algorithm</label>
						{{ Form::select('algo',array('bayes'=>'Naive Bayes','kmean'=>'K-Mean [Under Maintenance]','ngram'=>'N-Gram [Under Maintenance]','svm'=>'SVM [Under Maintenance]'), 'bayes',array('class'=>'ui dropdown')) }}
					</div>
					<div class="eight wide field">
						<label>Fill Category</label>
						{{ Form::input('text','category',null,array('placeholder'=>'e.g: postive, negative')) }}
					</div> 
					<div class="eight wide field">
						<label>Upload Data Training</label>
						<div class="ui animated button" id="upload">
							<div class="visible content">Upload Here</div>
							<div class="hidden content">
								<i class="upload icon"></i>
							</div>
						</div>
					</div>
					{{ Form::submit('Start Classify', array('class'=>'ui primary button')) }}
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@include('admin.modal')
@include('admin.footer')