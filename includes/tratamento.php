<?php 

date_default_timezone_set('America/Sao_Paulo');

$msg = filter_input(INPUT_GET, "msg", FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_GET, "time", FILTER_SANITIZE_STRING);

if($msg != '') {
    echo strip_tags($msg);
}else if($time != ''){
    echo date('H:i:s');
}