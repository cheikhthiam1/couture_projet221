<?php

namespace App\Core;

class Router
{

 private static array $route = [];

 public static function route(string $uri, array $controller)
 {
  self::$route[$uri] = $controller;
 }

 public static function resolve()
 {
  $uri = $_SERVER['REQUEST_URI'];
 
  if (isset(self::$route[$uri])) {
   [$ctrlClass, $action] = self::$route[$uri];
   if (class_exists($ctrlClass) && method_exists($ctrlClass, $action)) {
    $ctrl = new $ctrlClass;
    $ctrl->{$action}();
   } else {
    dd("Erreur Class ou Methode");
   }
  }
 }
}
