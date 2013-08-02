<!-- Latest Forums -->
<?php
    // load the latest forums
    $terms = advanced_forum_forum_load(0);
    $forums = array();
    $containers = array();
    foreach($terms->forums as $item) {
        if (1==$item->depth) {
            $forums[$item->tid] = $item;
        }
        else if (0==$item->depth) {
            $containers[$item->name] = $item;
        }
    }
    sort($containers, SORT_NUMERIC);
    krsort($forums, SORT_NUMERIC);
?>



<div class="row news-con">
    <div class="twelve conntent-area">
       <div class="news">
           <h2>Forums</h2>
       </div>
    </div>
    <div class="three columns">
    <br />
    <br />
    <br />
    <div class="search-con">
        <h3>Search by</h3>
    	<div class="search-area">
            <input name="" type="image" src="/sites/all/themes/dgph/images/clander-icon.png" class="clander-btn"> <input name="" type="text" class="clander-search">
        </div>
    </div>
    <div id="accordion" class='sidebar-accordion'>
        <h3>Topic</h3>
        <div>
            <p>
                <form class="custom">
                    <?php foreach($containers as $container) { ?>
                    <label for="checkbox1"><input type="checkbox" id="topic_<?php echo $container->tid ?>" style="display: none;"><?php echo $container->name ?> </label>
                    <?php } ?>
                </form>
            </p>
        </div>
        <h3>Hottest Issues</h3>
        <div>
            <div class="hottestIssues-con">
                <h2>Pellentesque habitant morbi tristique senectus</h2>
                <p>July 21, 2013 / GOP Networks Co.</p>
            </div>
            <div class="hottestIssues-con">
         	<h2>Ut wisi enim ad minim veniam, quis nostrud  </h2>
                <p>July 21, 2013 / GOP Networks Co.</p>
            </div>
            <div class="hottestIssues-con">
         	<h2>ssim qui blandit praesent luptatum zzril</h2>
                <p>July 21, 2013 / GOP Networks Co.</p>
            </div>
            <div class="hottestIssues-con hottestIssues-con-last">
         	<h2>sum Typi non habent claritatem insitam est </h2>
                <p>July 21, 2013 / GOP Networks Co.</p>
            </div>
                <a href="#" class="view-all">VIEW ALL</a>
         </div>
        </div>
    </div>
    <div class="six column latestForums">
        <h1>Latest Forums</h1>
    </div>
    <div class=" three column">
         <ul class="social-icon">
                <li class="ask"><a href="#">Ask Questions</a></li>
            <li class="line">&nbsp;</li>
            <li><a href="#"><img src="/sites/all/themes/dgph/images/icon-12.png" alt=""></a></li>
            <li><a href="#"><img src="/sites/all/themes/dgph/images/icon-13.png" alt=""></a></li>

        </ul>
    </div>
    <div class="nine columns">
        <?php
            $odd = false;
            $count = count($forums);
            $idx = 0;
            foreach($forums as $forum) {
                $tid = $forum->tid;
                $year = 2013;
                $month = "JUN";
                $day = 24;
                $postsCount = $forum->num_posts;
                $name = $forum->name;
                $text = $forum->description;
                $last = ($idx == $count - 1);
                $postClass = 'post-con';
                if ($idx==$count-1) {
                    // last post
                    $postClass .= ' post-con-last';
                }
                else if ($odd) {
                    // odd post
                    $postClass .= ' post-con-old';
                }
        ?>
                <div class="<?php echo $postClass ?>">
                    <a href="#" class="comments-count"><?php echo $postsCount ?></a>
                    <div class="date-con">
                        <p><?php echo $month ?></p>
                        <h5><?php echo $day ?></h5>
                        <p><?php echo $year ?></p>
                    </div>
                    <h1><?php echo $name ?></h1>
                    <p><?php echo $text ?></p>
                    <a href="/forum/<?php echo $tid ?>" class="view-comm">View</a>
                </div>
        <?php
                $odd = !$odd;
                $idx++;
            }
        ?>
        <div class="view">
            <a style="float:left;" href="/forum">View All</a>
            <a style="float:right;" href="/forum"><img alt="" src="/sites/all/themes/dgph/images/view-icon.png"></a>
        </div>
    </div>
 </div>