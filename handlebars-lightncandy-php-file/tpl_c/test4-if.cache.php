<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    ob_start();echo '<div id="If">';if (LCRun2::ifvar((is_array($in) ? $in['true'] : null))){echo '<p>True.</p>';}else{echo '';}echo '';if (LCRun2::ifvar((is_array($in) ? $in['false'] : null))){echo '<p>False.</p>';}else{echo '';}echo '</div>';return ob_get_clean();
}
?>