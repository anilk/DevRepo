<?php

/**
 * @file
 * Override of the default maintenance page.
 *
 * This is an override of the default maintenance page. Used for Garland and
 * Minnelli, this file should not be moved or modified since the installation
 * and update pages depend on this file.
 *
 * This mirrors closely page.tpl.php for Garland in order to share the same
 * styles.
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <title><?php print $head_title ?></title>
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
  </head>
  <body class="<?php print $classes ?>">

<div id="wrapper" class="wrapper-inner<?=$is_front?>">

	<div id="header-top">
		<div id="header-top-left">
		<?php if ($page['header_top_left']): print render($page['header_top_left']); endif; ?>
		</div><!-- /#header-top-left -->
		<div id="header-top-right">

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

			</div><!-- /#menu-area -->
			<div id="menu-area-two">

			</div><!-- /#menu-area -->
		</div><!-- /#header-right -->
		
	</div>
	</div>
	<!-- /#header -->
	<!-- /#header-whole -->

	<div id="maindiv-whole">
	<div id="maindiv">
        
         
			<div id="midcontent">					  

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
	
			</div><!-- end midcontent -->  

       
    </div> <!-- end maindiv -->
	</div> <!-- end maindiv-whole -->


	<?php if ($page['footer_links_one'] || $page['footer_links_two'] || $page['footer_links_three'] || $page['footer_links_four'] || $page['footer_links_five']): ?>
	<div id="footer-menus-area-whole">
		<div id="footer-menus-area">

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

  </body>
</html>
