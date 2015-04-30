<?php
require_once '../lib/lightncandy/src/lightncandy.php';



$items = array();
for ( $n=0; $n <= 1000; ++$n ) {
	$items['a'.mt_rand()] = time();
}

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
$phpStr = LightnCandy::compile( '<div id="{{ id }}">{{# m_items }}<div id="{{ key }}">{{ val }}</div>{{/ m_items }}</div>' );
$renderer = eval ($phpStr);
	$html = @$renderer( $vars );
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";

