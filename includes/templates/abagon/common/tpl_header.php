<?php
/**
* Template designed by 12leaves.com
* 12leaves.com - Free ecommerce templates and design services
*
* Common Template
* 
* @package languageDefines
* @copyright Copyright 2009-2010 12leaves.com
* @copyright Copyright 2003-2006 Zen Cart Development Team
* @copyright Portions Copyright 2003 osCommerce
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* @version $Id: tpl_header.php 4813 2006-10-23 02:13:53Z drbyte $
*/
 function fn_print_r()
{
    static $count = 0;
    $args = func_get_args();

    if (!empty($args)) {
        echo "<div align='left' style='font-family: Courier; font-size: 13px;'><pre>";
        foreach($args as $k => $v){
            echo "<b>Debug [$k/$count]:</b>";
            @ob_start();
            print_r($v);
            $bdata = @ob_get_contents()."\n";
            @ob_end_clean();
            echo htmlspecialchars($bdata);
        }
        echo "</pre></div>";
    }
    $count++;
}
?>

<?php
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
    echo htmlspecialchars(urldecode($_GET['error_message']));
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
    echo htmlspecialchars($_GET['info_message']);
  } else {
  }

// test if box should display
  $show_languages= true;

  if ($show_languages == true) {
    if (!isset($lng) || (isset($lng) && !is_object($lng))) {
      $lng = new language;
    }

    reset($lng->catalog_languages);
    $languages_array = array();
    $current_language = '';    
      while (list($key, $value) = each($lng->catalog_languages)) {
        $languages_array_popup[$key] = $value['name'];
      }
     
    foreach ($languages_array_popup as $k => $v){
        if ($k == $_SESSION['languages_code']) {
            $current_language = $v;
        }
    }
  }

?>

<!--bof-header logo and navigation display-->
<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>

<div id="headerWrapper">
    <div class="center-upper-bg centered-wrapper"></div>

    <div class="body-bg">
        <div class="header_wrapper">

	      <div class="header-tools">
	       <!--bof-branding display-->
                <div id="logoWrapper"><div id="logo"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT) . '</a>';?></div>
                </div>
				<div class="float-right">
				<!--bof-header ezpage links-->
				<div class="topper-menu float-right">
				<?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
				<?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
				<?php } ?>
				</div>
				<!--eof-header ezpage links-->
                    <!--search-->
                <div class="search-header">
                     <?php require($template->get_template_dir('tpl_search_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_search_header.php');?>
                        <div class="advanced_search float-left">
                            <a href="index.php?main_page=advanced_search"><?php echo HEADER_ADVANCED_SEARCH; ?></a>
                        </div>
                </div>
                <!--/search-->
			    </div>
			    <div class="clearBoth"></div>
                <div class="main_menu_panel">
                    <?php require($template->get_template_dir('tpl_top_nav.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_top_nav.php'); ?>
                </div>
          <!--eof-branding display-->
	    </div>

          <!--bof-optional categories tabs navigation display-->
          <?php
            if (CATEGORIES_TABS_STATUS == '1') {
               require($template->get_template_dir('tpl_modules_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_categories_tabs.php'); 
            } ?>
          <!--eof-optional categories tabs navigation display-->


<!--bof-banner #1 display -->
<?php
if ($this_is_home_page) {
  if (SHOW_BANNERS_GROUP_SET1 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET1)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerOne" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
}
?>
<!--eof-banner #1 display -->

      </div>
    </div>
</div>
<?php } ?>
<!--eof-header logo and navigation display-->  