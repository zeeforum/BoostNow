<?php 
	$formatter = \Yii::$app->formatter;

	//date formats
	echo $formatter->asDate(date('Y-m-d'), 'long') . "<br>";
	echo $formatter->asDate(date('Y-m-d'), 'short') . "<br>";
	echo $formatter->asDate(date('Y-m-d'), 'medium') . "<br>";
	echo $formatter->asDate(date('Y-m-d'), 'full') . "<br>";
	//null date
	echo $formatter->asDate(null) . "<br>";

	//date or time format
	echo $formatter->asTime(date('Y-m-d')) . "<br>";
	echo $formatter->asDatetime(date('Y-m-d')) . "<br>";
	echo $formatter->asTimestamp(date('Y-m-d')) . "<br>";
	echo $formatter->asRelativeTime(date('Y-m-d', time()-(86400*860))) . "<br>";

	//number formats
	echo Yii::$app->formatter->asInteger(105),"<br>";
	echo Yii::$app->formatter->asDecimal(105.41),"<br>";
	echo Yii::$app->formatter->asPercent(0.515),"<br>";
	echo Yii::$app->formatter->asScientific(105),"<br>";
	echo Yii::$app->formatter->asCurrency(105, "PKR"),"<br>";
	echo Yii::$app->formatter->asSize(105),"<br>";
	echo Yii::$app->formatter->asShortSize(105),"<br>";

	//email format
	echo $formatter->asEmail('test@test.com') . "<br>";

	//boolean format
	echo $formatter->asBoolean(true) . "<br>";


	//other tags
	echo $formatter->asText('<span>Formatter: Text</span><script>alert("Formatter: Text");</script>');
	echo $formatter->asHtml('<b>Formatter: Html</b><script>alert("Formatter: Html");</script>');
	//echo $formatter->asRaw('<i>Formatter: Raw</i><script>alert("Formatter: Raw");</script>');//script tag running
	echo $formatter->asParagraphs('Formatter: Paragraphs<script>alert("Formatter: Paragraphs");</script>');
	echo $formatter->asImage('Formatter: \"\'image<script>alert("Formatter: image");</script>');