<?php

class Slide
{
    private string $html;
    private static $total = 0;
    private static $list = [];
    protected Language $language;

    function __construct($html)
    {
        $this->html = $html;
        $this->index = self::$total;
        self::$total++;
        global $english;
        $this->language = $english;
        array_push(self::$list, $this);
    }

    public function GetSlideFromIndex($index)
    {
        return self::$list[$index]->GetSlide();
    }

    public function GetSlide(): string
    {
        return $this->getLanguage()->Translate($this->html);
    }

    public static function GetNumberOfSlides(): int
    {
        return sizeof(self::$list);
    }

    public function getLanguage()
    {
        return $this->language;
    }
};

class Language
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
        return str_replace($this->englishwords, $this->translatedwords, $input);
    }
}

$languages = [];

$english = new Language([], []);

$spanish = new Language(
    [">", "</", "e ", "es"],
    [">¡", "!</", "os ", "os"]
);


class Spanishslide extends Slide
{
    public function __construct($html)
    {
        parent::__construct($html);
        global $spanish;
        $this->language = $spanish;
    }
}
