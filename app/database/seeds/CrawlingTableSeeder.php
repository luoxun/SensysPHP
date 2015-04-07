<?php

class CrawlingTableSeeder extends Seeder {

	public function run()
	{

		DB::table('crawling')->delete();
		Crawling::create(array(
			'url'=>'http://politik.kompasiana.com/2015/03/27/inilah-trik2-untuk-membungkam-ahok-733108.html',
			'refurl'=>'politik.kompasiana.com',
			'code'=>'200',
		));
	}

}