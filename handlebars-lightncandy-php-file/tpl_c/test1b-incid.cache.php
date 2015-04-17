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
    ob_start();echo '<div id="',htmlentities((is_array($in) ? $in['id'] : null), ENT_QUOTES, 'UTF-8'),'">',htmlentities((is_array($in) ? $in['body'] : null), ENT_QUOTES, 'UTF-8'),'</div>';return ob_get_clean();
}
?>