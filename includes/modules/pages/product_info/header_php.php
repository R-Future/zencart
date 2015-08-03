<?php
/**
 * product_info header_php.php
 *
 * @package page
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_php.php 18697 2011-05-04 14:35:20Z wilt $
 */

  // This should be first line of the script:
  $zco_notifier->notify('NOTIFY_HEADER_START_PRODUCT_INFO');

  require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

  // if specified product_id is disabled or doesn't exist, ensure that metatags and breadcrumbs don't share inappropriate information
  $sql = "select count(*) as total
          from " . TABLE_PRODUCTS . " p, " .
                   TABLE_PRODUCTS_DESCRIPTION . " pd
          where    p.products_status = '1'
          and      p.products_id = '" . (int)$_GET['products_id'] . "'
          and      pd.products_id = p.products_id
          and      pd.language_id = '" . (int)$_SESSION['languages_id'] . "'";
  $res = $db->Execute($sql);
  if ( $res->fields['total'] < 1 ) {
    unset($_GET['products_id']);
    unset($breadcrumb->_trail[sizeof($breadcrumb->_trail)-1]['title']);
    $robotsNoIndex = true;
    header('HTTP/1.1 404 Not Found');
  }

  // ensure navigation snapshot in case must-be-logged-in-for-price is enabled
  if (!$_SESSION['customer_id']) {
    $_SESSION['navigation']->set_snapshot();
  }

  // This should be last line of the script:
  $zco_notifier->notify('NOTIFY_HEADER_END_PRODUCT_INFO');

//the part added by Future
$reviews_query_raw = "SELECT r.reviews_id, left(rd.reviews_text, 100) as reviews_text, r.reviews_rating, r.date_added, r.customers_name
                        FROM " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd
                        WHERE r.products_id = :productsID
                        AND r.reviews_id = rd.reviews_id
                        AND rd.languages_id = :languagesID " . $review_status . "
                        ORDER BY r.reviews_id desc";

$reviews_query_raw = $db->bindVars($reviews_query_raw, ':productsID', $_GET['products_id'], 'integer');
$reviews_query_raw = $db->bindVars($reviews_query_raw, ':languagesID', $_SESSION['languages_id'], 'integer');
$reviews_split = new splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);
$reviews = $db->Execute($reviews_split->sql_query);
$reviewsArray = array();
while (!$reviews->EOF) {
    $reviewsArray[] = array('id'=>$reviews->fields['reviews_id'],
        'customersName'=>$reviews->fields['customers_name'],
        'dateAdded'=>$reviews->fields['date_added'],
        'reviewsText'=>$reviews->fields['reviews_text'],
        'reviewsRating'=>$reviews->fields['reviews_rating']);
    $reviews->MoveNext();
}