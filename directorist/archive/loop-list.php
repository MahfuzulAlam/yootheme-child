<?php
/**
 * @author  wpWax
 * @since   6.6
 * @version 6.7
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$loop_fields = $listings->loop['list_fields']['template_data']['list_view_with_thumbnail'];
?>

<div class="directorist-listing-single directorist-listing-list directorist-listing-has-thumb <?php echo esc_attr( $listings->loop_wrapper_class() ); ?>">

	<figure class="directorist-listing-single__thumb">
		<?php $listings->loop_thumb_card_template(); ?>
		<div class="directorist-thumb-top-right"><?php $listings->render_loop_fields($loop_fields['thumbnail']['top_right']); ?></div>
	</figure>

	<div class="directorist-listing-single__content">

		<div class="directorist-listing-single__info">
			<div class="directorist-listing-single__info--top"><?php $listings->render_loop_fields($loop_fields['body']['top']); ?></div>
			<div class="directorist-listing-single__info--list"><ul><?php $listings->render_loop_fields($loop_fields['body']['bottom'], '<li>', '</li>'); ?></ul></div>
			<div class="directorist-listing-single__info--excerpt"><?php $listings->render_loop_fields($loop_fields['body']['excerpt']); ?></div>
			<div class="directorist-listing-single__info--right"><?php $listings->render_loop_fields($loop_fields['body']['right']); ?></div>
		</div>

		<div class="directorist-listing-single__meta">
			<div class="directorist-listing-single__meta--left"><?php $listings->render_loop_fields($loop_fields['footer']['left']); ?></div>
			<div class="directorist-listing-single__meta--right download-link">
                <?php
                if(is_user_logged_in()){
                    $downloadable_file_link = get_post_meta(get_the_ID(), '_download-url', true);
                    if(!empty($downloadable_file_link)) printf('<a href="%s" target="_blank" download>%s</a>', esc_url($downloadable_file_link), 'Download File');
                }else{
                    $login_page_link = home_url( '/registration/' );
                    printf('<a href="%s">%s</a>', esc_url($login_page_link), 'Register for FREE to Download the Music File');
                }
                ?>                
			</div>
		</div>

	</div>

</div>