<!-- Data Requests -->
<?php
    // load latest data requests
    $query = db_select('node', 'n')
            ->fields('n', array('nid'))
            ->condition('n.type', 'data_request')
            ->condition('n.status', 1)
            ->orderBy('n.created', 'desc')
            ->range(0, 12);
    $nids = $query->execute()->fetchCol();
    $latestRequests = node_load_multiple($nids);
?>
 <div class="row news-con">
  	 <div class="six columns subpage-title">
     	<h1>Data Requests</h1>
     </div>
     <div class="six columns data-social">
     	<ul class="social-icon">
       		 <li><a class='gridicon' href="javascript:setGridView(1, 'latestdata')" style='opacity: 1'><img alt="" src="/sites/all/themes/dgph/images/icon-12.png"></a></li>
        	<li><a class='listicon' href="javascript:setGridView(0, 'latestdata')" style='opacity: 0.1'><img alt="" src="/sites/all/themes/dgph/images/icon-13.png"></a></li>
        	<li class="line">&nbsp;</li>
        	<li><a href="#"><img alt="" src="/sites/all/themes/dgph/images/f-icon.png"></a></li>
            <li><a href="#"><img alt="" src="/sites/all/themes/dgph/images/t-icon.png"></a></li>
            <li><a href="#"><img alt="" src="/sites/all/themes/dgph/images/m-icon.png"></a></li>
            <li><a href="#"><img alt="" src="/sites/all/themes/dgph/images/icon-11.png"></a></li>
        </ul>
     </div>
     <div class="clear"></div>
    <div class="three columns">
    <div class='request-new-data'><a class="button" href="/request-new-data">Request new data</a></div>
    <div class="search-con">
     	<h3>Search</h3>
    	<div class="search-area">
    	<input name="" type="image" src="/sites/all/themes/dgph/images/clander-icon.png" class="clander-btn"> <input name="" type="text" class="clander-search">
        </div>
    </div>
   <div id="accordion" class='sidebar-accordion'>
        <h3>Organization Type</h3>
        <div>
        <p>
            
                        
            
        <form class="custom">
         <label for="checkbox11"><input type="checkbox" id="checkbox11" style="display: none;"> Private Individual </label> 
         <label for="checkbox12"><input type="checkbox" id="checkbox12" style="display: none;"> Start Up  </label> 
         <label for="checkbox13"><input type="checkbox" id="checkbox13" style="display: none;"> Small to Medium Business </label> 
         <label for="checkbox14"><input type="checkbox" id="checkbox14" style="display: none;"> Large Company</label> 
         <label for="checkbox15"><input type="checkbox" id="checkbox15" style="display: none;"> Not for profit Sector</label> 
         <label for="checkbox16"><input type="checkbox" id="checkbox16" style="display: none;"> Public Sector Organisation </label> 
         <label for="checkbox17"><input type="checkbox" id="checkbox17" style="display: none;"> Academic or Research </label> 
         </form>
        </p>
        </div>
        <h3>Suggested Use</h3>
        <div>
        <p>
        <form class="custom">
         <label for="checkbox21"><input type="checkbox" id="checkbox21" style="display: none;"> Business   </label> 
         <label for="checkbox22"><input type="checkbox" id="checkbox22" style="display: none;"> Climate Change  </label> 
         <label for="checkbox23"><input type="checkbox" id="checkbox23" style="display: none;"> Personal  </label> 
         <label for="checkbox24"><input type="checkbox" id="checkbox24" style="display: none;"> Research </label> 
         <label for="checkbox25"><input type="checkbox" id="checkbox25" style="display: none;"> Environment  </label> 
         <label for="checkbox26"><input type="checkbox" id="checkbox26" style="display: none;"> Other </label>  
         </form>
        </p>
        </div>
  </div>
    </div>
    <div class="nine columns  subpage-conntent-area latestdata grid">
    	<h1>Latest Data Requests</h1>
        <?php
            $idx = 0;
            while(!empty($latestRequests)) {
                $lr = array_shift($latestRequests);
                $id = $lr->nid;
                $title = $lr->title;
                $text = $lr->field_data_description['und'][0]['value'];
        ?>
        <div class="col-<?php echo $idx+1 ?> col">
            <h1><?php echo $title ?></h1>
            <span></span>
            <p><?php echo $text ?></p>
            <a href="/node/<?php echo $id ?>" class="view-more">View</a>
        </div>    
        <?php
            }
        ?>
        <div class="view">
            	<a style="float:left;" href="/data-requests/list">View All</a>
                <a style="float:right;  " href="#"><img alt="" src="/sites/all/themes/dgph/images/view-icon.png"></a>
            </div>
    </div>
     
  </div>