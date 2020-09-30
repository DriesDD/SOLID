<?php

class Slide
{
    private string $html;
    private int $index;

    private static $total = 0;
    private static $list = [];

    public function __construct($html)
    {
    $this->html = $html;
    $this->index = self::$total;
    self::$total++;
    array_push(self::$list,$this);
    }

    public static function GetSlide($index) : string
    {
     $html = self::$list[$index]->html;
     //$html = translateToSpanish($html);
     return $html;
    }
    
    public function translateToSpanish($input)
    {
    $notSpanish = array(">", "</", "e ", "es");
     $spanish    = array(">¡", "!</", "os ","os");
     $html = str_replace($notSpanish, $spanish, $html);
    }

    public static function GetNumberOfSlides() : int
    {
     return sizeof(self::$list);
    }

}