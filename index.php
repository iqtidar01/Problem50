<?php

$limit = 1000000;

function get_primes($n){
    $primes=[false,false];
    for ($i = 2; $i < $n; $i++) {
        $primes[$i] = true;
    }

    for ($i = 2; $i*$i<$n;$i++) {
        if ($primes[$i]) {
            for ($j=$i*$i;$j<$n;$j+=$i) {
                $primes[$j] = false;
            }
        }
    }

    return $primes;
}

$primes=get_primes($limit);
$prime_array = [];
for ($i = 0; $i < sizeof($primes); $i++) {
    if ($primes[$i]) {
        $prime_array[]=$i;
    }
}
$count = 0;
$sum = 0;
$final_sum = 0;
$final_count = 0;
$total_primes = sizeof($prime_array);
for($start=0;$start<$total_primes;$start++) {
    $sum = 0;
    $count = 0;
    for ($index = $start; $index < $total_primes; $index++) {
        $actual = $prime_array[$index];
        $sum += $actual;
        if ( $sum >= $limit ) {
            break;
        }
        if ( $primes[$sum] ) {
            if ( $count > $final_count ) {
                $final_count = $count;
                $final_sum = $sum;
            }
        }
        $count++;
    }
}

echo "<br>Prime Number below one million that can be written as sum of the most consecutive primes is : $final_sum<br>";
exit;
?>
