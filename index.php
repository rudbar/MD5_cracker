<!DOCTYPE html>
<head><title>Jan Kachan's Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four-character lower case string and 
attempts to hash all four-character combinations
to determine the original four characters.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $txt = "0123456789";
    $show = 15;

    // Outer loop go go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($txt); $i++ ) { // this loop is for the first character
        $ch1 = $txt[$i];   

        for($j=0; $j<strlen($txt); $j++ ) { // this loop is for the second character
            $ch2 = $txt[$j];

            for ($k=0; $k<strlen($txt); $k++) { // this loop is for the third character 
                $ch3 = $txt[$k];

                for ($l=0; $l<strlen($txt); $l++) { // this loop is for the fourth character
                    $ch4 = $txt[$l];


            
            $try = $ch1.$ch2.$ch3.$ch4; // here we're concatanating all four characters together


           
            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $goodtext = $try;
                echo "$goodtext";
                break;   
            }

           
            if ( $show > 0 ) { // count it down
                print "$check $try\n";
                $show = $show - 1;
                    }
                }
            }
        }
    }
    // Compute ellapsed time
    $time_post = microtime(true);
    print "Ellapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>The PIN is: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="40" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
</ul>
</body>
</html>

