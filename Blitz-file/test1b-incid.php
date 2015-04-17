<?php

$time_start = microtime(true);
for ( $n=0; $n <= 100000; ++$n ) {
	$bl = new Blitz ('./tpl/test1b-incid.tpl');
	$vars['id'] = "divid$n";
	$vars['body'] = 'my div\'s body';
	$html = $bl->parse ($vars);
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";


