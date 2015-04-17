<?php

require '../lib/Smarty/Smarty.class.php';

function newSmarty () {
    $s = new Smarty;
    $s->setTemplateDir ("./tpl");
    $s->setCompileDir ("./tpl_c");
    $s->setCacheDir ("./cch");
    //$s->caching = true;
    return $s;
}

$s = newSmarty ();
$s->compileAllTemplates();

$time_start = microtime(true);
for ( $n=0; $n <= 100000; ++$n ) {
    $s = newSmarty ();
    $s->assign ('id', "divid");
    $s->assign ('body', 'my div\'s body');
    $html = $s->fetch ('test1.tpl');
}
echo "\ntime: " . ( microtime(true) - $time_start ) . "\n";
echo "$html\n";
