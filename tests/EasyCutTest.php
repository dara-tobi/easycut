<?php

namespace Tuvi\Tests;

use Tuvi\EasyCut;

class EasyCutTest extends \PHPUnit_Framework_TestCase
{
    protected function setup()
    {
        $this->easyCut = new EasyCut([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $this->deepEasyCut = new EasyCut([
            [
                'index' => 0,
                'position' => 'one',
                'type' => 'animal',
            ],
            [
                'index' => 1,
                'position' => 'two',
                'type' => 'song',
            ],
            [
                'index' => 2,
                'position' => 'three',
                'type' => 'building',
            ],
            [
                'index' => 3,
                'position' => 'four',
                'type' => 'tool',
            ],
            [
                'index' => 4,
                'position' => 'five',
                'type' => 'spice',
            ],
            [
                'index' => 5,
                'position' => 'six',
                'type' => 'plant',
            ],
            [
                'index' => 6,
                'position' => 'seven',
                'type' => 'car',
            ],
            [
                'index' => 7,
                'position' => 'eight',
                'type' => 'fruit',
            ]
        ]);
    }
    public function testArrayFromIndex()
    {
        $this->assertEquals($this->easyCut->arrayBeforeValue(4), [1, 2, 3]);
    }

    public function testArrayFromValue()
    {
        $this->assertEquals($this->easyCut->arrayFromValue(4), [4, 5, 6, 7, 8, 9, 10]);
    }

    public function testArrayAfterIndex()
    {
        $this->assertEquals($this->easyCut->arrayAfterIndex(4), [6, 7, 8, 9, 10]);
    }

    public function testArrayAfterValue()
    {
        $this->assertEquals($this->easyCut->arrayAfterValue(4), [5, 6, 7, 8, 9, 10]);
    }

    public function testArrayBeforeIndex()
    {
        $this->assertEquals($this->easyCut->arrayBeforeIndex(4), [1, 2, 3, 4]);
    }

    public function testArrayBeforeValue()
    {
        $this->assertEquals($this->easyCut->arrayBeforeValue(4), [1, 2, 3]);
    }

    public function testArrayToIndex()
    {
        $this->assertEquals($this->easyCut->arrayToIndex(4), [1, 2, 3, 4, 5]);
    }

    public function testArrayToValue()
    {
        $this->assertEquals($this->easyCut->arrayToValue(4), [1, 2, 3, 4]);
    }

    public function testDeepArrayFrom()
    {
        $this->assertEquals($this->deepEasyCut->deepArrayFrom('spice', 'type'), [
            [
                'index' => 4,
                'position' => 'five',
                'type' => 'spice',
            ],
            [
                'index' => 5,
                'position' => 'six',
                'type' => 'plant',
            ],
            [
                'index' => 6,
                'position' => 'seven',
                'type' => 'car',
            ],
            [
                'index' => 7,
                'position' => 'eight',
                'type' => 'fruit',
            ]
        ]);
    }

    public function testDeepArrayAfter()
    {
        $this->assertEquals($this->deepEasyCut->deepArrayAfter('spice', 'type'), [
            [
                'index' => 5,
                'position' => 'six',
                'type' => 'plant',
            ],
            [
                'index' => 6,
                'position' => 'seven',
                'type' => 'car',
            ],
            [
                'index' => 7,
                'position' => 'eight',
                'type' => 'fruit',
            ]
        ]);
    }

    public function testDeepArrayBefore()
    {
        $this->assertEquals($this->deepEasyCut->deepArrayBefore('spice', 'type'), [
            [
                'index' => 0,
                'position' => 'one',
                'type' => 'animal',
            ],
            [
                'index' => 1,
                'position' => 'two',
                'type' => 'song',
            ],
            [
                'index' => 2,
                'position' => 'three',
                'type' => 'building',
            ],
            [
                'index' => 3,
                'position' => 'four',
                'type' => 'tool',
            ]
        ]);
    }

    public function testDeepArrayTo()
    {
        $this->assertEquals($this->deepEasyCut->deepArrayTo('spice', 'type'), [
            [
                'index' => 0,
                'position' => 'one',
                'type' => 'animal',
            ],
            [
                'index' => 1,
                'position' => 'two',
                'type' => 'song',
            ],
            [
                'index' => 2,
                'position' => 'three',
                'type' => 'building',
            ],
            [
                'index' => 3,
                'position' => 'four',
                'type' => 'tool',
            ],
            [
                'index' => 4,
                'position' => 'five',
                'type' => 'spice',
            ]
        ]);
    }
}
