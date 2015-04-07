<?php

set_time_limit(10000); 

include_once(app_path().'/library/Crawl/PHPCrawler.class.php'); 

/**
* 
*/
class KelasCrawling extends PHPCrawler
{
	
	function handleDocumentInfo(PHPCrawlerDocumentInfo $DocInfo)  
  	{ 
	    // Just detect linebreak for output ("\n" in CLI-mode, otherwise "<br>"). 
	    if (PHP_SAPI == "cli") $lb = "\n"; 
	    else $lb = "<br />"; 

	    $file = "app/gudang/".date("Y_m_d").".csv";
	    $konten = fopen($file,'a');
	    if($DocInfo->http_status_code != 200){

        }else{

        	$host = parse_url($DocInfo->url,PHP_URL_HOST);
        	fputcsv($konten, array($DocInfo->url,$host));

        	echo "<tr>";
	        echo "<td><a href=".$DocInfo->url.">".$DocInfo->url."</a></td>";
	        echo "<td>".$DocInfo->referer_url."</td>";
	        echo "<td>".$DocInfo->http_status_code."</td>";
	        echo "</tr>";
		    ob_flush();
		    flush(); 
        }
  	}
 } 

