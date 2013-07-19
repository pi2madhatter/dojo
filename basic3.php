<?php
echo "<p style=\"font-weight:bold\">Starting the program...</p>";

//Declaring the throw count for each face and setting them to 0
$headCount = 0;
$tailCount = 0;

//Setting the loop frequency, on each round get a random binary result (for heads vs. tails) and count up for next round
for($i=0; $i<5000; $i++) {
	$throwRound = $i+1;
	$throwResult = mt_rand(0,1);

//add the win to the resulting face and stylize the round announcement based on the winning result
	if($throwResult == 0) {
		$face = "<span style=\"color:red\">heads!</span>";
		$headCount++;
	} else {
		$face = "<span style=\"color:green\">tails!</span>";
		$tailCount++;
	}	
	echo "<p>Attempt &#35;$throwRound: Throwing a coin... It's $face...  Got $headCount heads so far and $tailCount tails so far.</p>";
}

//announce the completion of the program and stylize the completion announcement based on the final winner
if($headCount > $tailCount) {
	$resultStyle = "color:red;";
	$resultWinner = "Heads wins!";
} else {
	$resultStyle = "color:green";
	$resultWinner = "Tails wins!";
}
echo "<p style=\"font-weight:bold;$resultStyle\">Program Ended and $resultWinner</p>\r<p>Thank You!</p>";
?>