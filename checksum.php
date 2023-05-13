<?php
$folder = '/xampp/htdocs/hostelAllocationManagement';
$hashes =  array();
foreach (glob("$folder/*.php")as $file){
    $hash = hash_file('sha256', $file);
    $hashes[$file] = $hash;
}
foreach ($hashes as $file => $hash){
    echo "checksum for $file: $hash <br>";
}
?>