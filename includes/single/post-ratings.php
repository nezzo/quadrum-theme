<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	//ratings
	$ratings = get_post_meta( $post->ID, THEME_NAME."_ratings", true );
	$visitor_ratings = get_post_meta( $post->ID, THEME_NAME."_visitor_rating", true );
	$summary = get_post_meta( $post->ID, THEME_NAME."_summary", true );
	$visitor_rate = get_option(THEME_NAME."_visitor_rate");
	$the_id = get_the_id();

?>
<?php 
	if($ratings) { 
?>

	<div class="rating-panel" itemscope itemtype="http://data-vocabulary.org/Review">
		<?php 
				$totalRate = array();
				$rating = explode(";", $ratings);
				$i=0;
		?>
		<?php 
				foreach($rating as $rate) { 
					$ratingValues = explode(":", $rate);
					if(isset($ratingValues[1])) {
						$ratingPrecentage = (str_replace(",",".",$ratingValues[1]))*20;
					}
					$totalRate[$i] = $ratingPrecentage;
					if($ratingValues[0]) {

		?>
			<div class="rating-option">
				<div class="rating-info"><?php echo $ratingValues[0];?></div>
				<div class="rating-stars">
					<div class="ot-star-rating">
						<span style="width:<?php echo $ratingPrecentage;?>%"><strong class="rating"></strong> <?php echo floor(($ratingPrecentage/5) * 2) / 2;?><?php esc_html_e("out of 5",'quadrum-theme');?></span>
					</div>
				</div>
			</div>

		<?php 
					} 
					$i++;
				}
				if( $visitor_ratings > 0 && $visitor_rate == "on" ) {
					$totalRate[$i] = (str_replace(",",".",$visitor_ratings))*20;	
				}
				
	 	?>
	 	<?php if($visitor_rate == "on") { ?>
			<div class="rating-option">
				<div class="rating-info"><?php esc_html_e('Visitors Vote', 'quadrum-theme');?></div>
				<div class="rating-stars">
					<div class="ot-star-rating visitors-vote<?php echo ( isset($_COOKIE['quadrum_vote_'.$the_id]) && $_COOKIE['quadrum_vote_'.$the_id] == "1" ) ? ' voted' : false ; ?>" data-id="<?php the_id();?>" data-before="<?php echo esc_attr($visitor_ratings*20);?>">
						<span style="width:<?php echo esc_attr($visitor_ratings*20);?>%"><strong class="rating"></strong> <?php echo floor($visitor_ratings);?><?php esc_html_e("out of 5",'quadrum-theme');?></span>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="rating-option">
			<?php if($summary) { ?>
				<div class="rating-info">
					<h4><?php _e("Overview",'quadrum-theme');?></h4>
					<p itemprop="summary"><?php echo nl2br(stripslashes($summary));?></p>
				</div>
			<?php } ?>
			<?php 

				if(!empty($totalRate)) { 
					$rateCount = count($totalRate);	
					$total = 0;
					foreach ($totalRate as $val) {
						$total = $total + $val;
					}

					$avaragePrecentage = round($total/$rateCount,2);
					$avarageRate = round((($total/$rateCount)/20),2);

					if($avarageRate>=4.75) {
						$rateText = esc_html__("Excellent",'quadrum-theme');
					} else if($avarageRate<4.75 && $avarageRate>=3.75) {
						$rateText = esc_html__("Good",'quadrum-theme');
					} else if($avarageRate<3.75 && $avarageRate>=2.75) {
						$rateText = esc_html__("Average",'quadrum-theme');
					} else if($avarageRate<2.75 && $avarageRate>=1.75) {
						$rateText = esc_html__("Fair",'quadrum-theme');
					} else if($avarageRate<1.75 && $avarageRate>=0.75) {
						$rateText = esc_html__("Poor",'quadrum-theme');
					} else if($avarageRate<0.75) {
						$rateText = esc_html__("Very Poor",'quadrum-theme');
					}
			?>

				<div class="rating-stars">
					<h2 class="rev-score" itemprop="rating"><?php echo $avarageRate;?></h2>
					<div class="ot-star-rating rating-total">
						<span style="width:<?php echo $avaragePrecentage;?>%"><strong class="master-rate rating"><?php echo $avarageRate;?></strong> <?php _e("out of 5",'quadrum-theme');?></span>
					</div>
					<span class="rating-textual"><?php echo $rateText;?></span>
	                <meta itemprop="itemreviewed" content="<?php the_title(); ?>"/>
	                <meta itemprop="reviewer" content="<?php the_author();?>"/>
	                <meta itemprop="dtreviewed" content="<?php echo the_time("F d, Y"); ?>"/>
				</div>
			<?php } ?>


		</div>
	</div>

<?php } ?>