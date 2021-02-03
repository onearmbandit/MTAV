<?php
/**
 * Our Partners block template.
 * php version 7.4
 *
 * @category MTAV
 * @package  MTAV
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     MTAV
 */

?>

<div class="partners--wrapper">
    <div class="container">
        <div>
            <div class="heading-compo black">
                <div class="line-block">
                    <div class="left-block">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

            <?php if($title && !empty($title)) :?>
                <h1>
                    <?php echo wp_kses_post($title);?>
                </h1>
            <?php endif;?>

        </div>

        <div class="partners-logo--wrapper">

        <?php foreach ($partners as $data) {
            $logo_img_id = $data['partners_image'];
            $logo_img_array = wp_get_attachment_image_src($logo_img_id, 'full');
            $logo_img_alt   = MTAV_Get_Image_alt($logo_img_id, "Column Image");
            $logo_img_url   = MTAV_Get_image($logo_img_array);

            if ($logo_img_id && !empty($logo_img_id)) {
                ?>

            <div class="logo">
                <img src="<?php echo esc_url($logo_img_url); ?>" />
            </div>
            <?php }
        }?>
        </div>
    </div>
</div>


