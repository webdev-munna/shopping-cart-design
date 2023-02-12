<?php

function component($props)
{
  $element = "
         <h2 style='color:green; text-align:center; margin-top:10px'>$props</h2>
    ";
  echo $element;
}
