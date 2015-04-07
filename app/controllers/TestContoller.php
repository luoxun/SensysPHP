<?php

use Goutte\Client;

class TestController extends BaseController {

	public function get_update(){

		$data = Classifying::where('user_validation','=','')->orderBy('id','asc')->simplePaginate(1);

		return View::make('test.testupdate',compact('data'));
	}

	public function post_update(){
		
		$getdata = array(
			'id' =>Input::get('id'),
			'valid' =>Input::get('validate')
		);

		$content = Classifying::find($getdata['id']);
		$content->user_validation = $getdata['valid'];
		$content->save();

		if($content->save()){
			return Redirect::back()->with('message','Sukses');
		}else{
			return Redirect::back()->with('message','Gagal');
		}

	}

	public function get_classify(){
		if (PHP_SAPI != 'cli') {
			echo "<pre>";
		}

		$strings = array(
			1 => 'Weather today is rubbish',
			2 => 'This cake looks amazing',
			3 => 'His skills are mediocre',
			4 => 'He is very talented',
			5 => 'She is seemingly very agressive',
			6 => 'Marie was enthusiastic about the upcoming trip. Her brother was also passionate about her leaving - he would finally have the house for himself.',
			7 => 'To be or not to be?',
		);

		require_once(app_path().'/library/PHPInsight/autoload.php');
		$sentiment = new \PHPInsight\Sentiment();
		foreach ($strings as $string) {

			// calculations:
			$scores = $sentiment->score($string);
			$class = $sentiment->categorise($string);

			// output:
			echo "String: $string\n";
			echo "Dominant: $class, scores: ";
			print_r($scores);
			echo "\n";
		}
	}

	public function get_stem(){
		require_once(app_path().'/library/PHPInsight/autoload.php');
		$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
		$sentiment = new \PHPInsight\Sentiment();
		$stemmer = $stemmerFactory->createStemmer();

		$getdata = DB::collection('scraping')->orderBy('id','asc')->get();

		foreach ($getdata as $key) {
			$output = $stemmer->stem($key['article']);
			$scores = $sentiment->score($output);
			$class = $sentiment->categorise($output);
			$update = new Classifying;
			$update->category = $class;
			$update->article = $key['article'];
			$update->user_validation = "";
			$update->title = "";
			$update->scraping_id = $key['_id'];
			$update->classifier = "new";
			$update->save();
			echo "<pre>".$output."</pre>";
			echo "<blockquote>".$class."</blockquote>";
			echo "<br><hr>";
		}
	}

	public function get_scrap(){
		
		$client = new Client();
		$client->getClient()->setDefaultOption('config/curl/'.CURLOPT_TIMEOUT, 60000);
		$crawled = "news.liputan6.com";
		$title = "article.hentry > header.entry-header > h1";
		$article = "article.hentry > div.entry-content > div.text-detail > p";

		$geturl = DB::collection('crawling')->where('refurl',$crawled)->get();
		
		foreach ($geturl as $key) {
			$url = $key['url'];

			$crawler = $client->request('GET',$url);

			$status_code = $client->getResponse()->getStatus();
			if($status_code==200){
				$crawler->filter($article)->each(function ($node){
					$yew = new Scraping;

					$yew->article = $node->text();
					$yew->save();
				});
			}else{
				echo "we FUCKING LOST DUDE !";
			}

			echo "<hr>";
		}
	}

	public function get_crawl(){
		$crawl = new Crawling;

		$crawl->url = "http://politik.kompasiana.com/2015/03/27/inilah-trik2-untuk-membungkam-ahok-733108.html";
		$crawl->refurl = "politik.kompasiana.com";
		$crawl->code = "200";
		$crawl->save();
	}

	public function get_lihat(){
		$getdata = DB::collection('datadom_temp')->orderBy('no','asc')->simplePaginate(50);

		return View::make('test.testlihat',compact('getdata'));
	}

}
