<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP Recursive Function Example</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
</head>

<body>

<div id="jstree_demo_div">

<?php
//Add your folder path here.
$folderPath = "DriveName:/FolderName";

function readFolderContents( $path ) {
  // Open the folder
  if ( !( $dir = opendir( $path ) ) ) die( "Can't open $path" );
  $filenames = array();
  // Ignore . and .. from directory structure.
  while ( false !== ($filename = readdir($dir))) {
	if ( $filename != '.' && $filename != '..' ) {
      if ( is_dir( "$path/$filename" ) ) $filename .= '/';
      $filenames[] = $filename;
    }
  }
  closedir ( $dir );
  // Sort the filenames in alphabetical order
  sort( $filenames );
  // Display the filenames, and process any subfolders
  echo "<ul>";
  foreach ( $filenames as $filename ) {
    echo "<li>$filename";
    if ( substr( $filename, -1 ) == '/' ) readFolderContents( "$path/" . substr( $filename, 0, -1 ) );
    echo "</li>";
  }
  echo "</ul>";
}
readFolderContents( $folderPath );
?>

</div>
<script>
jQuery(document).ready(function(){
  jQuery(function(){ 
    jQuery('#jstree_demo_div').jstree({
      // "plugins" : [ "wholerow", "checkbox" ],
      "themes" : {
        "variant" : "stripes"
      }
    }); 
  });
});
</script>
</body>

</html>

