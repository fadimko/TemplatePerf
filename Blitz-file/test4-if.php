<?php

$time_start = microtime(true);
for ( $n=0; $n <= 100000; ++$n ) {
	$bl = new Blitz ('./tpl/test4-if.tpl');
	$vars['true'] = 1;
	$vars['false'] = 0;
	$html = $bl->parse ($vars);
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";
