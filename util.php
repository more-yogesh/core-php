<?php

function base_url($fileNames){
    return "http://".$_SERVER['HTTP_HOST']."/crude/".$fileNames;
}
