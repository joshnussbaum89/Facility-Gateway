<?php

/***
 * PHP question #1
 ***/

/**
 * Greeting function that takes one argument - $greeting
 * If $greeting is true return "Hello"
 * If $greeting is false or a parameter isn't passed to the function, return "Goodbye"
 */
function helloGoodbye(bool $greeting = null)
{
    if ($greeting) {
        echo "Hello";
    } else {
        echo "Goodbye";
    }
}

helloGoodbye();

/***
 * PHP question #2
 ***/

class MatchSticks
{
    public $matchCount = 0;

    public function matchDiscovered()
    {
        // Increment matchCount
        $this->matchCount++;
        // If matchCount reaches 7, print "light a fire" and reset matchCount to 0
        if ($this->matchCount >= 7) {
            echo "Light a fire.";
            $this->matchCount = 0;
        }
    }

    // Retrieve matchCount
    public function getMatchCount()
    {
        return $this->matchCount;
    }
}

// Create MatchSticks class
$matchStickInstance = new MatchSticks;

// Increment matchCount to 7
for ($i = 0; $i < 7; $i++) {
    $matchStickInstance->matchDiscovered();
}

// Retrieve matchCount
echo $matchStickInstance->getMatchCount();

/***
 * PHP question #3
 ***/

$haystack = 'abcdefghijklmnopqrstuvwxy';
$needles = array('z', 'g', 'a', 'r');

/**
 * Prints "$needle found" if the $needle is found in $haystack
 * strpos() returns a non-boolean value that may return 'false' such as '0'
 * To fix this bug, the conditional needs to check to make sure the position of $needle is not '0'
 */
foreach ($needles as $needle) {
    if (!strpos($haystack, $needle) && strpos($haystack, $needle) !== 0) {
        echo "$needle is NOT found in $haystack &lt;br/&gt;";
    } else {
        echo "$needle found in $haystack &lt;br/&gt;";
    }
}

/***
 * PHP question #4
 ***/

$csvData = 'a,b,c,"d,e",f,g';

/**
 * Parses a CSV string by delimiter
 * @param string $csv Comma Separated Values string
 * @param string $delimiter Comma ','
 * @return array Indexed elements
 */
function parseCSV($csv, $delimiter)
{
    $parsedArray = str_getcsv($csv, $delimiter);

    // Printed array
    return print_r($parsedArray);
}

parseCSV($csvData, ',');

// SAMPLE OUTPUT
/*
Array
(
[0] => a
[1] => b
[2] => c
[3] => d,e
[4] => f
[5] => g
)
 */

/***
 * PHP question #5
 ***/

$highTemps = array(
    68, 70, 72, 58, 60, 79, 82, 73, 75, 77, 73, 58, 63, 79, 78,
    68, 72, 73, 80, 79, 68, 72, 75, 77, 73, 78, 82, 85, 89, 83,
);

/**
 * Takes an array of temperatures and performs calculations.
 * @param array Array of high temperatures
 * @return mixed Two arrays of highest five and lowest five temperatures and the average of all temperatures.
 */
function averageTemps($temps)
{
    // Length of temperature array
    $tempLength = count($temps);
    // Temperature average rounded to nearest integer
    $averageTemp = ceil(array_sum($temps) / $tempLength);

    // Sort temperatures in ascending order
    sort($temps);
    $ascendingTempArray = [];

    // Loop through and echo sorted temps
    for ($i = 0; $i < $tempLength; $i++) {
        array_push($ascendingTempArray, $temps[$i]);
    }

    // Sort temperatures in descending order
    rsort($temps);
    $descendingTempArray = [];

    // Loop through and echo sorted temps
    for ($i = 0; $i < $tempLength; $i++) {
        array_push($descendingTempArray, $temps[$i]);
    }

    // Get highest five temperatures
    $highestFiveTemps = array_slice($ascendingTempArray, count($ascendingTempArray) - 5);
    // Get lowest five temperatures
    $lowestFiveTemps = array_slice($descendingTempArray, count($descendingTempArray) - 5);

    // Return highest five temps, lowest five temps and average temp
    print_r($highestFiveTemps);
    print_r($lowestFiveTemps);
    print_r($averageTemp);
}

averageTemps($highTemps);

/*

Highest Temperatures:
Array
(
[0] => 82
[1] => 82
[2] => 83
[3] => 85
[4] => 89
)

Lowest Temperatures:
Array
(
[0] => 68
[1] => 63
[2] => 60
[3] => 58
[4] => 58
)

Average Temperature:
74
 */
