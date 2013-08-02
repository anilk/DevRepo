<!-- Apps -->
<?php
    // load featured apps
    $featuredApps = array();
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'application')
                    ->propertyCondition('status', 1)
                    ->fieldCondition('field_featured', 'value', 1)
                    ->range(0, 2)
                    ->propertyOrderBy('created', 'desc');
    $res = $query->execute();
    if (isset($res['node'])) {
        $nids = array_keys($res['node']);
        $featuredApps = entity_load('node', $nids);
    }
    // load top rated apps
    $topRatedApps = array();
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'application')
                    ->propertyCondition('status', 1)
                    ->range(0, 4)
                    ->fieldOrderBy('field_rating', 'rating', 'desc');
    $res = $query->execute();
    if (isset($res['node'])) {
        $nids = array_keys($res['node']);
        $topRatedApps = entity_load('node', $nids);
    }
    // load recent apps
    $recentApps = array();
    $query = new EntityFieldQuery();
    $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'application')
                    ->propertyCondition('status', 1)
                    ->range(0, 12)
                    ->propertyOrderBy('created', 'desc');
    $res = $query->execute();
    if (isset($res['node'])) {
        $nids = array_keys($res['node']);
        $recentApps = entity_load('node', $nids);
    }
?>
<div class="row applications-con">
    <h2>Applications</h2>
    <div class=" six columns apptitle">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio. dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait null</p>
    </div>
    <div class="five columns app-con">
        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Dvel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio. Odignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
        <a href="#" class="appsubmit">Submit app</a>
    </div>
    <div class="clear"></div>
    <div class=" six columns  conntent-area  featured">
     	<h1>Featured</h1>
    </div>
    <div class=" six columns">
        <ul class="social-icon">
            <li><a href="#"><img src="/sites/all/themes/dgph/images/f-icon.png" alt=""></a></li>
            <li><a href="#"><img src="/sites/all/themes/dgph/images/t-icon.png" alt=""></a></li>
            <li><a href="#"><img src="/sites/all/themes/dgph/images/m-icon.png" alt=""></a></li>
        </ul>
    </div>
    <div class="featured-con">
        <?php
            for($i=0; $i<2; $i++) {
                if (!empty($featuredApps)) {
                    // show featured app
                    $app = array_shift($featuredApps);
                    $title = $app->title;
                    $text = $app->body['und'][0]['value'];
                    if (strlen($text)>100) {
                        $text = substr($text, 0, 100). ' ...';
                    }
                    $catId = $app->field_category['und'][0]['value'];
                    $field = field_info_field('field_category');
                    $catName = $field['settings']['allowed_values'][$catId];
                    $rating = field_view_field('node', $app, 'field_rating');
                    $img = field_view_field('node', $app, 'field_screen_shot');
        ?>
        <div class="six columns featured-area">
            <div class="img-con"><?php print render($img) ?></div>
            <h1><?php echo $title ?></h1>
            <span><?php echo $catName ?></span> 
            <?php print render($rating) ?>
            <p><?php echo $text ?></p>
        </div>
        <?php
                }
            }
        ?>
     </div>
</div>
<div class="row">
    <div class="six columns conntent-area  ">
        <div class="news-video">
            <h1>Top rated</h1>
            <?php
                while(!empty($topRatedApps)) {
                    $app = array_shift($topRatedApps);
                    $title = $app->title;
                    $text = $app->body['und'][0]['value'];
                    if (strlen($text)>100) {
                        $text = substr($text, 0, 100). ' ...';
                    }
                    $catId = $app->field_category['und'][0]['value'];
                    $field = field_info_field('field_category');
                    $catName = $field['settings']['allowed_values'][$catId];
                    $rating = field_view_field('node', $app, 'field_rating');
                    $img = field_view_field('node', $app, 'field_screen_shot');
                    $areaStyle = 'featured-area';
                    if (empty($topRatedApps)) {
                        $areaStyle = 'featured-area featured-area-last';
                    }
            ?>
            <div class="<?php echo $areaStyle ?>">
                <div class="img-con"><?php print render($img) ?></div>
        	<h1><?php echo $title ?></h1>
                <span><?php echo $catName ?></span> 
                <?php print render($rating) ?>
                <p><?php echo $text ?></p>
            </div>
            <?php
                }
            ?>
            <div class="view">
                <a style="float:left;" href="/apps/list">More</a>
                <a style="float:right;  " href="/apps/list"><img alt="" src="/sites/all/themes/dgph/images/view-icon.png"></a>
            </div>
        </div>
    </div>
    <div class="six columns conntent-area latestnews">
        <h1>New</h1>
        <div class="evenodd-con">
            <div class="evenodd-left">
                <?php
                    $appsLeft = 6;
                    while(!empty($recentApps) && $appsLeft>0) {
                        $app = array_shift($recentApps);
                        $title = $app->title;
                        $catId = $app->field_category['und'][0]['value'];
                        $field = field_info_field('field_category');
                        $catName = $field['settings']['allowed_values'][$catId];
                        $styleClass = (0==$appsLeft%2) ? 'even' : 'odd';
                ?>
                <div class="<?php echo $styleClass ?>">
                    <div class="img-con"><img src="/sites/all/themes/dgph/images/new-app-icon-1.png" alt=""></div>
                    <h2><?php echo $title ?></h2>
                    <span><?php echo $catName ?></span>
                </div>
                <?php
                        $appsLeft--;
                    }
                ?>
            </div>
            <div class="evenodd-left">
                <?php
                    $appsLeft = 6;
                    while(!empty($recentApps) && $appsLeft>0) {
                        $app = array_shift($recentApps);
                        $title = $app->title;
                        $catId = $app->field_category['und'][0]['value'];
                        $field = field_info_field('field_category');
                        $catName = $field['settings']['allowed_values'][$catId];
                        $styleClass = (0==$appsLeft%2) ? 'odd' : 'even';
                ?>
                <div class="<?php echo $styleClass ?>">
                    <div class="img-con"><img src="/sites/all/themes/dgph/images/new-app-icon-2.png" alt=""></div>
                    <h2><?php echo $title ?></h2>
                    <span><?php echo $catName ?></span>
                </div>
                <?php
                        $appsLeft--;
                    }
                ?>
            </div>
        </div>
    </div>
</div>
