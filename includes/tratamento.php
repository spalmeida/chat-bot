<?php 

$msg = filter_input(INPUT_GET, "msg", FILTER_SANITIZE_STRING);
echo strip_tags($msg.'---beterraba2');