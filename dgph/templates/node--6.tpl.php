<!-- Community -->
<?php
    // load latest news
    $query = db_select('node', 'n')
            ->fields('n', array('nid'))
            ->condition('n.type', 'blog')
            ->condition('n.status', 1)
            ->orderBy('n.created', 'desc')
            ->range(0, 3);
    $nids = $query->execute()->fetchCol();
    $latestNews = node_load_multiple($nids);
    // load the latest forums
    $terms = advanced_forum_forum_load(0);
    $forums = array();
    foreach($terms->forums as $item) {
        if (1==$item->depth) {
            $forums[$item->tid] = $item;
        }
    }
    krsort($forums, SORT_NUMERIC);
?>
<div class="row">
    <div class=" six columns visualizations-left">
        <h1>Community</h1>
    </div>
    <div class="six columns">
        <ul class="social-icon">
            <li><a href="#"><img alt="" src="/sites/all/themes/dgph/images/icon-12.png"></a></li>
            <li><a href="#"><img alt="" src="/sites/all/themes/dgph/images/icon-13.png"></a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="twelve slider">
    <div id="sliderFrame">
        <div id="ribbon"></div>
        <div id="slider">
            <img src="/sites/all/themes/dgph/images/image-slider-1-1.jpg" alt="#htmlcaption1" />
            <img src="/sites/all/themes/dgph/images/image-slider-2-1.jpg" alt="#htmlcaption2" />
            <img src="/sites/all/themes/dgph/images/image-slider-3-1.jpg" alt="#htmlcaption3" />
            <img src="/sites/all/themes/dgph/images/image-slider-4-1.jpg" alt="#htmlcaption4" />
            <img src="/sites/all/themes/dgph/images/image-slider-5-1.jpg" alt="#htmlcaption5" />
        </div>
        <div id="htmlcaption1" style="display: none;">
            <h2>Open Data Charter and Global Open Data Initiative Launched</h2>
                <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
               <p>The global drive to open government data has moved forward in the last month with the significant launches of both anÂ Open Data CharterÂ and theÂ GlobalÂ Open Data InitiativeÂ (GODI). Â </p>
            </div>
            <div id="htmlcaption2" style="display: none;">
                <h2>Open Data Charter and Global Open Data Initiative Launched 2</h2>
                <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                <p>The global drive to open government data has moved forward in the last month with the significant launches of both anÂ Open Data CharterÂ and theÂ GlobalÂ Open Data InitiativeÂ (GODI). Â </p>
            </div>
            <div id="htmlcaption3" style="display: none;">
                <h2>Open Data Charter and Global Open Data Initiative Launched 3</h2>
                <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                <p>The global drive to open government data has moved forward in the last month with the significant launches of both anÂ Open Data CharterÂ and theÂ GlobalÂ Open Data InitiativeÂ (GODI). Â </p>
            </div>
            <div id="htmlcaption4" style="display: none;">
                <h2>Open Data Charter and Global Open Data Initiative Launched 4</h2>
                <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                <p>The global drive to open government data has moved forward in the last month with the significant launches of both anÂ Open Data CharterÂ and theÂ GlobalÂ Open Data InitiativeÂ (GODI). Â </p>
            </div>
            <div id="htmlcaption5" style="display: none;">
                <h2>Open Data Charter and Global Open Data Initiative Launched 5</h2>
                <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                <p>The global drive to open government data has moved forward in the last month with the significant launches of both anÂ Open Data CharterÂ and theÂ GlobalÂ Open Data InitiativeÂ (GODI). Â </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="twelve act-Users">
        <h1>Most Active Users</h1>
        <ul>
            <li>
            	<a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-1.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-2.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-3.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-4.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
        	<a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-5.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-6.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-7.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-8.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-4.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-9.png" alt="">
                    <p>John doe</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/sites/all/themes/dgph/images/pic-10.png" alt="">
                    <p>Jane doe</p>
                </a>
            </li>
        </ul>
    </div>
</div> 
<div class="row community-row">
    <div class="six columns conntent-area">
        <div class="activities">
            <h1>Testimonials</h1>
            <img src="/sites/all/themes/dgph/images/viceo-1.png" alt="">
            <h2>Duis autem vel eum iriure dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. 
Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel </p>
            <div class="view">
                <a href="#" style="float:left;">View All</a>
                <a href="#" style="float:right;  "><img src="/sites/all/themes/dgph/images/view-icon.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="three columns conntent-area latestnews">
        <h1>Latest News</h1>
        <?php
            $idx = 0;
            while(!empty($latestNews) && $idx<3) {
                $entry = array_shift($latestNews);
                $title = $entry->title;
                $text = $entry->body['und'][0]['value'];
                if (strlen($text)>75) {
                    $text = substr($text, 0, 75) . '...';
                }
                $dt = date('M j, Y', $entry->created);
                $last = (($idx>0) && (0==(($idx+1)%3))) ? ' post-last' : '';
        ?>
        <div class="post<?php echo $last ?>">
            <h2><?php echo $title ?></h2>
            <h3><?php echo $dt.'<br>'.$entry->name ?></h3>
            <?php echo  $text ?>
        </div>
        <?php 
                $idx++;
            } 
        ?>
        <div class="view">
            <a href="/blog/latest" style="float:left;">View All</a>
            <a href="/blog/latest" style="float:right;  "><img src="/sites/all/themes/dgph/images/view-icon.png" alt=""></a>
        </div>
    </div>
    <div class="three columns conntent-area  forums">
        <h1>Forums</h1>
        <?php
            $f1 = array_shift($forums);
            $f2 = array_shift($forums);
        ?>
        <div class="post">
            <h2><?php echo $f1->name ?></h2>
            <p><?php echo $f1->description ?></p>
        </div>
        <div class="post post-last">
            <h2><?php echo $f2->name ?></h2>
            <p><?php echo $f2->description ?></p>
        </div>
        <div class="view">
            <a href="/forum/latest" style="float:left;">View All</a>
            <a href="#" style="float:right;  "><img src="/sites/all/themes/dgph/images/view-icon.png" alt=""></a>
        </div>
    </div>
</div>