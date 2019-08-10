<div class="col-12 col-md-4 col-xl-3">
	<h3 class="text-center">Tabs</h3>
	<nav class="list-group list-group-flush">
		<?php
			foreach($guitar_tabs as $guitar_tab)
			{
				?>
				<a class="list-group-item list-group-item-action list-group-item-light guitar_tab_link" item_id="<?=$guitar_tab->id?>"><?=$guitar_tab->title?></a>
				<?php
			}
		?>
	</nav>	
</div>
<div class="col-12 col-md-8 col-xl-9">
	<h3 id="guitar_tab_title"></h3>
	<div id="guitar_tab_content" class="text-nowrap text-monospace"></div>
	<div id="guitar_tab_video_embed_html"></div>
</div>