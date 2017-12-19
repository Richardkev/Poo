<?php

namespace Strings;


trait titleCase
{
    public function titleCase(){
        return $this
            ->studlyCase();
    }
}