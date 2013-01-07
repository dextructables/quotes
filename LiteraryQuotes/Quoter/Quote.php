<?php
namespace LiteraryQuotes\Quoter;
use LiteraryQuotes\Format\QuoteFormatter;

class Quote
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
		$this->formatter = new QuoteFormatter($this);
		return $this->formatter->getFormattedQuotes();
	}
}