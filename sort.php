<?php

//Write a function that sorts 11 small numbers (<100) as fast as possible. Estimate how long it would take to execute that function 10 Billion (10^10) times on a normal machine?

$unsorted_array = array(21,2,1,9,24,2,99,23,8,7,92); 

function quick_sort($array) { 	

$length = count($array); 	 
	 	
if($length <= 1){ 		
  return $array; 	
  
}else{ 	 		
 		
$pvt = $array[0]; 
 		
$left = $right = array(); 		 		
 		
for($i = 1; $i < count($array); $i++){ 
  if($array[$i] < $pvt){ 				
  $left[] = $array[$i]; 			
}else{ 				
  $right[] = $array[$i]; 			
  } 		
} 		

	return array_merge(quick_sort($left), array($pvt), quick_sort($right)); 	} 

}


$sorted = quick_sort($unsorted_array); 
var_dump($sorted); 

//It would take 10000 to 13600 min to run this function 10 billion times on a normal machine


