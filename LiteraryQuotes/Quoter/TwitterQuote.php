<?php
namespace LiteraryQuotes\Quoter;
use LiteraryQuotes\Provider\QuoteProvider;

class TwitterQuote extends Quote implements QuoteProvider
{
	protected $twitterUser;
	protected $numTweets;
	protected $quotes;

	public function __construct($twitterUser, $numTweets)
	{
		$this->twitterUser = $twitterUser;
		$this->numTweets   = $numTweets;
	}


	public function getQuotes()
	{

	    $url           = "http://api.twitter.com/1/statuses/user_timeline.json?screen_name={$this->twitterUser}&count={$this->numTweets}";
	    $twitterQuotes = json_decode(file_get_contents($url));


	    foreach($twitterQuotes as $twitterQuote)
	    {
	        $this->quotes[] = $twitterQuote->text;
	    }

	    return $this->quotes;

	}
}