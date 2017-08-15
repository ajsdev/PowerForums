<?php session_start();
$enum = [
  "root"=>$_SERVER["DOCUMENT_ROOT"],
  "lib"=>$_SERVER["DOCUMENT_ROOT"]."/lib"
];

foreach($enum as $k => $v) define($k, $v);

$load = function($dir = lib."/*") use (&$load) {
  foreach(glob($dir) as $content){
    if(is_dir($content)) {
      $load($content."/*");
      continue;
    }
    if(strtolower(pathinfo($content)["extension"]) == "php") 
      include $content;
  }
}
$load();
