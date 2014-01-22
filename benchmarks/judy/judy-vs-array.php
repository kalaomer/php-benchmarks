<?php
  /**
   * Object hashing tests.
   */

ini_set('memory_limit','512M');
//ini_set("judy.string.maxlength", "1280000");

isset( $argv[1] ) ?
	$iterations = $argv[1]
	:
	$iterations = 100000;

isset( $argv[2] ) ?
	$data = eval( "return " . $argv[2] . ";" )
	:
	$data = rand() * rand() * 4;

isset( $argv[3] ) ?
	$judyType = $argv[3] //eval( "return JUDY::" . $argv[3] . ";" )
	:
	$judyType = "INT_TO_INT";

printf("\n==================\n\n".
	">Options\n\nIterations: %s\nData: %s\nJudy Type: %s\n", $iterations, var_export($data, true), $judyType);

// Create Judy Object
$sos = new \Judy( eval( "return JUDY::" . $judyType . ";" ) );

$start = $finis = 0;


// Load the Judy
$start = microtime(TRUE);
for ($i = 0; $i < $iterations; ++$i) {
	$sos[$i] = $data;
}
$finis = microtime(TRUE);

$time_to_fill = $finis - $start;

// Check membership on the object storage
$start = microtime(TRUE);
for ($i = 0; $i < $iterations; ++$i) {
	isset($sos[$i]);
}

$finis = microtime(TRUE);

$time_to_check = $finis - $start;

printf("\n==================\n\n>Judy\n\nTime to fill: %0.12f.\nTime to check: %0.12f.\nMemory: %d\n\n", $time_to_fill, $time_to_check, $sos->memoryUsage());

$mem_empty = memory_get_usage();

// Test arrays:
$start = microtime(TRUE);
$arr = array();

// Load the array
for ($i = 0; $i < $iterations; ++$i) {
	$arr[$i] = $data;
}
$finis = microtime(TRUE);

$time_to_fill = $finis - $start;

// Check membership on the array
$start = microtime(TRUE);
for ($i = 0; $i < $iterations; ++$i) {
	isset($arr[$i]);
}

$finis = microtime(TRUE);

$time_to_check = $finis - $start;
$mem_arr = memory_get_usage();

$mem_used = $mem_arr - $mem_empty;


printf("\n==================\n\n>Array\n\nTime to fill: %0.12f.\nTime to check: %0.12f.\nMemory: %d\n\n", $time_to_fill, $time_to_check, $mem_used);
?>