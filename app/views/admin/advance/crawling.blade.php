@include('admin.header')
<div class="ui stacked segment">
	<div class="ui one column centered grid">
		<div class="column">
		@if (Session::has('getdata'))
			<div class="ui loading form">
		@else
			<div class="ui form">
		@endif
				{{ Form::open(array('action'=>'AdminController@post_advance_crawling','method'=>'post')) }}
					<h3 class="ui dividing header">Crawl Setting</h3>
					<div class="two fields">
						<div class="field">
							<label>Website URL</label>
							<div class="field">
								{{ Form::input('text', 'url', null, array('placeholder'=>'Ex: www.merdeka.com')) }}
							</div>
							<label>Follows Match</label>
							<div class="field">
								{{ Form::input('text', 'rule', null, array('placeholder'=>'Ex: #www.merdeka.com/post#')) }}
							</div>
							<label>File Name</label>
							<div class="field">
								{{ Form::input('text', 'file', null, array('placeholder'=>'Ex: merdeka')) }}
							</div>
						</div>
						<div class="field">
							<label>Content Type Received</label>
							<div class="field">
								{{ Form::select('type', array('#text/html#'=>'HTML','#text/css#'=>'CSS'), '#text/html#', array('class'=>'ui selection dropdown')) }}
							</div>
							<label>Follow Mode</label>
							<div class="field">
								{{ Form::select('folmod', array('0'=>'Follow Every Link','1'=>'Stay in Domain','2'=>'Stay in Host','3'=>'Stay in Path'), '2', array('class'=>'ui selection dropdown')) }}
							</div>
							<label>Unfollows Match</label>
							<div class="field">
								{{ Form::input('text', 'filter', null, array('placeholder'=>'E.g: #(jpg|jpeg|gif|png|css|js)$# i')) }}
							</div>
						</div>
					</div>
					{{ Form::submit('Crawl', array('class'=>'ui submit button')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
<div class="ui stacked segment">
	<h3 class="ui dividing header">Crawl Result</h3>
	<table class="ui unstackable table">
		<thead>
			<tr>
				<th>Page Requested</th>
				<th>Page Referer</th>
				<th>Http Status Code</th>
			<tr>
		</thead>
		<tbody>
			@if (Session::has('getdata'))
				<?php
					$crawler = new KelasCrawling; 

					$crawler -> setURL(Session::get('getdata')['url']);
                                             
                    $crawler -> addURLFollowRule(Session::get('getdata')['rule']);
                                          
                    $crawler -> addContentTypeReceiveRule(Session::get('getdata')['contenttype']);
                                          
                    $crawler -> addURLFilterRule(Session::get('getdata')['urlfilterrule']);
                                         
                    $crawler -> enableCookieHandling(true);

                    $crawler -> setFollowMode(Session::get('getata')['folmod']);

                    $crawler -> setFollowRedirects(TRUE);

                    $crawler -> setStreamTimeout(3000);

                    $crawler -> setConnectionTimeout(3000);

                    $crawler -> enableAggressiveLinkSearch(FALSE);
                                            
                    $crawler -> setTrafficLimit(100000 * 1024);
                                            
                    $crawler -> go();
				?>
			@endif
		</tbody>
	</table>
</div>
@include('admin.footer')