<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<title>Test Page</title>
    	<?= stylesheet_link_tag() ?>
        <?= javascript_include_tag() ?>
    </head>
    <body>
		<?php
			$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);

			$trans = $environment->getTranslator();
		?>

		<?php if ($paginator->getLastPage() > 1): ?>
			<div class="ui pagination menu">
				<div class="item">
					<?php
						echo $presenter->getPrevious($trans->trans('pagination.previous'));
					?>
				</div>
				<div class="item">
					<?php
						echo $presenter->getNext($trans->trans('pagination.next'));
					?>
				</div>
			</div>
		<?php endif; ?>
    </body>
</html>
