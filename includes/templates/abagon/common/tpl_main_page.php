<?php
/**
* Template designed by 12leaves.com
* 12leaves.com - Free ecommerce templates and design services
*
* Common Template
* 
* @package languageDefines
* @copyright Copyright 2009-2010 12leaves.com
* @copyright Copyright 2003-2007 Zen Cart Development Team
* @copyright Portions Copyright 2003 osCommerce
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* @version $Id: tpl_main_page.php 7085 2007-09-22 04:56:31Z ajeh $
*/

// the following IF statement can be duplicated/modified as needed to set additional flags
  if (in_array($current_page_base,explode(",",'list_pages_to_skip_all_right_sideboxes_on_here,separated_by_commas,and_no_spaces')) ) {
    $flag_disable_right = true;
  }


  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = str_replace('_', '', $_GET['main_page']);

 // $body_id = ($this_is_home_page) ? 'indexHome' : str_replace('_', '', $_GET['main_page']);


?>
<body id="<?php echo $body_id . 'Body'; ?>"<?php if($zv_onload !='') echo ' onload="'.$zv_onload.'"'; ?>>
<?php if (defined('SKINS_PANEL')) { require ('demo_panel.php'); }?>
<!--[if IE 6]>
<script type="text/javascript" src="gxbanner_template1014/transparent_png.js"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('.page a, .center-upper-bg, .center-bottom-bg, .body-bg, .left_handle, .right_handle, .shadow_left, .shadow_right'); 
</script>
<![endif]-->

<div class="body-wrapper">
    <div id="top_breadcrumb">
        <!-- nav currency -->
            <?php if (isset($currencies) && is_object($currencies) && count ($currencies->currencies) > 1) { ?>
                <div id="currency">
                    <?php require($template->get_template_dir('tpl_currency_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_currency_header.php'); ?>
                    <div id="currPopup" class="popup popup-win hidden">
                        <img id="close-pic" class="close-pic float-right" src="<?php echo ($template->get_template_dir('', DIR_WS_TEMPLATE, $current_page_base,'images'). '/close_pic.gif'); ?>" alt="close" />
                        <ul class="list-popup">
                            <?php foreach ($currencies_array_popup as $k=>$v) { ?>
                                <li><a href="<?php if ((stripos($_SERVER['REQUEST_URI'], '.php')) !== false ) echo $_SERVER['REQUEST_URI']; else echo '?'; ?><?php echo '&amp;currency='.$k; ?>"><?php echo $v; ?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        <!-- Languages-->
        <div id="languages_wrapper">
            <?php if (!isset($lng) || (isset($lng) && !is_object($lng))) {
                $lng = new language;
            }
            reset($lng->catalog_languages);
            if (count ($lng->catalog_languages) > 1){

                while (list($key, $value) = each($lng->catalog_languages)) {
                    echo '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '">' . zen_image(DIR_WS_LANGUAGES.$value['directory'].'/images/'.$value['image'], $value['name'], '', '', ' style="vertical-align:middle;"') . '</a>&nbsp;';
                }
            }
            ?>
        </div>

        <div class="login_logout_section">
            <!--login-->
            <?php if ($_SESSION['customer_id']) { ?>
                <?php echo(TOP_MENU_HELLO);?><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo ($_SESSION['customer_first_name'].' '.$_SESSION['customer_last_name']);?></a>
                <span>&nbsp;|&nbsp;</span>
                <a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a>
            <?php
            } else {
                if (STORE_STATUS == '0') {
                    ?>
                    <?php echo LOGIN_WELCOME; ?>
                    <a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a>
                    <span>&nbsp;or&nbsp;</span>
                    <?php echo REGISTER_WELCOME; ?>
                    <span><a href="<?php echo zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_REGISTER; ?></a></span>
                <?php } } ?>
            <!--/login-->
        </div>

        <div id="cart_header_wrapper">
            <!-- header cart section -->
            <table align="right" class="align-center cart-header">
                <tr>
                    <td>
                        <div class="hidden cart-dropdown-wrapper">
                            <div class="cart-tab-wrapper"><img src="<?php echo $template->get_template_dir('', DIR_WS_TEMPLATE, $current_page_base,'images')?>/spacer.gif" width="1" height="1" alt="" /></div>
                        </div>
                    </td>
                    <td>
                        <?php require($template->get_template_dir('tpl_shopping_cart_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_shopping_cart_header.php');
                        echo $content;?>
                    </td>
                </tr>
            </table>
        </div>

    </div>
<div class="body-upper-bg">
<div class="body-bottom-bg">

<div class="clearBoth"></div>

<div id="header_bg">
	<div>
        <?php  require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');?>
	</div>
</div>

<div class="body-bg">

<div class="mainWrapper">
<?php    	
 /**
  * prepares and displays header output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_header = true;
  }
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="contentMainWrapper">
  <tr>
<?php
if (COLUMN_LEFT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == ''))) {
  // global disable of column_left
  $flag_disable_left = true;
}
if ((!isset($flag_disable_left) || !$flag_disable_left)) {
?>

 <td id="navColumnOne" class="columnLeft" style="width: <?php echo COLUMN_WIDTH_LEFT; ?>">
<?php
 /**
  * prepares and displays left column sideboxes
  *
  */
?>
<div class="float-left" id="navColumnOneWrapper" style="width: <?php echo BOX_WIDTH_LEFT; ?>"><?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?></div></td>
<?php } ?>

    <td id="columnCenter" valign="top">

<!-- bof  breadcrumb -->
<?php if ((DEFINE_BREADCRUMB_STATUS == '1' || DEFINE_BREADCRUMB_STATUS == '2') && ($this_is_home_page != '1')) { ?>
    <div id="navBreadCrumb"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></div>
<?php } ?>
<!-- eof breadcrumb -->


<!-- bof upload alerts -->
<?php if ($messageStack->size('upload') > 0) echo $messageStack->output('upload'); ?>
<!-- eof upload alerts -->
<?php
 /**
  * prepares and displays center column
  *
  */
 require($body_code);
?>

</td>

<?php
//if (COLUMN_RIGHT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF == 'true' && $_SESSION['customers_authorization'] != 0)) { 
if (COLUMN_RIGHT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == ''))) {
  // global disable of column_right
  $flag_disable_right = true;
}
if ((!isset($flag_disable_right) || !$flag_disable_right)) {
?>
<td id="navColumnTwo" class="columnRight" style="width: <?php echo COLUMN_WIDTH_RIGHT; ?>">
<?php
 /**
  * prepares and displays right column sideboxes
  *
  */
?>
<div id="navColumnTwoWrapper" style="width: <?php echo BOX_WIDTH_RIGHT; ?>"><?php require(DIR_WS_MODULES . zen_get_module_directory('column_right.php')); ?></div></td>
<?php } ?>
  </tr>
</table>



</div>


<?php
 /**
  * prepares and displays footer output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_FOOTER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_footer = true;
  }
  require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php');
?>

<!-- bof- parse time display -->
<?php
  if (DISPLAY_PAGE_PARSE_TIME == 'true') {
?>
<div class="smallText center">Parse Time: <?php echo $parse_time; ?> - Number of Queries: <?php echo $db->queryCount(); ?> - Query Time: <?php echo $db->queryTime(); ?></div>
<?php
  }
?>
<!-- eof- parse time display -->


</div>


</body>
