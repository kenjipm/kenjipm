<div class="col-12 col-lg-4 col-xl-3">
	<h3 class="text-center list-group-title-action" data-toggle="collapse" href="#guitar_tabs_list">My Tabs</h3>
	<nav class="list-group list-group-flush collapse show" id="guitar_tabs_list">
		<?php
			foreach($guitar_tabs as $guitar_tab)
			{
				?>
				<a class="list-group-item list-group-item-action list-group-item-light guitar_tab_link" item_id="<?=$guitar_tab->id?>"><?=$guitar_tab->title?></a>
				<?php
			}
		?>
	</nav>
	<br/>
	<?php 
		if (count($user_posted_guitar_tabs) > 0)
		{
			?>
			<h3 class="text-center list-group-title-action" data-toggle="collapse" href="#user_posted_guitar_tabs_list">User Posted</h3>
			<nav class="list-group list-group-flush collapse" id="user_posted_guitar_tabs_list">
				<?php
					foreach($user_posted_guitar_tabs as $guitar_tab)
					{
						?>
						<a class="list-group-item list-group-item-action list-group-item-light guitar_tab_link" item_id="<?=$guitar_tab->id?>"><?=$guitar_tab->title?></a>
						<?php
					}
				?>
			</nav>	
			<?php
		}
	?>
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
	<h3 id="guitar_tab_title">Write your own tab / chord below!</h3>
	<div id="guitar_tab_video_embed_html"></div>
	<pre id="guitar_tab_content" contenteditable="true"></pre>
	<input type="button" id="btn_publish_tab_modal" value="Publish" class="btn btn-primary" data-toggle="modal" data-target="#publish_tab_modal"/>
</div>
<div class="modal" tabindex="-1" role="dialog" id="publish_tab_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Publish Tab / Chord</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="new_guitar_tab_title">Title</label>
						<input type="text" id="new_guitar_tab_title" class="form-control"/>
					</div>
					<div class="form-group">
						<label for="new_guitar_tab_duration">Scroll Duration</label>
						<input type="number" id="new_guitar_tab_duration" class="form-control col-3" value="0"/>
					</div>
					<div class="form-group">
						<label for="captcha_word">Captcha</label>
						<div class="mb-1"><?=$captcha['image']?></div>
						<input type="text" id="captcha_word" class="form-control col-6"/>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<small class="form-text text-muted" id="guitar_tab_publish_status"></small>
				<input type="button" id="btn_publish_tab" value="Publish" class="btn btn-primary"/>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>