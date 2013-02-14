<?php
namespace LiteraryQuotes\Format;

use LiteraryQuotes\Provider\ArrayProvider;

class ListFormatter
{
    protected $arrayList;

    public function __construct(ArrayProvider $arrayImplementation)
    {
        $this->arrayList = $arrayImplementation->getArray();
    }


    public function getList()
    {
        $this->arrayList = array_map(array($this, 'applyFormat'), $this->arrayList);
        return '<ul>' . implode("\r\n", $this->arrayList) . '</ul>';
    }
    

    protected function applyFormat($element)
    {
        return "<li>{$element}</li>";
    }
}