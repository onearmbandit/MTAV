<?php
/**
 * Template part for displaying page banner content
 * php version 7.4
 *
 * @category MTAV
 * @package  MTAV
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     MTAV
 */


$all_categories = get_categories();

foreach ($all_categories as $key => $category) {
    $args = array(
        'post_type'     => 'post',
        'numberposts'   => '-1',
        'category'      => $category->term_id
    );
    $campaign_posts = get_posts($args);
    ?>

    <div class="lookback-compo">
        <div class="container">
            <div class="header">
                <div class="heading-compo black">
                    <div class="line-block">
                        <div class="left-block">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

                <h1 class="title">
                    <?php echo esc_attr($category->name); ?>
                </h1>
            </div>

            <div class="lookback-wrapper">

            <?php foreach ($campaign_posts as $key => $campaign) {
                $campaignTitle    = get_field('banner_title', $campaign->ID);
                $campaignSubTitle = get_field('banner_subtitle', $campaign->ID);
                $campaignImgId    = get_field('banner_background_image', $campaign->ID);
                $campaignImgUrl   = '';

                if ($campaignImgId && !empty($campaignImgId)) {
                    $campaignImgArray = wp_get_attachment_image_src($campaignImgId, 'full');
                    $campaignImgUrl   = MTAV_Get_image($campaignImgArray);
                }
                ?>
                <div class="single-block"
                    style="background-image: url('<?php echo  esc_url($campaignImgUrl); ?>">
                    <div class="content-block">
                        <div class="heading-compo">
                            <div class="line-block">
                                <div class="left-block">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>

                        <h1 class="inner-title">
                            <?php echo esc_attr($campaignTitle); ?>
                        </h1>
                        <p class="content">
                            <?php echo esc_attr($campaignSubTitle); ?>
                        </p>
                        <div class="btn-wrapper">
                            <a href="" class="btn btn-primary">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

    <?php
}