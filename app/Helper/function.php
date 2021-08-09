<?php

function adminasset($assetlink){
    return asset('admin/'.$assetlink);
}

function isactive($url)
{
   return  Request::is('.$url.') ? 'active' :''; 
}

?>