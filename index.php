<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Citas Literarias</title>
        <link rel="stylesheet" href="css/styles.css" />
    </head>
    <body>
        <?php
        
        require './libraries/TwitterOauth/twitteroauth.php';
        require 'autoloader.php';
        
        $localQuotes    = new LiteraryQuotes\Quoter\LocalQuote('data/quote_list.xml');
        $twitterQuotes  = new LiteraryQuotes\Quoter\TwitterQuote('QuotesLiterary', 5);
        $tags           = new LiteraryQuotes\Topics('php,xml,namespaces,closure');


        $localQuotes->setListName('Frases locales');
        $twitterQuotes->setListName('Frases Twitter');
        ?>

        <div id="quotes">
            <?php
                echo "<h3>{$localQuotes->getListName()}</h3>";
                echo $localQuotes->getFancyQuotes();
            ?>
        </div>

        <div id="quotes">
            <?php
                echo "<h3>{$twitterQuotes->getListName()}</h3>";
                echo $twitterQuotes->getFancyQuotes();
            ?>
        </div>

        <div id="tags">
        <?php echo $tags->getTopicList(); ?>    
        </div>

    </body>
</html>