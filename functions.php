<?php

// SimplePie
$feeds = file_get_contents("feeds.txt");
$urls = preg_split( '/\r\n|\r|\n/', $feeds); // used instead of explode()
$feed = new SimplePie(); // get things started
$feed->set_feed_url($urls); // set the feeds array
$feed->set_item_limit($perfeed); // max number of items per feed, variable in prefs
$feed->set_cache_duration(3600); // cache duration, in seconds
$feed->set_timeout(5);
$feed->init(); // Go baby go!
$feed->handle_content_type();
$items = $feed->get_items(0,$total); // total number of items to display on page

//additional functions

function shorten($string, $length) // for content excerpt
{
	// By default, an ellipsis will be appended to the end of the text.
$suffix = '... ';
	// Convert 'smart' punctuation, strip HTML tags, convert all tabs and line-break characters to single spaces.
$short_desc = trim(str_replace(array("\r","\n", "\t"), ' ', strip_tags($string)));
	// Cut the string to the requested length, and strip any extraneous spaces from the beginning and end.
$desc = trim(substr($short_desc, 0, $length));
	// Find out what the last displayed character is in the shortened string
$lastchar = substr($desc, -1, 1);
	// If the last character is a period, an exclamation point, or a question mark, clear out the appended text.
if ($lastchar == '.' || $lastchar == '!' || $lastchar == '?') $suffix='';
	// Append the text.
$desc .= $suffix;
	// Send the new description back to the page.
return $desc;
}

function title_shorten($tstring, $tlength) // for title
{
$clean_title = trim(str_replace(array("\r","\n", "\t"), ' ', strip_tags($tstring))); //remove any html, linebreaks etc
if (strlen($clean_title) > $tlength) {
$clean_title = substr($clean_title, 0, $tlength); // truncate if > required number of characters
$clean_title .= '... ';
}
return $clean_title ;
}

function item_image($itemimage) // to get 1st image if there is one and resize
{
	if (preg_match_all('/<img[^>]*src="(\S+\.jpg)\b/i', $itemimage, $matches)) {
// get all the image tags
	$all_images = $matches[1];
// Display the first image tag only, set width at 100px
echo '<div class="item_img"><img src="' . $all_images[0] . '" width="100" /></div>';
}
}
?>