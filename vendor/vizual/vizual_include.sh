for bladefile in $( sudo find . -name "*.blade.php"); do

	echo '<?php include_once "$_SERVER[DOCUMENT_ROOT]/../credentials.php"; ?>' > temp.txt;
	echo '<?php include_once "$_SERVER[DOCUMENT_ROOT]/$pathToVizual/vizualize.php"; ?>' >> temp.txt;
	echo "" >> temp.txt;

	cat $bladefile >> temp.txt;

	mv temp.txt $bladefile;

done;