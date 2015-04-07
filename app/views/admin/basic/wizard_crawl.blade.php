@include('admin.header')
	<div class="pusher">
		<div class="ui basic segment">
			<div class="ui vertical segment">
				<div class="ui ordered steps">
					<div class="active step">
						<div class="content">
							<div class="title">
								Crawling
							</div>
							<div class="description">
								Insert an Url to crawl
							</div>
						</div>
					</div>
					<div class="disabled step">
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
				@if(Session::has('formstatus'))
					<div class="ui loading form">
				@else
					<div class="ui form">
				@endif
				{{ Form::open(array('action'=>'AdminController@post_wizard_crawling')) }}
					<div class="eight wide field">
						<label>Website URL</label>
						{{ Form::input('text','url',null,array('placeholder'=>'e.g: http://www.bing.com')) }}
					</div>
					<div class="eight wide field">
						<label>Follows Rule</label>
						{{ Form::input('text','rule',null,array('placeholder'=>'e.g:#www.bing.com/post#')) }}
					</div> 
					{{ Form::submit('Start Crawling', array('class'=>'ui primary button')) }}
				{{ Form::close() }}
				</div>
			</div>
			<div class="ui vertical segment">
			<?php
				if(Request::isMethod('post')){

					$crawler = new Crawling;

					// URL to crawl 
					$crawler->setURL("www.sysfoghost.in"); 

					// Only receive content of files with content-type "text/html" 
					$crawler->addContentTypeReceiveRule("#text/html#"); 

					// Ignore links to pictures, dont even request pictures 
					$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i"); 

					// Store and send cookie-data like a browser does 
					$crawler->enableCookieHandling(true); 

					// Set the traffic-limit to 1 MB (in bytes, 
					// for testing we dont want to "suck" the whole site) 
					$crawler->setTrafficLimit(1000 * 1024); 

					// Thats enough, now here we go 
					$crawler->go(); 
				}
			?>
			</div>
		</div>
	</div>
@include('admin.footer')