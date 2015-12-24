<?php
require_once 'src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace( 'Foundationphp', 'src/Foundationphp' );

use Foundationphp\Exporter\Xml;
use Foundationphp\Exporter\MsWord;
use Foundationphp\Exporter\OpenDoc;

require_once 'includes/flowers_pdo.php';
if ( isset( $_POST[ 'download' ] ) )
{
  try
  {
    $options[ 'stripNsplit' ] = 'description';
    $xml = new Xml( $result, null, $options );
    $dir = __DIR__ . '/';

    if ( $_POST[ 'format' ] == 'msword' )
    {
      $download = new MsWord( $xml );
      $download->setDocTemplate( $dir . 'output/flowers_wordTemplate.docx' );
      $download->setXsltSource( $dir . 'output/flowers_word.xslt' );
      $download->setImageSource( $dir . 'images' );
      $download->create( 'flowers.docx' );
    } elseif ( $_POST[ 'format' ] == 'opendoc' )
    {
      $download = new OpenDoc( $xml );
      $download->setDocTemplate( $dir . 'output/flowers_odtTemplate.odt' );
      $download->setXsltSource( $dir . 'output/flowers_odt.xslt' );
      $download->setImageSource( $dir . 'images' );
      $download->create( 'flowers.odt' );
    }
  } catch ( Exception $e )
  {
    $error = $e->getMessage();
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Flower Arrangements</title>
  <link href="styles/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
  <?php

  if ( isset( $error ) )
  {
    echo "<p>$error</p>";
  } else
  {
    ?>
    <h1>Flower Arrangements</h1>

    <a href="index.html">Back</a><br><br>

    <form method="post">
      <fieldset>
        <legend>Download Results</legend>
        <p>
          <label for="format">Choose format</label> <select name="format" id="format">
            <option value="msword">Microsoft Word</option>
            <option value="opendoc">OpenDocument text file</option>
          </select>
        </p>
        <p>
          <input type="submit" name="download" id="download" value="Download File">
        </p>
      </fieldset>
    </form>
    <?php
    while ( $row = getRow( $result ) )
    { ?>
      <h2><?php echo $row[ 'title' ]; ?></h2>
      <figure>
        <img src="images/<?php echo $row[ 'image' ]; ?>"
             alt="<?php echo $row[ 'alt' ]; ?>">
      </figure>
      <p class="price">$<?php echo $row[ 'price' ]; ?></p>
      <?php echo $row[ 'description' ]; ?>
      <hr>
    <?php } ?>
  <?php } ?>
</div>
</body>
</html>