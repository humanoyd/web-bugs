<?php

commonHeader('Show Source');

if (!isset($url)) {
    echo "No page URL specified.";
    commonFooter();
    exit;
}
?>
Source of: <? echo $url; ?><BR>

<?

echo hdelim(); 

$legal_dirs = array(
    "/manual" => 1,
    "/include" => 1,
	"/stats" => 1);

$dir = dirname($url);
if ($dir && $legal_dirs[$dir]) {
    $page_name = $DOCUMENT_ROOT . $url;
} else {
    $page_name = basename($url);
}

echo("<!-- $page_name -->\n");

if (file_exists($page_name) && !is_dir($page_name)) {
    show_source($page_name);
} else if (is_dir($page_name)) {
    echo "<P>No file specified.  Can't show source for a directory.</P>\n";
}

echo hdelim(); 

?>
<P>
The syntax highlighted source is automatically generated by PHP from the plaintext script.<br>
If you're interested in what's behind the <B>commonHeader()</B> and <B>commonFooter()</B> functions, 
you can always take a look at the source of the 
<? print_link("/source.php?url=/include/layout.inc", "layout.inc"); ?> files.
And, of course, if you want to see the source of this page, have a look 
<? print_link("/source.php?url=/source.php", "here"); ?>.
</P>
<?

commonFooter();
?>

