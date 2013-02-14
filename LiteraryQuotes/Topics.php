<?php
namespace LiteraryQuotes;

use LiteraryQuotes\Provider\ArrayProvider;
use LiteraryQuotes\Format\ListFormatter;

class Topics implements ArrayProvider
{
    protected $tagArray;
    protected $list;

    public function __construct($tagList)
    {
        $this->tagArray = explode(',', $tagList);
    }

    public function getArray()
    {
        return $this->tagArray;
    }

    public function getTopicList()
    {
        if (!isset($this->list)) {
             $this->list = new ListFormatter($this);
        }
        
        return $this->list->getList(); 
    } 
}