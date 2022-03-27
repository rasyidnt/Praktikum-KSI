<?php
function setupkey() //proses pengacakan kunci di SBox
{
echo "<br>";
$kce = $_GET["kcenkripsi"];
echo "Kunci enkripsi = $kce";
echo "<br>";
for($i=0;$i<strlen($kce);$i++)
{
$key[$i]=ord($kce[$i]); //rubah ASCII ke desimal
}
global $m;
$m=array();
// buat encrpyt
for($i=0;$i<256;$i++){
$m[$i] = $i;
}
$j = $k = 0;
for($i=0;$i<256;$i++)
{
$a = $m[$i];
$j = ($j + $m[$i] + $key[$k]) % 256;
$m[$i] = $m[$j];
$m[$j] = $a;
$k++;
if($k>15)
{
$k=0;
}
}
} //akhir function

function crypt2($inp)
{
global $m;
$x=0;$y=0;
$bb='';
$x = ($x+1) % 256;
$a = $m[$x];
$y = ($y+$a) % 256;
$m[$x] = $b = $m[$y];
$m[$y] = $a;
//proses XOR antara plaintext dengan kunci
//dengan $inp sebagai plaintext
//dan $m sebagai kunci
$bb= ($inp^$m[($a+$b) % 256]) % 256;
return $bb;
}

setupkey();
 $kalimat = $_GET["kata"];
 for($i=0;$i<strlen($kalimat);$i++)
 {
 $kode[$i]=ord($kalimat[$i]); //rubah ASCII ke desimal
 $b[$i]=crypt2($kode[$i]); //proses enkripsi RC4
 $c[$i]=chr($b[$i]); //rubah desimal ke ASCII
 }
 echo "kalimat ASLI : ";
 for($i=0;$i<strlen($kalimat);$i++)
 {
 echo $kalimat[$i];
 }
 echo "<br>";
 echo "hasil enkripsi =";
 $hsl = '';
 for ($i=0;$i<strlen($kalimat);$i++)
 {
 echo $c[$i];
 $hsl = $hsl . $c[$i];
 }
 echo "<br>";
 //simpan data di file
 $fp = fopen ("enkripsirc4.txt","w");
 fputs ($fp,$hsl);
 fclose($fp); 
 ?>