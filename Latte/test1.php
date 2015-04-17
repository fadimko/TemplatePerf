<?php

require_once __DIR__."/../lib/Latte/latte.php";

$time_start = microtime(true);
for ( $n=0; $n <= 100000; ++$n ) {
    $vars['id'] = "divid";
    $vars['body'] = 'my div\'s body';
    $latte = new Latte\Engine;
    $latte->setTempDirectory(__DIR__.'/tpl_c');
    $html = $latte->renderToString(__DIR__.'/tpl/test1.tpl', $vars);
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";