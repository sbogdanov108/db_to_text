<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 15.11.15
 * Time: 14:02
 */

$sourcefile = 'flowers_wordTemplate.docx';
$xslt = 'flowers_word.xslt';

$zip = new ZipArchive();
$zip->open( $sourcefile );
$content = $zip->getFromName( 'word/document.xml' );

if( file_put_contents( $xslt, $content ))
  echo 'Main content extracted<br>';
else
  echo 'Problem extracting main content';

$zip->close();