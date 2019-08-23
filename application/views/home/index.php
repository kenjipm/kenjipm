<div class="col-12 col-lg-4 col-xl-3">
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
<div class="col-12 col-lg-8 col-xl-9">
	<div id="guitar_tab_control" class="sticky-top">
		<div class="input-group justify-content-end">
			<div class="input-group-prepend">
				<button type="button" class="btn btn-outline-secondary" id="btn_autoscroll_stop"><i class="fa fa-stop"></i></button>
				<button type="button" class="btn btn-outline-secondary" id="btn_autoscroll_play"><i class="fa fa-play"></i></button>
			</div>
			<input type="number" class="form-control col-3" id="scroll_duration" value="0"/>

			<div class="input-group-append">
				<span class="input-group-text">second</span>
				<span class="input-group-text" id="autoscroll_help" data-toggle="tooltip" title="This is a feature to scroll this page automatically as you play the tabs. Enter the duration (in second) for the page to scroll until the bottom of the page reach the middle of your screen. So, it should stop scrolling before the timer stops."><i class="fa fa-question-circle"></i></span>
			</div>			 
		</div>
	</div>
	<h3 id="guitar_tab_title"></h3>
	<div id="guitar_tab_video_embed_html"></div>
	<pre id="guitar_tab_content"></pre>
</div>