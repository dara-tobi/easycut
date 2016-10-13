# EasyCut

### About EasyCut
---

EasyCut is a tiny toolkit for quickly cutting a simple or multidimensional array in php
by specifying an index, a value or a key-value pair that exists in the array. 

### Requirements
---
- php
- composer

## Use cases
---
#### 1 EasyCut for a simple array
Using
```
<?php

use Tuvi\EasyCut;

$easyCut = new EasyCut(['1, 2, 3, 4, 5, 6, 7, 8, 9, 10']);

```
as a sample simple array usage of EasyCut, the following are the operations and methods that can be 
performed and called on the `$easyCut` instance of `EasyCut`

### i). Get a subarray from the beginning of the original array up to an index, including the value at that index
---

```
$subArray = $easyCut->arrayToIndex(4); // [1, 2, 3, 4, 5];
```

### ii). Get a subarray from the beginning of the original array up to a value, including the value
---
```
$subArray = $easyCut->arrayToValue(4); // [1, 2, 3, 4];
```

### iii). Get a subarray from the beginning of the original array before an index, excluding the value at that index
---
```
$subArray = $easyCut->arrayToBeforeIndex(4); // [1, 2, 3, 4];
```
### iv). Get a subarray from the beginning of the original array before before a value, excluding that value
---
```
$subArray = $easyCut->arrayToValue(4); // [1, 2, 3];
```

### v). Get a subarray from an index up to the end of the original array, including the value at that index
---
```
$subArray = $easyCut->arrayFromIndex(4); // [5, 6, 7, 8, 9, 10'];
```
### vi). Get a subarray starting from a value up to the end of the original array, including the value
---
```
$subArray = $easyCut->arrayFromValue(4); // [4, 5, 6, 7, 8, 9, 10'];
```
### vii). Get a subarray after an index up to the end of the original array, excluding the value at that index
---
```
$subArray = $easyCut->arrayAfterIndex(4); // [6, 7, 8, 9, 10'];
```
### viii). Get a subarray after a value up to the end of the original array, excluding the value
---
```
$subArray = $easyCut->arrayAfterValue(4); // [5, 6, 7, 8, 9, 10'];
```

#### 2 EasyCut for a multidimensional array

Using 
```
<?php

use Tuvi\EasyCut;

$easyDeepCut = new EasyCut([
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
```
as a sample multidimensional array usage of EasyCut, the following are the operations and methods that can be 
performed and called on the `$easyDeepCut` instance of `EasyCut`

### ix). Get a subarray starting from the beginning of the original array until the index where a key value pair occurs in the original array, including the item at index where the key value pair occurs
___
```
$easyDeepCut->deepArrayTo('building', 'type');
/* 
[
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
    ]
];
*/
```
### x). Get a subarray starting from the beginning of the original array up to the index before where a key value pair occurs in the original array, excluding the item at index where the key value pair occurs
___
```
$easyDeepCut->deepArrayBefore('building', 'type');
/* 
[
    [
        'index' => 0,
        'position' => 'one',
        'type' => 'animal',
    ],
    [
        'index' => 1,
        'position' => 'two',
        'type' => 'song',
    ]
];
*/
```
### xi). Get a subarray starting from the index where a key value pair occurs in a multidimensional array up to the end of the original array, including the item at index where the key value pair occurs
---
```
$easyDeepCut->deepArrayFrom('building', 'type');
/*
[
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
]
*/
```
### xii). Get a subarray starting after the index where a key value pair occurs in a multidimensional array up to the end of the original array, excluding the item at the index where the key value pair occurs
---
```
$easyDeepCut->deepArrayAfter('building', 'type');
/*
[
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
]
*/
```
