<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=product_info.<br />
 * Displays details of a typical product
 *
 * @package templateSystem
 * @copyright Copyright 2003-2014 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_product_info_display.php 19690 2011-10-04 16:41:45Z drbyte $
 */
 //require(DIR_WS_MODULES . '/debug_blocks/product_info_prices.php');
?>
<div class="centerColumn" id="productGeneral">

<!--bof Form start-->
<?php echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product', $request_type), 'post', 'enctype="multipart/form-data"') . "\n"; ?>
<!--eof Form start-->

<?php if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>

<!--<!--bof Category Icon -->
<?php //if ($module_show_categories != 0) {?>
<?php
///**
// * display the category icons
// */
//require($template->get_template_dir('/tpl_modules_category_icon_display.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_category_icon_display.php'); ?>
<?php //} ?>
<!--<!--eof Category Icon -->

<!--<!--bof Prev/Next top position -->
<?php //if (PRODUCT_INFO_PREVIOUS_NEXT == 1 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
///**
// * display the product previous/next helper
// */
//require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php //} ?>
<!--<!--eof Prev/Next top position-->

<table class="product-detail-table" width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td class="left-side-info">

<!--bof Main Product Image -->
<?php
  if (zen_not_null($products_image)) {
?>
<?php
/**
 * display the main product image
 */
   require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>
<?php
  }
?>
<!--eof Main Product Image-->

<!--bof Product details list  -->
<?php //if ( (($flag_show_product_info_model == 1 and $products_model != '') or ($flag_show_product_info_weight == 1 and $products_weight !=0) or ($flag_show_product_info_quantity == 1) or ($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name))) ) { ?>
<!--<ul id="productDetailsList" class="floatingBox back">-->
<!--  --><?php //echo (($flag_show_product_info_model == 1 and $products_model !='') ? '<li><span class="product-info-label">' . TEXT_PRODUCT_MODEL . '</span>' . $products_model . '</li>' : '') . "\n"; ?>
<!--  --><?php //echo (($flag_show_product_info_weight == 1 and $products_weight !=0) ? '<li><span class="product-info-label">' . TEXT_PRODUCT_WEIGHT . '</span>' .  $products_weight . TEXT_PRODUCT_WEIGHT_UNIT . '</li>'  : '') . "\n"; ?>
<!--  --><?php //echo (($flag_show_product_info_quantity == 1) ? '<li><span class="product-info-label">'. TEXT_PRODUCT_QUANTITY . ': </span>'  . $products_quantity  . '</li>'  : '') . "\n"; ?>
<!--  --><?php //echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li><span class="product-info-label">' . TEXT_PRODUCT_MANUFACTURER . '</span>' . $manufacturers_name . '</li>' : '') . "\n"; ?>
<!--</ul>-->
<!--<br class="clearBoth" />-->
<?php
//  }
//?>
<!--eof Product details list -->


	</td>
<td class="right-side-info">
    <!--bof Product Name-->
    <h1 id="productName" class="productGeneral"><?php echo $products_name; ?></h1>
    <!--eof Product Name-->
    <!--bof Product details list  -->

    <?php if ( (($flag_show_product_info_model == 1 and $products_model != '') or ($flag_show_product_info_weight == 1 and $products_weight !=0) or ($flag_show_product_info_quantity == 1) or ($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name))) ) { ?>
    <fieldset>
        <legend><?php echo ATTRIBUTES_OF_PRODUCT; ?></legend>
        <ul id="productDetailsList" class="floatingBox back">
            <?php echo (($flag_show_product_info_model == 1 and $products_model !='') ? '<li><span class="product-info-label">' . TEXT_PRODUCT_MODEL . '</span>' . $products_model . '</li>' : '') . "\n"; ?>
            <?php echo (($flag_show_product_info_weight == 1 and $products_weight !=0) ? '<li><span class="product-info-label">' . TEXT_PRODUCT_WEIGHT . '</span>' .  $products_weight . TEXT_PRODUCT_WEIGHT_UNIT . '</li>'  : '') . "\n"; ?>
            <?php echo (($flag_show_product_info_quantity == 1) ? '<li><span class="product-info-label">'. TEXT_PRODUCT_QUANTITY . ': </span>'  . $products_quantity  . '</li>'  : '') . "\n"; ?>
            <?php echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li><span class="product-info-label">' . TEXT_PRODUCT_MANUFACTURER . '</span>' . $manufacturers_name . '</li>' : '') . "\n"; ?>
        </ul>
        <br class="clearBoth" />
    </fieldset>

    <?php
    }
    ?>
    <!--eof Product details list -->
