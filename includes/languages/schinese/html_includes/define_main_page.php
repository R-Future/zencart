<?php 
/**
 * Slideshow creator
 *
 * @package slideshow
 * @author Vassilios Barzokas <contact@vbarzokas.com> 
 * @author website www.vbarzokas.com
 * @copyright Copyright 2011 Vassilios Barzokas
 * @license http://www.gnu.org/copyleft/gpl.html   GNU Public License V2.0
 * @version $Id: slideshow.php 1.1 2012-01-22 11:50:04Z $
 */
?>
<script type="text/javascript">
		$(document).ready(function(){   
				$("#slider").easySlider({
						auto: true, 
						continuous: true,
						numeric: true,
						firstShow : true,
						lastShow : true,
						controlsShow: true,
						speed: 800,
						pause: 2000
				});
	   });     
</script>
<link rel="stylesheet" type="text/css" href="../templates/abagon/css/stylesheet.slider.css"/>
            <?php
			$slideshow_query = "SELECT * FROM " . TABLE_SLIDESHOW;
			$slideshow_result = $db->Execute($slideshow_query);
            ?>
			<div id="slider">
                <ul>        
				<?php 
				while(!$slideshow_result->EOF)
				{
				?>
					<li>
						<a href="<?php echo $slideshow_result->fields['url']; ?>">
							<img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/'.$slideshow_result->fields['image']; ?>"   alt="slide image" />
							<img class="price" src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/price_bg.png'?>"   alt="slide price" />
							<span class="price_text"><?php echo $slideshow_result->fields['price']?></span>
						</a>
					</li>
				<?php 
				$slideshow_result->MoveNext();
				} //end while
				?>
                </ul>
			</div>     