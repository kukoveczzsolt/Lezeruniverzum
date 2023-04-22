<?php

function category($kategoriaNev, $kategoriaID)
{
    $element = "
    <li class=\"nav-item\">
    <button class=\"btn btn-light\" type=\"submit\" form=\"form1\" value=\"$kategoriaID\">$kategoriaNev</button>
    </li>";
  echo $element;
}
?>