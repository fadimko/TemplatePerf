<?php

$items = array();
for ( $n=0; $n <= 1000; ++$n ) {
    $items['a'.mt_rand()] = time();
}

$time_start = microtime(true);
for ( $n=0; $n <= 1000; ++$n ) {
    $key = array_rand( $items );
    $items[$key] = 'b'.time();
    #$vars['items'] = $items;
    $vars['id'] = "divid";
    $vars['body'] = 'my div\'s body';
    $m_items = array();
    foreach ( $items as $key => $val ) {
        $m_items[] = array( 'key'=>$key, 'val'=>$val );
    }
    $vars['m_items'] = $m_items;

    $bl = new Blitz ('./tpl/test2-loop.tpl');
    $html = $bl->parse ($vars);
    echo "$html\n\n";
}
echo "time: " . ( microtime(true) - $time_start ) . "\n";
#echo "$html\n";

