<?php
/**
 * Created by PhpStorm.
 * User: kevinrichard
 * Date: 12/19/17
 * Time: 5:17 PM
 */


namespace Strings;

class Str
{
    use camelcase;
    use snakecase;
    use slugcase;
    use kebabcase;
    use studlycase;
    use titlecase;

    private $strg;


    //Méthode magique permettant de transformer l'objet en string.
    public function __toString()
    {
        return $this->toString();
    }

    public function toString(){
        return $this->strg;
    }

    //Initie l'objet à la variable $strg
    public function __construct($strg)
    {
        $this->strg = $strg;
    }


    public function reset()
    {
        $str = $this->strg;
        return new self($str);
    }

    //Crée un nouvel objet Str en static
    public static function on($strg)
    {
        return new self($strg);
    }

    //Remplace un mot par un autre mot
    public function replace ($search, $replace)
    {
        $str = str_replace($search, $replace, $this->strg);
        return new self($str);
    }

    //Première lettre des mots en maj
    public function ucwords()
    {
        $str = ucwords($this->strg);
        new self($str);
    }

    //Première lettre des mots en min
    public function lcfirst()
    {
        $str = lcfirst($this->strg);
        new self($str);
    }

    public static function __callStatic($name, $arguments)
    {
        $method = (string) Str::on($name)->replace('to', '')->lcfirst();
        return (string) Str::on($arguments[0])->{$method}();
    }

    public function strtolower()
    {
        $str = strtolower($this->strg);
        new self($str);
    }


    public function __get($nom)
    {
        $method = (string) Str::on($name)->lcfirst();
        $str = $this->{$method}()->toString();
        return $str;
    }

   /*methode magique exo7  public function __invoke()
    {
        $str = $this->toString();
        return $str;
    }
   */


}