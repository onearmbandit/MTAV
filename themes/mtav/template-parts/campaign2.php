<?php
/**
 * Campaign template
 * php version 7.4
 *
 * @category MTAV
 * @package  MTAV
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     MTAV
 */

?>

<div class="campaign-launch--wrapper">
    <div class="container">
        <div class="campign-launch--inner">
            <div class="mobile-heading">
                <div class="heading-compo black">
                    <div class="line-block">
                        <div class="left-block">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <?php if($title && !empty($title)) :?>
                    <h1><?php echo wp_kses_post($title);?></h1>
                <?php endif;?>
            </div>
            <div class="content">
                <div class="heading-compo black">
                    <div class="line-block">
                        <div class="left-block">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <?php if($title && !empty($title)) :?>
                    <h1><?php echo wp_kses_post($title);?></h1>
                <?php endif;?>

                <?php if($description && !empty($description)) :?>
                <div class="para">
                    <?php echo wp_kses_post($description);?>
                </div>
                <?php endif;?>
            </div>
            <div class="video">
                <iframe src="<?php echo esc_url(MTAV_Get_Youtube_Video_url($video_url));?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>