<!-- Predict Output Without Execution -->
$array = [1, 2, 3, 4];
foreach ($array as &$value) {
 $value *= 2;
}

foreach ($array as $value) {
 echo $value. ' ';
}

=> Question: What is the output of this code? Explain why.

first step loop chalega to $array[0] => 1 * 2 = 2.
second step loop chaleag to $array[1] => 2 *2 = 4.
Third step me $array[2] => 2*3 = 6.
forth step me $array[3] => 2*4 = 8.