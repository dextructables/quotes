<?php
namespace LiteraryQuotes\Quoter;

use LiteraryQuotes\Provider\ArrayProvider;

class LocalQuote extends Quote implements ArrayProvider
{

    protected $quotes;
    protected $quoteFile;

    public function __construct($targetFile)
    {
        $this->quotes     = array();
        $this->quoteFile  = $targetFile;
    }
    

    public function getArray()
    {
        $xmlFile        = new \SimpleXMLElement($this->quoteFile, null, true);
        $simpleXmlNodes = $xmlFile->xpath("//quote");
        $this->quotes   = array_map('strval', $simpleXmlNodes);

        return $this->quotes;
    }        
}