<!--bof Product Price block -->
<fieldset>
    <legend><?php echo PRICE_OF_PRODUCT; ?></legend>
    <h2 id="productPrices" class="productGeneral">
        <?php
        // base price
        if ($show_onetime_charges_description == 'true') {
            $one_time = '<span >' . TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION . '</span><br />';
        } else {
            $one_time = '';
        }
        echo $one_time . ((zen_has_product_attributes_values((int)$_GET['products_id']) and $flag_show_product_info_starting_at == 1) ? TEXT_BASE_PRICE : '') . zen_get_products_display_price((int)$_GET['products_id']);
        ?>
    </h2>
</fieldset>
<!--eof Product Price block -->

<!--bof free ship icon  -->
<?php if(zen_get_product_is_always_free_shipping($products_id_current) && $flag_show_product_info_free_shipping) { ?>
<div id="freeShippingIcon"><?php echo TEXT_PRODUCT_FREE_SHIPPING_ICON; ?></div>
<?php } ?>
<!--eof free ship icon  -->

<!--bof Product description -->
<?php //if ($products_description != '') { ?>
<!--<div id="productDescription" class="productGeneral biggerText">--><?php //echo stripslashes($products_description); ?><!--</div>-->
<?php //} ?>
<!--eof Product description -->
<br class="clearBoth" />

<!--bof Attributes Module -->
<?php
  if ($pr_attr->fields['total'] > 0) {
/**
 * display the product atributes
 */
      require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php');
  }
?>
<!--eof Attributes Module -->

<!--bof Quantity Discounts table -->
<?php
  if ($products_discount_type != 0) { ?>
<?php
/**
 * display the products quantity discount
 */
 require($template->get_template_dir('/tpl_modules_products_quantity_discounts.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_quantity_discounts.php'); ?>
<?php
  }
?>
<!--eof Quantity Discounts table -->

<!--bof Add to Cart Box -->
<?php
if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
  // do nothing
} else {
?>
            <?php
    $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($_GET['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($_GET['products_id']) . '</p>' : '');
            if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
              // hide the quantity box and default to 1
              $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            } else {
              // show the quantity box
    $the_button = PRODUCTS_ORDER_QTY_TEXT . '<input type="text" name="cart_quantity" value="' . (zen_get_buy_now_qty($_GET['products_id'])) . '" maxlength="6" size="4" /><br />' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . '<br />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            }
    $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
  ?>
  <?php if ($display_qty != '' or $display_button != '') { ?>
    <div id="cartAdd">
    <?php
      echo $display_qty;
      echo $display_button;
    ?>
    </div>
  <?php } // display qty and button ?>
<?php } // CUSTOMERS_APPROVAL == 3 ?>
<!--eof Add to Cart Box-->
<br class="clearBoth" />



</td>
</tr>
</table>


<!--bof Prev/Next bottom position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 2 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
/**
 * display the product previous/next helper
 */
 require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php } ?>
<!--eof Prev/Next bottom position -->


<!--bof product_information_page bottom-->
<div class="columnCenter-bottom">
    <ul id="tabs">
        <li id="current"><a href="#" name="tab1"><?php echo TEXT_DESCRIPTION; ?></a></li>
        <li><a href="#" name="tab2"><?php echo TEXT_SHIPPING; ?></a></li>
        <li><a href="#" name="tab3"><?php echo TEXT_REVIEW.'('.($flag_show_product_info_reviews_count == 1 ? $reviews->fields['count'] : '0').')'; ?></a></li>
        <li><a href="#" name="tab4"><?php echo TEXT_FAQ; ?></a></li>
    </ul>
    <div id="content">
        <div id="tab1">
            <!--bof Product description -->
            <?php if ($products_description != '') { ?>
                <div id="productDescription" class="productGeneral biggerText"><?php echo stripslashes($products_description); ?></div>
            <?php } ?>
            <!--eof Product description -->
            <!--bof Additional Product Images -->
            <?php
            /**
             * display the products additional images
             */
            require($template->get_template_dir('/tpl_modules_additional_images.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_additional_images.php');
            ?>
            <!--eof Additional Product Images -->
        </div>
        <div id="tab2">
            <img src="includes/templates/abagon/images/shipping/express.gif" alt="<?php echo TEXT_SHIPPING; ?>" style="width: 100%;"/>
        </div>
        <div id="tab3">
            <!--撰写评论链接-->
            <!--bof Reviews button and count-->
            <?php
            if ($flag_show_product_info_reviews == 1) {
                // if more than 0 reviews, then show reviews button; otherwise, show the "write review" button
//                if ($reviews->fields['count'] > 0 ) { ?>
<!--                    <div id="productReviewLink" class="buttonRow back" style="float: right;">--><?php //echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS, zen_get_all_get_params()) . '">' . '<h4 style="font-style:oblique;">More...</h4>' . '</a>'; ?><!--</div>-->
<!--                    <br class="clearBoth" />-->
                    <!--          <p class="reviewCount">--><?php //echo ($flag_show_product_info_reviews_count == 1 ? TEXT_CURRENT_REVIEWS . ' ' . $reviews->fields['count'] : ''); ?><!--</p>-->
<!--                --><?php //}
                //撰写评论
                if($reviews->fields['count']==0) { ?>
                    <div id="productReviewLink" class="buttonRow back""><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">' . zen_image_button(BUTTON_IMAGE_WRITE_REVIEW, BUTTON_WRITE_REVIEW_ALT) . '</a>'; ?></div>
                    <br class="clearBoth" />
                    <?php
                }
            }
            ?>
            <!--eof Reviews button and count -->

            <?php
            if ($reviews_split->number_of_rows > 0) {
                if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {
            ?>
                    <div id="productReviewsDefaultListingTopNumber" class="navSplitPagesResult"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></div>
                    <div id="productReviewsDefaultListingTopLinks" class="navSplitPagesLinks"><?php echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'main_page'))); ?></div>
                <?php
                }
                foreach ($reviewsArray as $reviews) {
                ?>
                    <hr />
                    <!--bof 客户评论-->
                    <div class="productReviewsDefaultReviewer bold"><?php echo sprintf(TEXT_REVIEW_DATE_ADDED, zen_date_short($reviews['dateAdded'])); ?>&nbsp;<?php echo sprintf(TEXT_REVIEW_BY, zen_output_string_protected($reviews['customersName'])); ?></div>
                    <div class="rating"><?php echo zen_image(DIR_WS_TEMPLATE_IMAGES . 'stars_' . $reviews['reviewsRating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews['reviewsRating'])),sprintf(TEXT_OF_5_STARS, $reviews['reviewsRating']); ?></div>
                    <div class="productReviewsDefaultProductMainContent content"><?php echo zen_break_string(zen_output_string_protected(stripslashes($reviews['reviewsText'])), 60, '-<br />') . ((strlen($reviews['reviewsText']) >= 100) ? '...' : ''); ?></div>
                    <!--eof-->
                    <br class="clearBoth" />
                <?php
                }
                ?>
            <?php
            }
            else {
            ?>
                <hr />
                <div id="productReviewsDefaultNoReviews" class="content"><?php echo TEXT_NO_REVIEWS.'<br />'; echo TEXT_APPROVAL_REQUIRED.'!'; ?></div>
                <br class="clearBoth" />
            <?php
            }
            if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
            ?>
                <!--底部分页显示-->
                <hr />
                <div id="productReviewsDefaultListingBottomLinks" class="navSplitPagesLinks"><?php echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'main_page'))); ?></div>
            <?php
            }
            ?>
        </div>
        <div id="tab4">FAQ</div>
    </div>
    <script>
        $(document).ready(function() {
            $("#content").find("[id^='tab']").hide(); // Hide all content
            $("#tabs li:first").attr("id","current"); // Activate the first tab
            $("#content #tab1").fadeIn(); // Show first tab's content

            $('#tabs a').click(function(e) {
                e.preventDefault();
                if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
                    return;
                }
                else{
                    $("#content").find("[id^='tab']").hide(); // Hide all content
                    $("#tabs li").attr("id",""); //Reset id's
                    $(this).parent().attr("id","current"); // Activate this
                    $('#' + $(this).attr('name')).fadeIn();// Show content for the current tab
                }
            });
        });
    </script>
