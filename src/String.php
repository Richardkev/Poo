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


    //Crée un nouvel objet Str en static
    public static function on($strg)
    {
        return new Str($strg);
    }

    //Remplace un mot par un autre mot
    public function replace ($search, $replace)
    {
        $this->strg = str_replace($search, $replace, $this->strg);
        return $this;
    }

    //Première lettre des mots en maj
    public function ucwords()
    {
        $this->strg = ucwords($this->strg);
        return $this;
    }

    //Première lettre des mots en min
    public function lcfirst()
    {
        $this->strg = lcfirst($this->strg);
        return $this;
    }

    public static function __callStatic($name, $arguments)
    {
        $method = (string) Str::on($name)->replace('to', '')->lcfirst();
        return (string) Str::on($arguments[0])->{$method}();
    }

    public function strtolower()
    {
        $this->strg = strtolower($this->strg);
        return $this;
    }
}