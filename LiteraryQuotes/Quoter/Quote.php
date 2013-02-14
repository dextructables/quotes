<?php
namespace LiteraryQuotes\Quoter;

use LiteraryQuotes\Format\ListFormatter;

abstract class Quote
{
    protected $listName;
    protected $formatter;

    public function setListName($listName)
    {
        $this->listName = $listName;
    }

    public function getListName()
    {
        return $this->listName;
    }

    public function getFancyQuotes()
    {
        if (!isset($this->formatter)) {
             $this->formatter = new ListFormatter($this);
        }
        
        return $this->formatter->getList(); 
    }

}