<?php
/**
 * Template Name: Letter
 * php version 7.4
 *
 * @category MTAV
 * @package  MTAV
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     MTAV
 */

MTAV_Page_Entry_top('letter-page');
?>

<div class="body-content letter-main-wrapper">
    <?php
    while ( have_posts() ) :
        the_post();
        include locate_template('template-parts/letter.php');
    endwhile;
    ?>
</div>

<?php MTAV_Page_Entry_bottom();
