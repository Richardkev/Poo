<?php

namespace Strings;


trait slugCase
{
    public function slugCase()
    {
        if (preg_match("/[-,_, ]+/", $this->strg) === 1){
            return $this
                ->replace('_', ' ')
                ->ucwords()
                ->replace(' ', '-')
                ->strtolower();
        }
        else{
            $patern ="/(.)(?=[A-Z])/";
            $this->strg = preg_replace($patern, '$1-',$this->strg);
            return $this
                ->strtolower();
        }
    }
}