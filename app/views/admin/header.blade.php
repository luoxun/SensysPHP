<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SensysPHP | Crawling Web App Using PHP</title>
	<?= stylesheet_link_tag() ?>
    <?= javascript_include_tag() ?>
    <script>
    	$(document).ready(function(){
    		$('.ui.sidebar').sidebar('attach events','#showsidebar');
        $('.ui.dropdown').dropdown({
          on: 'hover'  
        });
        $('select.dropdown').dropdown();
        $('.ui.fullscrean.modal').modal('attach events','#upload','show');
    	});
    </script>
</head>
<body>

    <div class="ui top attached menu"><!-- Menu Atas -->
      <a class="item" id="showsidebar">
        <i class="sidebar icon"></i>
        Menu
      </a>
      <div class="right menu" id="pka">
        <div class="ui pointing dropdown link item">
            <i class="user icon"></i>
            <span class="text">Welcome, Master !</span>
            <div class="menu">
                <a href={{ URL::to('/master/profile'); }} class="item">
                    <i class="users icon"></i>
                    My Profile
                </a>
                <a href={{ URL::to('/master/logout'); }} class="item">
                    <i class="power icon"></i>
                    Log Out
                </a>
            </div>
        </div>
      </div>
    </div>

    <div class="ui bottom attached segment"><!-- Tag Buka Sidebar -->
      <div class="ui vertical inverted sidebar menu left">
        <a href={{ URL::to('/master'); }} class="item">
          <i class="home icon"></i>
          Home
        </a>
        <a href={{ URL::to('/master/wizard-crawl'); }} class="item">
          <i class="small share icon"></i>
          Basic Mode
        </a>
        <div class="item">
          <div class="ui small inverted header">
            Advanced
          </div>
          <div class="menu">
            <a class="item" href={{ URL::to('/master/crawling'); }}>
              Crawling
            </a>
          </div>
          <div class="menu">
            <a class="item" href={{ URL::to('/master/scraping'); }}>
              Scraping
            </a>
          </div>
          <div class="menu">
            <a class="item" href={{ URL::to('/master/classifying'); }}>
              Classifying
            </a>
          </div>
        </div>
        <div class="item">
          <div class="ui small inverted header">
            Report
          </div>
          <div class="menu">
            <a class="item" href={{ URL::to('/master/acc-report'); }}>
              Accuraccy Report
            </a>
          </div>
          <div class="menu">
            <a class="item" href={{ URL::to('/master/det-report'); }}>
              Detail Report
            </a>
          </div>
        </div>
        <a href={{ URL::to('/master/setting'); }} class="item">
          <i class="small settings icon"></i>
          Setting
        </a>
        <div class="item">
          <div class="ui small inverted header">
           Other
          </div>
          <div class="menu">
            <a class="item" href={{ URL::to('/master/api'); }}>
              API
            </a>
          </div>
          <div class="menu">
            <a class="item" href={{ URL::to('/master/about'); }}>
              About
            </a>
          </div>
        </div>
      </div>
      
