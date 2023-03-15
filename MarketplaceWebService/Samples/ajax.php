<?php
$mainarray = array(); 
foreach (file('productfile.txt') as $row) { 
  $ar = explode("\t", $row); 
  $mainarray[] = array('item-name' => $ar[0], 'item-description' => $ar[1], 'listing-id' => $ar[2], 'seller-sku' => $ar[3], 'price' => $ar[4], 'quantity' => $ar[5]); 
} 

print_r($mainarray);?>