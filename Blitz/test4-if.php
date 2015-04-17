<?php

$time_start = microtime(true);
for ( $n=0; $n <= 100000; ++$n ) {
	$bl = new Blitz ();
	$bl->load ('<div id="If">{{ IF $true }}<p>True.</p>{{ END }}{{ IF $false }}<p>False.</p>{{ END }}</div>');
	$vars['true'] = 1;
	$vars['false'] = 0;
	$html = $bl->parse ($vars);
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";
