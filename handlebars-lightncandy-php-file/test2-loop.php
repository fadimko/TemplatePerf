<?php
require_once '../lib/lightncandy/src/lightncandy.php';



$items = array();
for ( $n=0; $n <= 1000; ++$n ) {
	$items['a'.mt_rand()] = time();
}

// Rendered PHP of template
$phpStr = LightnCandy::compile( '<div id="{{ id }}">{{# m_items }}<div id="{{ key }}">{{ val }}</div>{{/ m_items }}</div>' );
// Store the template...
// Method 1 (preferred):
$php_inc = './tpl_c/' . substr( basename( __FILE__ ), 0, -4 ) . '.cache.php';
file_put_contents($php_inc, $phpStr);
//$renderer = include($php_inc);
// Method 2 (potentially insecure):
$renderer = LightnCandy::prepare( $phpStr );

$time_start = microtime(true);
for ( $n=0; $n <= 1000; ++$n ) {
    $key = array_rand( $items );
    $items[$key] = 'b'.mt_rand();
	$vars['id'] = "divid";
	$vars['body'] = 'my div\'s body';
    $m_items = array();
	foreach ( $items as $key => $val ) {
		$m_items[] = array( 'key'=>$key, 'val'=>$val );
	}
	$vars['m_items'] = $m_items;
	$renderer = include($php_inc);
	$html = @$renderer( $vars );
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";

