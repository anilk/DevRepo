<div id="wrapper" class="wrapper-inner<?=$is_front?>">

	<div id="header-top">
		<div id="header-top-left">
		<?php if ($page['header_top_left']): print render($page['header_top_left']); endif; ?>
		</div><!-- /#header-top-left -->
		<div id="header-top-right">
		<?php if ($page['language_block'] || $page['welcome_block'] || $page['myaccount_block'] || $page['help_block']): ?>
			<table>
			  <tr>
				<?php if ($page['language_block']): ?><td><?php print render($page['language_block']); ?></td><?php endif; ?>
				<?php if ($page['welcome_block']): ?><td><?php print render($page['welcome_block']); ?></td><?php endif; ?>
				<?php if ($page['myaccount_block']): ?><td><?php print render($page['myaccount_block']); ?></td><?php endif; ?>
				<?php if ($page['help_block']): ?><td><?php print render($page['help_block']); ?></td><?php endif; ?>
			  </tr>
			</table>
		<?php endif; ?>
		</div><!-- /#header-top-right -->		
	</div><!-- /#header-top -->

	<div id="header-whole">
	<div id="header">

		<div id="header-left">
			<div id="logo-area">
				<?php if ($logo): ?>
				  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
					<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
				  </a>
				<?php endif; ?>
			</div><!-- /#logo-area -->
		</div><!-- /#header-left -->

		<div id="header-right">
			<div id="menu-area-one">
				<?php if ($page['main_menu_one']): ?>
				  <?php print render($page['main_menu_one']); ?>
				<?php endif; ?>
			</div><!-- /#menu-area -->
			<div id="menu-area-two">
				<?php if ($page['main_menu_two']): ?>
				  <?php print render($page['main_menu_two']); ?>
				<?php endif; ?>
			</div><!-- /#menu-area -->
		</div><!-- /#header-right -->
		
	</div>
	</div>
	<!-- /#header -->
	<!-- /#header-whole -->

	<div id="maindiv-whole">
	<div id="maindiv">
        
        <?php if ($page['sidebar_first']): ?>
        <div id="leftcontent">
		<?php print render($page['sidebar_first']); ?>
		</div>
        <?php endif; ?>
         
			<div id="midcontent">					  
					  <?php if ($page['content_top']): ?>
					  <div id="content-top"><?php print render($page['content_top']); ?></div>
					  <?php endif; ?>

					  <?php print render($title_prefix); ?>
					  <?php if ($title): ?>
						<h1 class="title title<?=arg(1)?>" id="page-title"><?php print $title; ?></h1>
					  <?php endif; ?>
					  <?php print render($title_suffix); ?>
					  <?php if ($tabs): ?>
						<div class="tabs tabsid<?=arg(1)?>">
						  <?php print render($tabs); ?>
						</div>
					  <?php endif; ?>

					  <?php print render($tabs2); ?>
					  <?php print $messages; ?>                   
					  <div class="maincontent">
						<?php print render($page['content']); ?>
					  </div>
				      <?php print render($page['content_bottom']); ?>
			</div><!-- end midcontent -->  

        <?php if ($page['sidebar_second']): ?>
        <div id="rightcontent">
		<?php print render($page['sidebar_second']); ?>
		</div>
        <?php endif; ?>
        
    </div> <!-- end maindiv -->
	</div> <!-- end maindiv-whole -->


	<?php if ($page['footer_links_one'] || $page['footer_links_two'] || $page['footer_links_three'] || $page['footer_links_four'] || $page['footer_links_five']): ?>
	<div id="footer-menus-area-whole">
		<div id="footer-menus-area">
		<table>
			<tr>
			<?php if ($page['footer_links_one']): ?><td><?php print render($page['footer_links_one']); ?></td><?php endif; ?>
			<?php if ($page['footer_links_two']): ?><td><?php print render($page['footer_links_two']); ?></td><?php endif; ?>
			<?php if ($page['footer_links_three']): ?><td><?php print render($page['footer_links_three']); ?></td><?php endif; ?>
			<?php if ($page['footer_links_four']): ?><td><?php print render($page['footer_links_four']); ?></td><?php endif; ?>
			<?php if ($page['footer_links_five']): ?><td><?php print render($page['footer_links_five']); ?></td><?php endif; ?>
			</tr>
		</table>
		</div>
	</div>
	<?php endif; ?>


	<?php if ($page['copy_right_area']): ?>
		<div id="copyright-whole">
			<div id="copyright">
			<?php print render($page['copy_right_area']); ?>
			</div>
		</div>
	<?php endif; ?>	

</div>
<!-- /#wrapper -->
