<?php
namespace PureIntento\PrintifySdk;

class StructureCollection implements \ArrayAccess, \Countable, \Iterator {
    private $items = array();
    private $position = 0;
    protected $structure;
    /**
     * Този аргумент определя дали да се прави проверка дали структурата съдържа нужните елементи
     * This argument specifies whether to check whether the structure contains the required elements
     */
    protected $strict=false;

    public function __construct($structure,$items = [],bool $strict=false){
        $this->structure=$structure;
        $this->items=$items;
        $this->strict=$strict;
    }
  
    public function offsetSet($offset, $value) : void{
      if (is_null($offset)) {
        $this->items[] = $value;
      } else {
        $this->items[$offset] = $value;
      }
    }
  
    public function offsetExists($offset) : bool {
      return isset($this->items[$offset]);
    }
  
    public function offsetUnset($offset) : void {
      unset($this->items[$offset]);
    }
  
    public function offsetGet($offset)  : mixed {
      return isset($this->items[$offset]) ? new $this->structure($this->items[$offset], $this->strict) : null;
    }
  
    public function count() : int{
      return count($this->items);
    }
  
    public function rewind() : void {
      $this->position = 0;
    }
  
    public function current()  : mixed{
      return new $this->structure($this->items[$this->position],$this->strict);
    }
  
    public function key() : int{
      return $this->position;
    }
  
    public function next() : void{
      ++$this->position;
    }
  
    public function valid() : bool {
      return isset($this->items[$this->position]);
    }
  }
  