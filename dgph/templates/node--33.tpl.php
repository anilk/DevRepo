<!-- Latest News -->
<?php
    $query = db_select('node', 'n')
            ->fields('n', array('nid'))
            ->condition('n.type', 'blog')
            ->condition('n.status', 1)
            ->orderBy('n.created', 'desc');
    $nids = $query->execute()->fetchCol();
    $news = node_load_multiple($nids);
?>
<div class="row news-con">
    <div class=" nine columns conntent-area">
        <div class="news">
            <h2>NEWS</h2>
            <div id="sliderFrame">
                <div id="ribbon"></div>
                <div id="slider">
                    <img src="/sites/all/themes/dgph/images/image-slider-1.jpg" alt="#htmlcaption1" />
                    <img src="/sites/all/themes/dgph/images/image-slider-2.jpg" alt="#htmlcaption2" />
                    <img src="/sites/all/themes/dgph/images/image-slider-3.jpg" alt="#htmlcaption3" />
                    <img src="/sites/all/themes/dgph/images/image-slider-4.jpg" alt="#htmlcaption4" />
                    <img src="/sites/all/themes/dgph/images/image-slider-5.jpg" alt="#htmlcaption5" />
                </div>
                <div id="htmlcaption1" style="display: none;">
                    <h2>Open Data Charter and Global Open Data Initiative Launched</h2>
                    <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                    <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).  </p>
                </div>
                <div id="htmlcaption2" style="display: none;">
                    <h2>Open Data Charter and Global Open Data Initiative Launched 2</h2>
                    <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                   <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).  </p>
                </div>
                <div id="htmlcaption3" style="display: none;">
                    <h2>Open Data Charter and Global Open Data Initiative Launched 3</h2>
                    <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                   <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).  </p>
                </div>
                <div id="htmlcaption4" style="display: none;">
                    <h2>Open Data Charter and Global Open Data Initiative Launched 4</h2>
                    <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                   <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).  </p>
                </div>
                <div id="htmlcaption5" style="display: none;">
                    <h2>Open Data Charter and Global Open Data Initiative Launched 5</h2>
                    <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>
                    <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).  </p>
                </div>
            </div>
       </div>
    </div>
    <div class="three columns conntent-area headlines">
        <h1>Headlines</h1>
        <?php 
            $idx = 0;
            foreach($news as $entry) {
                if ($idx<5) {
                    $title = $entry->title;
                    $dt = date('M j, Y', $entry->created);
        ?>
            <div class="post">
                <h2><?php echo $title ?></h2>
                <h3><?php echo $dt.' / '.$entry->name ?></h3>
            </div>
        <?php 
                }
                $idx++;
            } 
        ?>
    </div>
</div>
<div class="row">
    <div class="six columns conntent-area">
        <div class="news-video">
            <?php
                $latestNews = array_shift(array_values($news));
                $title = $latestNews->title;
                $text = $latestNews->body['und'][0]['value'];
            ?>
            <h1>News 01.</h1>
            <img src="/sites/all/themes/dgph/images/viceo-1.png" alt="">
            <h2><?php echo $title ?></h2>
            <?php echo $text ?>
            <div class="view">
                <a href="#" style="float:left;">More</a>
                <a href="#" style="float:right;  "><img src="/sites/all/themes/dgph/images/view-icon.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="six columns conntent-area latestnews-header">
        <h1>Latest News</h1>
    </div>
    <div class='three columns conntent-area latestnews'>
    <?php 
        $idx = 0;
        foreach($news as $entry) { 
            if (($idx>0) && (0==($idx%3))) { 
                echo "</div><div class='three columns conntent-area latestnews'>"; 
            }
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
    </div>
    <div class="six columns news-view">
        <div class="view">
            <a href="/datagov/blog" style="float:left;">View All</a>
            <a href="#" style="float:right;  "><img src="/sites/all/themes/dgph/images/view-icon.png" alt=""></a>
        </div>
    </div>
</div>