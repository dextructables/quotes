<?php
namespace LiteraryQuotes\Format;
use LiteraryQuotes\Provider\QuoteProvider;

class QuoteFormatter
{
	protected $quoteList;

	public function __construct(QuoteProvider $quoteImplementation)
	{
		$this->quoteList = $quoteImplementation->getQuotes();
	}


	public function getFormattedQuotes()
	{
		$this->quoteList = array_map(array($this, 'applyFormat'), $this->quoteList);
		return '<ul>' . implode("\r\n", $this->quoteList) . '</ul>';
	}
	

	protected function applyFormat($element)
	{
		return "<li>{$element}</li>";
	}
}