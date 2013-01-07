<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Citas Literarias</title>
	</head>
	<body>
		<?php
		
		require_once 'init.php';
		
		$lq  = new LiteraryQuotes\Quoter\LocalQuote('xml/quote_list.xml');
		$tq  = new LiteraryQuotes\Quoter\TwitterQuote('QuotesLiterary', 5);


		$lq->setListName('Frases locales');
		$tq->setListName('Frases Twitter');

		echo $lq->getListName();
		echo $lq->getFancyQuotes();

		echo $tq->getListName();
		echo $tq->getFancyQuotes();
		

		?>
	</body>
</html>	
