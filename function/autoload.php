
<?php

foreach (glob("function_*.php") as $filename)
{
  include $filename;
}