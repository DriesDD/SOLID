<?php

class Slide
{
    private string $html;
    private static $total = 0;
    private static $list = [];

    function __construct($html)
    {
    $this->html = $html;
    $this->index = self::$total;
    self::$total++;
    array_push(self::$list,$this);
    }

    public function GetSlideFromIndex($index)
    {
     return self::$list[$index]->GetSlide();
    }

    public function GetSlide() : string
    {
     if (get_class($this) == 'Spanishslide')
     {echo('set');
        return $this->getLanguage()->Translate($this->html);
      }
     else
      {
        echo('not set');
        return $this->html;
       }
    }

    public static function GetNumberOfSlides() : int
    {
     return sizeof(self::$list);
    }
};

Class Language
{
    private array $englishwords;
    private array $translatedwords;

    public function __construct(array $englishwords, array $translatedwords)
    {
        $this->englishwords = $englishwords;
        $this->translatedwords = $translatedwords;
    }

    public function Translate($input)
    {
     return str_replace($this->englishwords, $this->translatedwords,$input);
    }

}

$languages = [];

$english = new Language([],[]);

$spanish = new Language([">", "</", "e ", "es"],
                        [">¡", "!</", "os ","os"]);


class Spanishslide extends Slide
{private Language $language;

    public function __construct($html)
    {
        parent::__construct($html);
        global $spanish;
        $this->language = $spanish;

    }

public function getLanguage()
{
return $this->language;
}

}