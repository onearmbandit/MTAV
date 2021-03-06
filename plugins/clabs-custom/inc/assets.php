<?php
/**
 * Contains functions for working with assets (primarily JavaScript).
 *
 * @package Clabs
 */

namespace Clabs;

// Register action and filter hooks.
add_action(
    'enqueue_block_editor_assets',
    __NAMESPACE__ . '\action_enqueue_block_editor_assets'
);

/**
 * Set allowed post types.
 *
 * @return array array of post types allowed for Gutenberg.
 */
function allowed_post_types()
{
    return [
    'post',
    'gallery',
    ];
}

/**
 * A callback for the enqueue_block_editor_assets action hook.
 */
function action_enqueue_block_editor_assets()
{
    global $post_type;

    // Only enqueue the script to register the scripts if supported.
    if (! in_array($post_type, allowed_post_types(), true) ) {
        return;
    }

    wp_enqueue_script(
        'clabs-block-readmore-block',
        get_versioned_asset_path('blockReadMore.js'),
        [ 'wp-blocks', 'wp-i18n' ],
        '1.0.0',
        true
    );
    inline_locale_data('clabs-block-readmore-block');

}

/**
 * Get the version for a given asset.
 *
 * @param  string $asset_path Entry point and asset type separated by a '.'.
 * @return string The asset version.
 */
function get_versioned_asset_path( $asset_path )
{
    static $asset_map;

    // Create public path.
    $base_path = plugins_url('build/', __DIR__);

    if (! isset($asset_map) ) {
        $asset_map_file = dirname(__DIR__) . '/build/assetMap.json';
        if (file_exists($asset_map_file) && 0 === validate_file($asset_map_file) ) {
            ob_start();
            include $asset_map_file; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.IncludingFile, WordPressVIPMinimum.Files.IncludingFile.UsingVariable
            $asset_map = json_decode(ob_get_clean(), true);
        } else {
            $asset_map = [];
        }
    }

    /*
    * Appending a '.' ensures the explode() doesn't generate a notice while
    * allowing the variable names to be more readable via list().
    */
    list( $entrypoint, $type ) = explode('.', "$asset_path.");
    $versioned_path            = isset($asset_map[ $entrypoint ][ $type ]) ? $asset_map[ $entrypoint ][ $type ] : false;

    if ($versioned_path ) {
        return $base_path . $versioned_path;
    }

    return '';
}

/**
 * Creates a new Jed instance with specified locale data configuration.
 *
 * @param string $to_handle The script handle to attach the inline script to.
 */
function inline_locale_data( string $to_handle )
{
    // Define locale data for Jed.
    $locale_data = [
    '' => [
    'domain' => 'clabs',
    'lang'   => is_admin() ? get_user_locale() : get_locale(),
    ],
    ];

    // Pass the Jed configuration to the admin to properly register i18n.
    wp_add_inline_script(
        $to_handle,
        'wp.i18n.setLocaleData( ' . wp_json_encode($locale_data) . ", 'clabs' );"
    );
}
