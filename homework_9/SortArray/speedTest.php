<?php

include 'QuickSort.php';
include 'QuickSortLesson.php';
include 'Bubble.php';
include 'randArray.php';
include 'Heapsort.php';
include 'insertSort.php';
include 'PigeonholeSort.php';
include 'MergeSort.php';
include 'InsertSortSPL.php';
include 'HeapSplSort.php';
include 'DualSelectSort.php';
include 'CombSort.php';

function getArr(): array
{
    return _randArray(1000000);
}

$arr = getArr();
$lastIndex = count($arr) - 1;

//$start = microtime(true);
//bubbleSort($arr);
//echo "Сортировка пузырьком: ".( microtime(true) - $start).PHP_EOL;

//$arr = getArr();
//$start = microtime(true);
//insertion_sort($arr);
//echo "Сортировка вставками: ".( microtime(true) - $start).PHP_EOL;

//$arr = getArr();
//$start = microtime(true);
//combSort($arr);
//echo "Сортировка расческой: ".( microtime(true) - $start).PHP_EOL;

//$start = microtime(true);
//insertion_sort($arr);
//echo "Сортировка вставками сорт. массива: ".( microtime(true) - $start).PHP_EOL;

//$arr = getArr();
//$start = microtime(true);
//mergeSort($arr);
//echo "Сортировка слиянием: ".( microtime(true) - $start).PHP_EOL;

//$arr = getArr();
//$start = microtime(true);
//heapSort($arr);
//echo "Сортировка пирамидальная: ".( microtime(true) - $start).PHP_EOL;

//$arr = getArr();
//$start = microtime(TRUE);
//treeSort($arr);
//echo "Сортировка пирамидальная SPL: " . (microtime(TRUE) - $start) . PHP_EOL;

//$arr = getArr();
//$start = microtime(TRUE);
//quickSortLesson($arr);
//echo "Сортировка быстрая наша: " . (microtime(TRUE) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(TRUE);
quickSort($arr, 0, $lastIndex);
echo "Сортировка быстрая чужая: " . (microtime(TRUE) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(TRUE);
sort($arr);
echo "Сортировка из PHP: " . (microtime(TRUE) - $start) . PHP_EOL;

//$arr = getArr();
//$start = microtime(true);
//dualSelectSort($arr);
//echo "Сортировка выбором: ".( microtime(true) - $start).PHP_EOL;

//$arr = getArr();
//$start = microtime(true);
//pigeonholeSort($arr);
//echo "Сортировка голубиная: ".( microtime(true) - $start).PHP_EOL;
