<?php
require_once '../lib/lightncandy/src/lightncandy.php';

$phpStr = LightnCandy::compile( '<div id="{{ id }}">{{ body }}</div>' );
$php_inc = './tpl_c/' . substr( basename( __FILE__ ), 0, -4 ) . '.cache.php';
file_put_contents($php_inc, LightnCandy::prepareFile ($phpStr));

$time_start = microtime(true);
for ( $n=0; $n <= 100000; ++$n ) {
	$vars['id'] = "divid$n";
	$vars['body'] = 'my div\'s body';
	$renderer = include($php_inc);
	$html = $renderer( $vars );
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";