</div>
<!--eof product_information_page bottom-->


<!--bof Product date added/available-->
<?php
  if ($products_date_available > date('Y-m-d H:i:s')) {
    if ($flag_show_product_info_date_available == 1) {
?>
  <p id="productDateAvailable" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_AVAILABLE, zen_date_long($products_date_available)); ?></p>
<?php
    }
  } else {
    if ($flag_show_product_info_date_added == 1) {
?>
      <p id="productDateAdded" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_ADDED, zen_date_long($products_date_added)); ?></p>
<?php
    } // $flag_show_product_info_date_added
  }
?>
<!--eof Product date added/available -->

<!--商品的详细信息链接-->
<!--bof Product URL -->
<?php
//  if (zen_not_null($products_url)) {
//    if ($flag_show_product_info_url == 1) {
//?>
<!--    <p id="productInfoLink" class="productGeneral centeredContent">--><?php //echo sprintf(TEXT_MORE_INFORMATION, zen_href_link(FILENAME_REDIRECT, 'action=product&products_id=' . zen_output_string_protected($_GET['products_id']), 'NONSSL', true, false)); ?><!--</p>-->
<?php
//    } // $flag_show_product_info_url
//  }
//?>
<!--eof Product URL -->

<!--bof also purchased products module-->
<?php require($template->get_template_dir('tpl_modules_also_purchased_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_also_purchased_products.php');?>
<!--eof also purchased products module-->

<!--bof Form close-->
</form>
<!--bof Form close-->
</div>