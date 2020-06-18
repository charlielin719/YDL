<?php


function httpGet($url){
    $res = file_get_contents($url);
    return $res;
}