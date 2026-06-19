

<?php


$userInput = "";




// The URL you want to fetch
//$url = "https://cricheroes.com/player-profile/12111612/maddi-ramaswamy/stats";
$url = "https://cricheroes.com/player-profile/12110784/sharath-kumar/stats";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
	
	
    // 3. Get the value from the input box using its 'name' attribute
    // We use htmlspecialchars() to prevent malicious code injections (XSS)
    $url = htmlspecialchars($_POST['my_text_box']);
    
    // 4. Now the string is safely stored in $userInput, you can use it!
    echo "<div style='color: green; padding: 10px; background: #e2f0d9;'>";
    echo "<strong>Success! Stored String:</strong> " . $url;
    echo "</div><br></li>";
}


// Initialize a cURL session
$ch = curl_init();

// Set the URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'); // Mimic a browser

// Execute the cURL session and fetch the source code
$source_code = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Use htmlspecialchars so the browser displays the raw HTML code instead of rendering it
    //echo "<pre>" . htmlspecialchars($source_code) . "</pre>";
	echo "<ul>";
	$str="<pre>" . htmlspecialchars($source_code) . "</pre>";


	$start=strpos($str, "total_matches");
	$test= substr($str, $start+13, 60);
	$hand= substr($test, 0, strpos($test, "total_wickets"));
	echo "<li>Total Matches : ".preg_replace('/[:\",]/', '', $hand)."<br></li>";

	$start=strpos($str, "total_wickets");
	$test= substr($str, $start+13, 60);
	$hand= substr($test, 0, strpos($test, "total_runs"));
	echo "<li>Total Wickets : ".preg_replace('/[:\",]/', '', $hand)."<br></li>";

	$start=strpos($str, "total_runs");
	$test= substr($str, $start+10, 60);
	$hand= substr($test, 0, strpos($test, "dob"));
	echo "<li>Total Runs : ".preg_replace('/[:\",]/', '', $hand)."<br></li>";


	$start=strpos($str, "batting_hand");
	$test= substr($str, $start+12, 60);
	$hand= substr($test, 0, strpos($test, "batter_category"));
	echo "<li>Batting Style : ".preg_replace('/[:\",]/', '', $hand)."<br></li>";
	
	$start=strpos($str, "batter_category");
	$test= substr($str, $start+15, 60);
	$hand= substr($test, 0, strpos($test, "bowler_category"));
	echo "<li>Batter Category : ".preg_replace('/[:\",]/', '', $hand)."<br></li>";

	$start=strpos($str, "playing_role");
	$test= substr($str, $start+12, 60);
	$hand= substr($test, 0, strpos($test, "player_skill"));
	echo "<li>Playing Role : ".preg_replace('/[:\",]/', '', $hand)."<br></li>";







	$start=strpos($str, "hit a top score of \u003cb\u003e");
	$test= substr($str, $start+32, 10);
	$topscore= substr($test, 0, strpos($test, "\u003"));
	echo "<li>Top Score : ".$topscore."<br></li>";
	
	
	$start=strpos($str, "an average of \u003cb\u003e");
	$test= substr($str, $start+27, 10);
	$avg= substr($test, 0, strpos($test, "\u00"));
	echo "<li>Avg : ".$avg."<br></li>";
	$start=strpos($str, "strike rate of \u003cb\u003e");
	$test= substr($str, $start+28, 10);
	$strt= substr($test, 0, strpos($test, "\u00"));
	echo "<li>StrikeRate : ".$strt."<br></li>";
	$start=strpos($str, "hitting big shots is evident with \u003cb\u003e");
	$test= substr($str, $start+47, 10);
	$sixes= substr($test, 0, strpos($test, "sixes"));
	echo "<li>sixes : ".$sixes."<br></li>";
	
	$start=strpos($str, "and \u003cb\u003e");
	$test= substr($str, $start+17, 10);
	$fours= substr($test, 0, strpos($test, "fours"));
	echo "<li>fours : ".$fours."<br></li>";
	
	$start=strpos($str, "bowling_style");
	$test= substr($str, $start+13, 60);
	$Bowling= substr($test, 0, strpos($test, "batting_hand"));
	echo "<li>Bowling Style : ".preg_replace('/[:\",]/', '', $Bowling)."<br></li>";
}

// Close cURL session
curl_close($ch);
?>


<form method="POST" action="">
    <label for="my_text_box">Enter some text:</label>
    <input type="text" id="my_text_box" name="my_text_box" required>
    
    <button type="submit">Submit</button>
</form>

<style>
ul {
  list-style: none;
}
ul li::before {
  content: "";
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/fb-heart.gif);
  background-size: contain;
  display: inline-block;
  width: 1em;
  height: 1em;
  position: relative;
  top: 0.1rem;
  margin-right: 0.2rem;
}
</style>
