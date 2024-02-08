<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function numSquares($n)
    {
        if ($n <= 0) {
            return 0;
        }

        // Initialize an array to store the least number of perfect square numbers for each value from 1 to n
        $dp = array_fill(0, $n + 1, PHP_INT_MAX);
        // Base case: The least number of perfect square numbers to sum to 0 is 0
        $dp[0] = 0;

        // Iterate through each number from 1 to n
        for ($i = 1; $i <= $n; $i++) {
            // Iterate through each perfect square less than or equal to $i
            for ($j = 1; $j * $j <= $i; $j++) {
                // Update the least number of perfect square numbers for $i
                $dp[$i] = min($dp[$i], $dp[$i - $j * $j] + 1);
            }
        }

        // The result is stored in $dp[$n]
        return $dp[$n];
    }
}

$solution = new Solution();
$result = $solution->numSquares(13);
echo $result;