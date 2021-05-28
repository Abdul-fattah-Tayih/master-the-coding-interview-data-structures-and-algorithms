<?php

class MyArray
{
    private $length;
    private $data;

    public function __construct() {
        $this->length = 0;
        $this->data = [];
    }

    public function get($index)
    {
        return $this->data[$index];
    }

    public function push($item) 
    {
        $this->data[$this->length] = $item;
        $this->length++;

        return $this->length;
    }

    public function pop() 
    {
        $item = $this->data[$this->length - 1];
        unset($this->data[$this->length - 1]);
        $this->length--;

        return $item;
    }

    public function delete($index) 
    {
        $item = $this->data[$index];
        $this->shiftItems($index);

        return $item;
    }

    private function shiftItems($index) 
    {
        for ($i = $index; $i < $this->length - 1; $i++) {
            $this->data[$index] = $this->data[$i + 1];
        }

        unset($this->data[$this->length - 1]);
        $this->length--;
    }
}

$newArray = new MyArray;
$newArray->push('hi');
$newArray->push('you');
$newArray->push('!');
$newArray->delete(0);
$newArray->push('are');
$newArray->push('nice');
$newArray->delete(1);
var_dump($newArray);