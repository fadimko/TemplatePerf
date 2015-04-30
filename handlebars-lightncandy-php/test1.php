<?php
require_once '../lib/lightncandy/src/lightncandy.php';

$time_start = microtime(true);
for ( $n=0; $n <= 100000; ++$n ) {
	$vars['id'] = "divid";
	$vars['body'] = 'my div\'s body';
$phpStr = LightnCandy::compile( '<div id="{{ id }}">{{ body }}</div>' );
$renderer = eval ($phpStr);
	$html = $renderer( $vars );
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";

