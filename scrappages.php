<?php

// functions to cut strings

function cutFromTo($startString,$endString,$sourceCode)
{
	$from = strpos($sourceCode,$startString);
	$result = substr($sourceCode,$from + strlen($startString));
	$to = strpos($result,$endString);
	$result = substr($result,0,$to);
	
return $result;	
}


function cutFrom($startString,$sourceCode)
{
	$from = strpos($sourceCode,$startString);
	$result = substr($sourceCode,$from + strlen($startString));
return $result;	
}

//functions to cut strings end


$pageSourceCode = file_get_contents('https://www.hit.co.uk/games/pg828/playstation.htm?orderresult0=3&pgresult0=5');

const LINK_CLASS = 'class="pl-tile"';
const LINK_START = 'href="';
const LINK_END = '">';
$productsCount = substr_count($pageSourceCode, LINK_CLASS);

for($i=0;$i<=$productsCount-1;$i++){

    $pageSourceCode = cutFrom(LINK_CLASS,$pageSourceCode);  
    $link[$i] = 'https://www.hit.co.uk/'.cutFromTo(LINK_START,LINK_END,$pageSourceCode);
    echo '<br/>'.$link[$i];
}
