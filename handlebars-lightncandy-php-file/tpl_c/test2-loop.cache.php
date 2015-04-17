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
    ob_start();echo '<div id="',htmlentities((is_array($in) ? $in['id'] : null), ENT_QUOTES, 'UTF-8'),'">',LCRun2::sec((is_array($in) ? $in['m_items'] : null), $cx, $in, false, function($cx, $in) {echo '<div id="',htmlentities((is_array($in) ? $in['key'] : null), ENT_QUOTES, 'UTF-8'),'">',htmlentities((is_array($in) ? $in['val'] : null), ENT_QUOTES, 'UTF-8'),'</div>';}),'</div>';return ob_get_clean();
}
?>