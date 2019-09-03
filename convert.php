<?php

#copy_all_lines(666);
remove_faulty_lines('ptrac3344027109318363692','ptrac3344027109318363692_out.csv',200);



function copy_all_lines($position) {
$keimena = glob("path/*.txt");
foreach($keimena as $keimeno_fname) {
$keimeno =  file_get_contents($keimeno_fname);
$grammes = explode("\n", $keimeno);
$grammi = $grammes[$position];
file_put_contents("teliko_keimeno.txt", $grammi, FILE_APPEND);
}
}
 
function remove_faulty_lines($file_in,$file_out,$threshold){
  if ($fh = fopen($file_in, 'r')) {
    $fg = fopen("$file_out", "w");
      while (!feof($fh)) {
          $line = fgets($fh);
          $numbers = explode(" ", trim($line));
          $l_array=array();
          $tot = 0;
          foreach ($numbers as &$number)
          {
            if ($number != '') {
              $tot = $number+$tot;
              array_push($l_array,floatval($number));
            }

          }
          if ($tot > $threshold) {
          fwrite($fg, implode(",",$l_array));
          fwrite($fg, "\n");
        }
      }
      fclose($fh);
      fclose($fg);
  }

}
?>
