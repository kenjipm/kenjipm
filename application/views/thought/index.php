<div class="col-12 col-lg-4 col-xl-3">
	<h3 class="text-center">Topics</h3>
	<nav class="list-group list-group-flush">
		<?php
			foreach($thoughts as $thought)
			{
				?>
				<a class="list-group-item list-group-item-action list-group-item-light thought_link" item_id="<?=$thought->id?>"><?=$thought->title?></a>
				<?php
			}
		?>
	</nav>	
</div>
<div class="col-12 col-lg-8 col-xl-9">
	<h3 id="thought_title"></h3>
	<h4><small id="thought_created_date" class="text-white-50"></small></h4>
	<div id="thought_content"></div>
</div>