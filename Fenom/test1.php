<?php
require_once __DIR__.'/../lib/Fenom/Fenom.php';
Fenom::registerAutoload();
$vars=array();

$time_start = microtime(true);
for ( $n=0; $n <= 100000; ++$n ) {
    $vars['id'] = "divid";
    $vars['body'] = 'my div\'s body';
    $fenom = Fenom::factory(__DIR__.'/tpl', __DIR__.'/tpl_c');
    $html = $fenom->fetch ("test1.tpl", $vars);
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";