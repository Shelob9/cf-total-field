<?php
/**
 * Generic HTML input field
 *
 * @package Caldera_Forms
 * @author    Josh Pollock <Josh@CalderaWP.com>
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 CalderaWP LLC
 */
$before = ! empty( $field[ 'config' ][ 'before' ] ) ? $field[ 'config' ][ 'before' ] : '';
$after = ! empty( $field[ 'config' ][ 'after' ] ) ? $field[ 'config' ][ 'after' ] : '';
$total = cf_total_field_get_total_field( $field, $form );
?>
<?php echo $wrapper_before; ?>
    <?php echo $field_label; ?>
    <?php echo $field_before; ?>
        <?php echo $before . ' ' . $total . ' ' . $after ?>
        <?php echo $field_caption; ?>
    <?php echo $field_after; ?>
<?php echo $wrapper_after; ?>