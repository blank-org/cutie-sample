<?php
	require_once 'Fragment/Item.php';
	$SIDEBAR_NAV_GROUP = 'sidebar-nav-group page-list';
?>
<div id='nav-menu'>
	<div id='nav-menu_container'>
		<div class='sidebar-nav-li sidebar-sub'>
			<?php
			$MENU_MAX_ITEM_COUNT = -5;
			group_image($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['root', '']);
			?>
		</div>
	</div>
</div>
