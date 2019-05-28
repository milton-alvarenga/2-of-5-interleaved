<?php
function Code25I($chaine, $key){
    $code = '';
    if (strlen($chaine) > 0){
        for($i=0; $i < strlen($chaine); ++$i){
            if (ord(substr($chaine, $i, 1)) < 48 || ord(substr($chaine, $i, 1)) > 57) return '';
        }
        if ($key){
            $checksum = 0;
            for($i=strlen($chaine)-1; $i >= 0; $i-=2) $checksum += intval(substr($chaine, $i, 1));
            $checksum *= 3;
            for($i=strlen($chaine)-2; $i >= 0; $i-=2) $checksum += intval(substr($chaine, $i, 1));
            $checksum = (10 - $checksum % 10) % 10;
            $chaine .= $checksum;
        }
        if (strlen($chaine) % 2 > 0) return '';
        for ($i=0; $i < strlen($chaine); $i+=2){
            $dummy = intval(substr($chaine, $i, 2));
            $dummy = $dummy < 94 ? $dummy + 33 : $dummy + 101;
            $code .= chr($dummy);
        }
        $code = chr(201) . $code . chr(202);
    }
    return $code;
}
?>
