<?php
for ($i=1; $i<=100; $i++) {
	$pronoun = "a";
	$score = rand(50, 100);
	if($score >= 90) {
		$grade = "A";
		$pronoun = "an";
	} elseif($score > 80) {
		$grade = "B";
	} elseif($score > 70) {
		$grade = "C";
	} else {
		$grade = "D";
	}

	echo "<p>Student number {$i}:</p><h1>Your score is {$score} / 100.</h1><h2>Your grade is {$pronoun} {$grade}</h2><br />";
}
echo "These steps were looped {$i} times."
?>