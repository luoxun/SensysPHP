<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<title>Test Page</title>
    	<?= stylesheet_link_tag() ?>
        <?= javascript_include_tag() ?>
        <script>
			$(document).ready(function(){
				$('select.dropdown').dropdown();
			});
		</script>
    </head>
    <body>