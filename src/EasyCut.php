<?php
namespace Tuvi\EasyCut;

use Tuvi\EasyCut\Exceptions\InvalidArrayException;

class EasyCut
{
    /**
     * The array supplied by the user
     *
     * @var array
     */
    private $userArray;

    /**
     * Constructor
     *
     * @param array $userArray a user-specified array
     *
     * @throws InvalidArrayException
     */
    public function __construct($userArray)
    {
        if (empty($userArray) || !is_array($userArray)) {
            throw new InvalidArrayException("You need to pass in a valid array", 1);
        }

        $this->userArray = $userArray;
    }

    /**
     * get the index at which the value being sought by the user can be found
     *
     * @param  mixed  $value    the value being sought
     * @param  string $keyName  the name of the key that should hold the value being sought
     *
     * @return int              the index at which the value being sought exists
     */
    private function getValueIndex($value, $keyName = null)
    {
        if (empty($keyName)) {
            $valueIndex = array_search($value, $this->userArray);
        } else {
            $valueIndex = array_search($value, array_column($this->userArray, $keyName));
        }
        
        return $valueIndex;
    }

    /**
     * get a new array containing all the items in the original array from (and including) a user-specified index
     *
     * @param  int   $index  the user-specified index
     *
     * @return array $array  the subarray from the original array
     */
    public function arrayFromIndex($index)
    {
        $array = array_slice($this->userArray, $index);
        return $array;
    }

    /**
     * get a new array containing all the items in the original array from (and including) a user-specified value
     *
     * @param  mixed $value  the user specified value
     *
     * @return array $array  the subarray of the original array
     */
    public function arrayFromValue($value)
    {
        $valueIndex = $this->getValueIndex($value);
        $array = array_slice($this->userArray, $valueIndex);
        return $array;
    }

    /**
     * get a new array containing all the items in the original array after (and excluding) a user-specified index
     *
     * @param  int   $index  the user-specified index
     *
     * @return array $array  the subarray from the original array
     */
    public function arrayAfterIndex($index)
    {
        $array = array_slice($this->userArray, $index + 1);
        return $array;
    }

    /**
     * get a new array containing all the items in the original array after (and excluding) a user-specified value
     *
     * @param  mixed $value  the user-specified value
     *
     * @return array $array  the subarray from the original array
     */
    public function arrayAfterValue($value)
    {
        $valueIndex = $this->getValueIndex($value);
        $array = array_slice($this->userArray, $valueIndex + 1);
        return $array;
    }

    /**
     * get a new array containing all the items in the original array before (and excluding) a user-specified index
     *
     * @param  int   $index  the user-specified index
     *
     * @return array $array  the subarray from the original array
     */
    public function arrayBeforeIndex($index)
    {
        $array = array_slice($this->userArray, 0, $index);
        return $array;
    }

    /**
     * get a new array containing all the items in the original array before (and excluding) a user-specified value
     *
     * @param  mixed $value  the user-specified value
     *
     * @return array $array  the subarray from the original array
     */
    public function arrayBeforeValue($value)
    {
        $valueIndex = $this->getValueIndex($value);
        $array = array_slice($this->userArray, 0, $valueIndex);
        return $array;
    }

    /**
     * get a new array containing all the items in the original array up to (and including) a user-specified index
     *
     * @param  int   $index  the user-specified index
     *
     * @return array $array  the subarray from the original array
     */
    public function arrayToIndex($index)
    {
        $array = array_slice($this->userArray, 0, $index + 1);
        return $array;
    }

    /**
     * get a new array containing all the items in the original up to (and including) a user-specified value
     *
     * @param  mixed $value  the user-specified value
     *
     * @return array $array  the subarray from the original array
     */
    public function arrayToValue($value)
    {
        $valueIndex = $this->getValueIndex($value);
        $array = array_slice($this->userArray, 0, $valueIndex + 1);
        return $array;
    }

    /**
     * get a new multidimensional array containing all the items in the original array before (and excluding) a
     * user-specified value for an existing key in a multidimensional array
     *
     * @param  mixed  $value    the value being souhgt for
     * @param  string $keyName  the name of the key that should hold the value being sought
     *
     * @return array  $array    the subarray from the original array
     */
    public function deepArrayBefore($value, $keyName)
    {
        $valueIndex = $this->getValueIndex($value, $keyName);
        $array = $this->arrayBeforeIndex($valueIndex);
        return $array;
    }

    /**
     * get a new multidimensional array containing all the items in the original array after (and excluding) a
     * user-specified value for an existing key in a multidimensional array
     *
     * @param  mixed  $value    the value being souhgt for
     * @param  string $keyName  the name of the key that should hold the value being sought
     *
     * @return array  $array    the subarray from the original array
     */
    public function deepArrayAfter($value, $keyName)
    {
        $valueIndex = $this->getValueIndex($value, $keyName);
        $array = $this->arrayAfterIndex($valueIndex);
        return $array;
    }

    /**
     * get a new multidimensional array containing all the items in the original array up to (and including) a
     * user-specified value for an existing key in a multidimensional array
     *
     * @param  mixed  $value    the value being souhgt for
     * @param  string $keyName  the name of the key that should hold the value being sought
     *
     * @return array  $array    the subarray from the original array
     */
    public function deepArrayTo($value, $keyName)
    {
        $valueIndex = $this->getValueIndex($value, $keyName);
        $array = $this->arrayToIndex($valueIndex);
        return $array;
    }

    /**
     * get a new multidimensional array containing all the items in the original array from (and including) a
     * user-specified value for an existing key in a multidimensional array
     *
     * @param  mixed  $value    the value being souhgt for
     * @param  string $keyName  the name of the key that should hold the value being sought
     *
     * @return array  $array    the subarray from the original array
     */
    public function deepArrayFrom($value, $keyName)
    {
        $valueIndex = $this->getValueIndex($value, $keyName);
        $array = $this->arrayFromIndex($valueIndex);
        return $array;
    }
}
