<?php 
$file_name = $_GET['file_name'];
$files = array("barcodes/$file_name.png"); /*Image array*/

# create new zip opbject
$zip = new ZipArchive();
 
# create a temp file & open it
$tmp_file = tempnam('.','');
$zip->open($tmp_file, ZipArchive::CREATE);
 
# loop through each file
foreach($files as $file){
 
    # download file
    $download_file = file_get_contents($file);
 
    #add it to the zip
    $zip->addFromString(basename($file),$download_file);
 
}
 
# close zip
$zip->close();
 
# send the file to the browser as a download
header('Content-disposition: attachment; filename='.$file_name.'.zip');
header('Content-type: application/zip');
readfile($tmp_file);
unlink($tmp_file);
?>