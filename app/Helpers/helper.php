<?php 

function make_slug($string)//in helper ke khodam sakhtam bayad be laravel moarefi shavad tavasot file compeser.json
{
   return preg_replace('/\s+/u','-',trim($string));

}