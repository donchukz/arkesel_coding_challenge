<?php

namespace App\Helpers;

class ArrayHelper
{
    /**
     * Rotate an integer array to the right by k positions.
     *
     * @param array $arr The integer array to rotate
     * @param int $k The number of positions to rotate the array by
     */
    public static function rotateArray(array &$arr, int $k)
    {
        $n = count($arr); // Get the length of the array
        $k = $k % $n; // If k is greater than n, reduce it to its equivalent value less than n
        self::reverseArray($arr, 0, $n - $k - 1); // Reverse the first n - k elements
        self::reverseArray($arr, $n - $k, $n - 1); // Reverse the remaining k elements
        self::reverseArray($arr, 0, $n - 1); // Reverse the entire array
    }

    /**
     * Reverse the elements of an integer array between start and end indices (inclusive) in place.
     *
     * @param array $arr The integer array to reverse
     * @param int $start The start index of the range to reverse
     * @param int $end The end index of the range to reverse
     */
    private static function reverseArray(array &$arr, int $start, int $end)
    {
        while ($start < $end) {
            $temp = $arr[$start]; // Store the value at the start index in a temporary variable
            $arr[$start] = $arr[$end]; // Replace the value at the start index with the value at the end index
            $arr[$end] = $temp; // Replace the value at the end index with the value stored in the temporary variable
            $start++; // Increment the start index
            $end--; // Decrement the end index
        }
    }
}
