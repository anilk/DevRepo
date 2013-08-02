<?php
if($id == 1 && $page == 0):
	// Blog Slide Show
	$blog_slide = block_load('views', 'slide_show_fade-block');
	$blog_slide = drupal_render(_block_get_renderable_array(_block_render_blocks(array($blog_slide))));
	// Blog Slide Show
	$blog_headlines = block_load('views', 'blog_headlines-block');
	$blog_headlines = drupal_render(_block_get_renderable_array(_block_render_blocks(array($blog_headlines))));
?>
<div class="row blog-header">
	<div class="nine columns">
		<?php print $blog_slide; ?>
	</div><!-- Slide Show -->
	<div class="three columns">
		<?php print $blog_headlines; ?>
	</div><!-- Headlines -->
</div>

<div class="row all-news-heading">
	<h2 class="all-news-title"><?php print t('All News Articles'); ?></h2>
</div>

<?php endif; ?>

<?php if ($page == 0): ?>

<div class="three bloglisting">
<?php 
if(node_access('update',$node)) {
	print '<div class="node-edit">' . l('Edit', 'node/'.$node->nid.'/edit', $options = array('query'=>array('destination'=>$_GET['q']))) . '</div>';
}
$submitted = '';
if(sizeof($node->field_blog_submitted_by)){
	$submitted = $node->field_blog_submitted_by['und'][0]['value'];
}

$teaser = '';
if(sizeof($node->body)){
	$teaser = render(field_view_field('node', $node, 'body', array(
	  'label'=>'hidden', 
	  'type' => 'text_summary_or_trimmed',
	  'settings'=>array('trim_length' => 100),
	)));
}

?>
	<div class="blog-heading"><a href="<?php print $node_url; ?>"><?php print '<h2 class="title">'.$node->title.'</h2>'; ?></a></div>
	<div class="blog-submitted"><?php print date('M d, Y', $node->created); print ($submitted) ? '<br />'.$submitted: ''; ?></div>
	<?php if($teaser): ?>
		<div class="blog-teaser"><?php print $teaser; ?></div>
		<div class="bottom-border"></div>
	<?php  endif; ?>
</div><!-- Headlines -->


<?php else: ?>

<?php
// Blog Slide Show
$blog_headlines = block_load('views', 'blog_headlines-block');
$blog_headlines = drupal_render(_block_get_renderable_array(_block_render_blocks(array($blog_headlines))));
?>

<div class="row blog-detailpage">
	<div class="nine columns container">
		
		<div class="description">
			<div class="blog-title"><h3><?php print $node->title; ?></h3></div>
			<?php
			  // We hide the comments and links now so that we can render them later.
			  hide($content['comments']);
			  hide($content['links']);
			  print render($content);
			?>
		</div>

		<div class="clearfix">
			<?php if (!empty($content['links'])): ?>
			<div class="links linksdiv"><?php print render($content['links']); ?></div>
			<?php endif; ?>
			<?php print render($content['comments']); ?>
		</div>

	</div><!-- Slide Show -->
	<div class="three columns">
		<?php print $blog_headlines; ?>
	</div><!-- Headlines -->
</div>


<?php endif; ?>

