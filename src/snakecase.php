<?php

namespace Strings;


trait snakecase
{
    public function snakeCase()
    {
        if (preg_match("/[-,_, ]+/", $this->strg) === 1){
            return $this
                ->replace('-', ' ')
                ->ucwords()
                ->replace(' ', '_')
                ->strtolower();
        }
        else{
            $patern ="/(.)(?=[A-Z])/";
            $this->strg = preg_replace($patern, '$1_',$this->strg);
            return $this
                ->strtolower();
        }
    }
}