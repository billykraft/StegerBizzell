didit=0;

for bladefile in $( sudo find . -name "*.blade.php" ); do

	line=( $(head -n 1 $bladefile) );
	
	first="${line[0]}";
	
	line=( $(head -n 2 $bladefile | tail -n 1) );

	second="${line[0]}";

	if [ ! -z "$first" ] && [ ${first:0:5} == "<?php" ]; then

		if [ ! -z "$second" ] && [ ${second:0:5} == "<?php" ]; then

			lines=( $(wc -l $bladefile) );

			lines=$(($lines-2));

			tail -n $lines $bladefile > temp.txt;

			mv temp.txt $bladefile;

			didit=1;

		fi;

	fi;

done;

if [ $didit -eq 0 ]; then

	echo "did not remove lines";

else

	echo "removed lines";

fi;



