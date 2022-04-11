<?php
@$url = $_REQUEST['url'];
@$ico = $_REQUEST['ico'];
if($url and $ico){
    echo 'a';
}elseif($url and !$ico){
    echo 'b';
}else{
    echo 'c';
}