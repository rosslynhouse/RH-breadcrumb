<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 *
 * @package		FUEL BREADCRUMB HELPER
 * @author		Mark Mason @ Rosslyn House
 * @link		http://www.rosslynhouse.com
 */


function breadcrumb() {
/* get the directory path and seperate out */
$parts = explode("/", dirname($_SERVER['REQUEST_URI']));
/* grab the filename and remove the file extension if it exists */
$filename = pathinfo($_SERVER['REQUEST_URI']);
$filename2 = str_replace("-"," ",$filename);


echo '<ul class="breadcrumb">';
foreach ($parts as $key => $dir) {
		
	/* Replace directory name with preferred name */
	switch ($dir) {
		case "blog": $label = "Blog"; break;
		case "index.php": $label = "Home"; break;
		case "11": $label = "November"; break;
		
		/* If not in the exception list above, then use the original directory name, capitalized */
		default: $label = ucwords($dir); 
		break;
		}
		
		/* Then add each directory back to create the href */
		$url = "";
		for ($i = 1; $i <= $key; $i++)
		{ $url .= $parts[$i] . "/"; }
		if ($dir != "")
		echo "<li> <a href=\"/".$url."\">".$label."</a></li>";
		}
		
	/* Replace filename with preferred page name */
	switch ($filename2) {
		case "11": $pagename = "November"; break;
		/* If not in the exception list above, then use the original filename, capitalized */
		default: $pagename = ucwords($filename2['filename']);
		break;
		}
		
		/*Display the filename as the current page*/
		echo '<li>'.$pagename.'</li></ul>';
}
?>