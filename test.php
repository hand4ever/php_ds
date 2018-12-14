<?php
$q = new SplStack();
$q[] = 1;
$q[] = 2;

var_dump($q);

$int = new SplInt(94);
echo $int;

exit;
$array = range(1, 100000);

function dummy($array) {}

$i = 0;
$start = microtime(true);
while($i++ < 100) {
    dummy($array);
}

printf("Used %sS\n", microtime(true) - $start);

$b = &$array; //注意这里, 假设我不小心把这个Array引用给了一个变量
$i = 0;
$start = microtime(true);
while($i++ < 100) {
    dummy($array);
}
printf("Used %ss\n", microtime(true) - $start);
exit;
/*$bar = 1;
$baz = 2;
function foo($var)
{
	$var = 3;
	echo $GLOBALS["baz"],PHP_EOL;
	$var = $GLOBALS["baz"];
}
foo($bar);
var_dump($bar);
__halt_compiler();
exit;
*/
class A {
	public $foo = 1;
}
$a = new A;
$b = $a;
xdebug_debug_zval('a');
xdebug_debug_zval('b');
$b->foo = 2;
unset($b);
xdebug_debug_zval('a');
//xdebug_debug_zval('b');
echo $a->foo, PHP_EOL;

$c = new A;
echo gettype($c);
$d = &$c;
echo gettype($c);
xdebug_debug_zval('c');
xdebug_debug_zval('d');
$d->foo = 2;
unset($d);
xdebug_debug_zval('c');

echo $c->foo,PHP_EOL;

$e = new A;

function foo($obj) {
	$obj->foo = 2;
}
foo($e);

echo $e->foo, PHP_EOL;
