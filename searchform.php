<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
				<div>
					<input type="text" placeholder="কীওয়ার্ড লেখুন" value="<?php echo get_search_query();?>" name="s" id="s">
					<input type="submit" id="searchsubmit" value="খুঁজুন">
				</div>
			</form>