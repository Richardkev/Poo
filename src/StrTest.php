<?php
/**
 * Created by PhpStorm.
 * User: kevinrichard
 * Date: 12/19/17
 * Time: 6:00 PM
 */



namespace Strings;

use PHPUnit\Framework\TestCase;
require ('String.php');
class StrTest extends TestCase
{
    public function testExo1()
    {

        $str = (string) Str::on('my_string')
            ->replace('_', ' ')
            ->ucwords()
            ->replace(' ', '')
            ->lcfirst();

        $this->assertSame('myString', $str);
    }

}