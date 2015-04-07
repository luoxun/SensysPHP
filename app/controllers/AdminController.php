<?php

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class AdminController extends \BaseController {

// Basic Controller
	public function index(){
		return View::make('admin.index');
	}

	public function post_wizard_crawling(){

		$data = array(
			'url'=>Input::get('url'),
			'rule'=>Input::get('rule')
		);

		return Redirect::intended('master/wizard-crawl')
			   ->with('data',$data)
			   ->with('formstatus','true');
	}

	public function get_wizard_scrapping(){
		return View::make('admin.basic.wizard_scrap');
	}

	public function get_wizard_classifying(){
		return View::make('admin.basic.wizard_classify');
	}

	public function get_wizard_report(){
		return View::make('admin.basic.wizard_report');
	}

	public function upload_data_training(){
		
	}

// Advance Controller
	public function get_advance_crawling(){
		return View::make('admin.advance.crawling');
	}
	public function post_advance_crawling(){
		$getdata = array(
			'url'=>Input::get('url'),
			'rule'=>Input::get('rule'),
			'contenttype'=>Input::get('type'),
			'urlfilterrule'=>Input::get('filter'),
			'folmod'=>Input::get('folmod')
		);
		
		return Redirect::back()->with('getdata',$getdata);
	}

	public function get_advance_scraping(){
		$geturl = Crawling::distinct()->select('refurl')->groupBy('refurl')->lists('refurl');
		return View::make('admin.advance.scraping')->with('geturl',$geturl);
	}
	public function post_advance_scraping(){
		$client = new Client();

		$getdata = array(
			'crawled_url'=>Input::get('crawled_url'),
			'title'=>Input::get('title'),
			'article'=>Input::get('article')
		);

		$geturl = DB::collection('crawling')->where('refurl',$getdata['crawled_url'])->get();
		
		foreach ($geturl as $key) {
			$client = new Client();

			$url = $key->url;

			$crawler = $client->request('GET',$url);

			$status_code = $client->getResponse()->getStatus();
			if($status_code==200){
				$crawler->filter($key->title)->each(function ($node){
					print $node->text()."<br>";
				});

				$crawler->filter($key->article)->each(function ($node){
					print $node->text()."<br>";
				});
			}else{
				echo "we FUCKING LOST DUDE !";
			}

			echo "<hr>";
		}


	}

	public function get_advance_classifying(){
		$geturl = Datadom::distinct()->select('domain')->groupBy('domain')->lists('domain');
		return View::make('admin.advance.classifying')->with('geturl',$geturl);
	}
	public function post_advance_classifying(){

	}

// Report Controller
	public function get_acc_report(){
		return View::make('admin.report.acc');
	}

	public function get_det_report(){
		return View::make('admin.report.det');
	}

// Setting Controller
	public function get_setting(){
		return View::make('admin.setting.setting');
	}

// Other Controller
	public function get_api(){
		return View::make('admin.other.api');
	}

	public function get_about(){
		return View::make('admin.other.about');
	}

// Logout Controller

	public function get_logout(){

	}
}