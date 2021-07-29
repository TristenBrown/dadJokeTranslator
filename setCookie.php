<?php
    //php code to track whether a user has called the language translator over 5 times (api blocks once over 5 calls per hour if free)
    $languageCount = empty($_COOKIE['languageCount']) ? 0 : $_COOKIE['languageCount'];
    if($languageCount == 6){
        echo $languageCount;
    }
    else{
        $languageCount = $languageCount + 1;
        setcookie('languageCount', $languageCount, time() + 3600);
        echo $languageCount; 
    }
?>