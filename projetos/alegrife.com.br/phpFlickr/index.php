<?php
require_once("phpFlickr.php");
// Create new phpFlickr object
$f = new phpFlickr("2fcb1fadf2a170f5237beb1ec0a7a483");
$f->enableCache(
    "db",
    "mysql://[username]:[password]@[server]/[database]"
);
 
$i = 0;
if (!empty($_POST['username'])) {
	// Find the NSID of the username inputted via the form
    $person = $f->people_findByUsername($_POST['username']);
 
    // Get the friendly URL of the user's photos
    $photos_url = $f->urls_getUserPhotos($person['id']);
 
    // Get the user's first 36 public photos
    $photos = $f->people_getPublicPhotos($person['id'], NULL, NULL, 36);
 
    // Loop through the photos and output the html
    foreach ((array)$photos['photos']['photo'] as $photo) {
        echo "<a href=$photos_url$photo[id]>";
        echo "<img border='0' alt='$photo[title]' ".
            "src=" . $f->buildPhotoURL($photo, "Square") . ">";
        echo "</a>";
        $i++;
        // If it reaches the sixth photo, insert a line break
        if ($i % 6 == 0) {
            echo "<br>\n";
        }
    }
}
?>
 
<h3>Enter a username to search for</h3>
<form method='post'>
    <input name='username'><br>
    <input type='submit' value='Display Photos'>
</form>
 
<p><a href="source">View Source</a></p>