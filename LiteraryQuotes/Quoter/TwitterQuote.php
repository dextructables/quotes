<?php
namespace LiteraryQuotes\Quoter;

use LiteraryQuotes\Provider\ArrayProvider;
use \TwitterOAuth;

class TwitterQuote extends Quote implements ArrayProvider
{

    protected $twitterUser;
    protected $numTweets;
    protected $quotes;
    protected $twitterURL   = 'statuses/user_timeline';
    protected $twitterOauth;


    public function __construct($twitterUser, $numTweets)
    {
        $this->twitterUser  = $twitterUser;
        $this->numTweets    = $numTweets;
        $this->quotes       = array();

        $this->twitterOauth = new TwitterOAuth(
                                                'sZvy4UQcEkjObXuctUxleA',   
                                                'qff6VtrGIHVRx5ftgDImvaF8Y4vXPmFRLW2sHlx3caM',
                                                '295415643-Z6aS3tpeRbO2WS3lTLJfYa21bmgu9ViG0p8Svnjt',
                                                'AyHCblhTuGCMU7Vt4EgfLg8FCVeuGMpJzFdl5D3c'
                                               );
    }
        
    public function getArray()
    {

        $twitterQuotes = $this->twitterOauth->get($this->twitterURL,
                                                  array('screen_name' => $this->twitterUser,
                                                        'count' => $this->numTweets,
                                                        'exclude_replies' => true)
                                                 );
   


        foreach ($twitterQuotes as $twitterQuote) {
            $this->quotes[] = $twitterQuote->text;
        }

        return $this->quotes;

    }

}