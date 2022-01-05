<?php

/**
 * @author  wpWax
 * @since   6.6
 * @version 6.7
 */

if (!defined('ABSPATH')) exit;
?>

<?php if (isset($data['original_field']['field_key']) && strpos($data['original_field']['field_key'], 'iframe') !== false) : ?>
    <div class="directorist-listing-card-text"><?php echo $value; ?></div>
<?php else : ?>
    <div class="directorist-listing-card-text"><?php directorist_icon($icon); ?><?php $listings->print_label($label); ?><?php echo esc_html($value); ?></div>
<?php endif; ?>