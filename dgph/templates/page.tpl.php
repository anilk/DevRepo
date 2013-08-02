<?php if (!empty($page['header'])): ?>
    <div class="row">
      <div class="twelve columns">
        <?php print render($page['header']);?>
      </div>
    </div>
<?php endif; ?>

<?php if ($main_menu_links || !empty($page['navigation'])): ?>
    <nav class="top-bar fixed">
      <div class="row">
        <div class="columns ten">
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']);?>
          <?php else: ?>
            <?php print $main_menu_links; ?>
          <?php endif; ?>
        </div>
        <div class="columns two">
            <div class="search topseacrh">
                <input name="" type="search">
            </div>
        </div>
      </div>
    </nav>
<?php endif; ?>

<div class="header">
    <div class="row">
        <div class="eight columns logo">
            <a href="http://data.insomnation.com"><img src="/sites/all/themes/dgph/images/logo.png" width="411" height="140"></a>
        </div> 
        <div class=" four columns">
            <div class="login-area">
                <?php
                    global $user;
                    if ($user->uid) {
                ?>
                <h2 class='my-account'><a href='/user'>MY ACCOUNT</a></h2>
                <p>&nbsp;<br>&nbsp;</p>
                <?php } else { ?>
                <h2><a href='/user/login'>LOGIN</a></h2>
                <p>No Account yet?<br><a href="#"><b>Sign up</b></a> here!</p>
                <?php } ?>
           </div>
        </div> 
    </div>
</div>    

<?php
    if (!empty($messages)) {
        print "<div class='clear'></div>$messages"; 
    }
?>
<?php print render($page['content']); ?>
    
<?php if (!empty($page['footer_first']) || !empty($page['footer_middle']) || !empty($page['footer_last'])): ?>
<div class="foore-con page-footer">
    <footer class='row foot-nav'>
        <div class='row'>
            <?php if (!empty($page['footer_first'])): ?>
              <div id="footer-first" class="four columns">
                <?php print render($page['footer_first']); ?>
              </div>
            <?php endif; ?>
            <?php if (!empty($page['footer_middle'])): ?>
              <div id="footer-middle" class="four columns">
                <?php print render($page['footer_middle']); ?>
              </div>
            <?php endif; ?>
            <?php if (!empty($page['footer_last'])): ?>
              <div id="footer-last" class="four columns">
                <?php print render($page['footer_last']); ?>
              </div>
            <?php endif; ?>
        </div>
    </footer>
</div>
<?php endif; ?>