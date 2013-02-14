<?php
namespace LiteraryQuotes\Quoter;

use LiteraryQuotes\Provider\ArrayProvider;

class TwitterQuote extends Quote implements ArrayProvider
{
    protected $twitterUser;
    protected $numTweets;
    protected $quotes;
    protected $twitterURL   = "https://api.twitter.com/1/statuses/user_timeline.json?screen_name=[1]&count=[2]";
    protected $replacements;

    public function __construct($twitterUser, $numTweets)
    {
        $this->twitterUser  = $twitterUser;
        $this->numTweets    = $numTweets;
        $this->replacements = array(
                                '[1]'  => $this->twitterUser,
                                '[2]'  => strval($this->numTweets)      
                              );
    }
        


    public function getArray()
    {

        $url = strtr($this->twitterURL, $this->replacements);
        $twitterQuotes = json_decode(file_get_contents($url));


        foreach ($twitterQuotes as $twitterQuote) {
            $this->quotes[] = $twitterQuote->text;
        }

        return $this->quotes;

    }
}