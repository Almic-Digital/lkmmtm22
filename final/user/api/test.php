<?php
//echo time();
date_default_timezone_set("Asia/Jakarta");
echo date("Y-m-d H:i:s");
echo " ";
if(date("Y-m-d H:i:s") >= "2022-01-18 10:00:00"){
    echo "berhasil";
}else{
    echo "gagal";
}
?>