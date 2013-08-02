<!-- Home -->
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
?>
<div class="row">
    <div class="twelve home-slider">
        <div class="slider">
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

                   <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).</p>
                </div>
                <div id="htmlcaption2" style="display: none;">
                   <h2>Open Data Charter and Global Open Data Initiative Launched 2</h2>
                   <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>

                   <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).</p>
                </div>
                <div id="htmlcaption3" style="display: none;">
                   <h2>Open Data Charter and Global Open Data Initiative Launched 3</h2>
                   <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>

                   <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).</p>
                </div>
                <div id="htmlcaption4" style="display: none;">
                   <h2>Open Data Charter and Global Open Data Initiative Launched 4</h2>
                   <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>

                   <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).</p>
                </div>
                <div id="htmlcaption5" style="display: none;">
                   <h2>Open Data Charter and Global Open Data Initiative Launched 5</h2>
                   <h3>SUBMITTED BY JACK MAHONEY ON JUN 27, 2013</h3>

                   <p>The global drive to open government data has moved forward in the last month with the significant launches of both an Open Data Charter and the Global Open Data Initiative (GODI).</p>
                </div>
            </div>
        </div>
        <div class="search-home">
            <div class="search-home-con">
                <h2>Search Data</h2>
          	<div class="search-area">
                    <input type="image" class="clander-btn" src="/sites/all/themes/dgph/images/clander-icon.png" name=""> <input type="text" class="clander-search" name="">
                </div>   
                <div id="accordion">
                    <h3>Category</h3>
                    <div>
                        <div class="home-cat"><p>Department of Public Works & Highways</p></div>
                    </div>
                    <h3>Location</h3>
                    <div></div>
                    <h3>FORMAT</h3>
                    <div></div>
                </div>
                <div class='search-button'><input name="search" type="button" value="Search" class="search-button"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="six columns">
        <h2 class="infographics">Featured Infographics</h2>
    </div>
    <div class="six columns">
    	<ul class="social-icon">
        	<li><a href="#"><img src="/sites/all/themes/dgph/images/f-icon.png" alt=""></a></li>
            <li><a href="#"><img src="/sites/all/themes/dgph/images/t-icon.png" alt=""></a></li>
            <li><a href="#"><img src="/sites/all/themes/dgph/images/m-icon.png" alt=""></a></li>
        </ul>
    </div>
    <div class=" twelve  columns infographics-con">
    	<div class="four columns">
            <a href='/infographics'><h1>Data 01.</h1></a>
            <a href='/infographics'><img src="/sites/all/themes/dgph/images/img-1.png" alt=""></a>
        </div>
        <div class="four columns columns-mid">
            <div class="columns-mid-1">
                <a href='/infographics'><h1>Data 02.</h1></a>
                <a href='/infographics'><img src="/sites/all/themes/dgph/images/img-2.png" alt=""></a>
            </div>
        </div>
        <div class="four columns">
            <a href='/infographics'><h1>Data 03.</h1></a>
            <a href='/infographics'><img src="/sites/all/themes/dgph/images/img-3.png" alt=""></a>
        </div>
    </div>
</div>
<div class="row community-row">
        <div class="six columns conntent-area">
    	<div class="activities">
            <h1>Activities</h1>
            <img src="/sites/all/themes/dgph/images/acctivity.png" alt="">
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
    <div class="three columns conntent-area latestdata">
        <h1>Latest Data</h1>
        <?php
            $block = module_invoke('dgph_content', 'block_view', 'dgph_content_latest_datasets');
            print render($block['content']);
        ?>
        <div class="view">
            <a href="/catalogue" style="float:left">View All</a>
            <a href="/catalogue" style="float:right"><img src="/sites/all/themes/dgph/images/view-icon.png" alt=""></a>
        </div>
    </div>
</div>