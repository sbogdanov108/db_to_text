<?php
require_once 'src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace( 'Foundationphp', 'src/Foundationphp' );

use Foundationphp\Exporter\Xml;
use Foundationphp\Exporter\OpenDoc;

require_once 'includes/flowers_pdo.php';
if ( isset( $_POST[ 'download' ] ) )
{
  try
  {
    $options[ 'stripNsplit' ] = 'description';
    $xml = new Xml( $result, null, $options );
    $download = new OpenDoc( $xml );

    $dir = __DIR__ . '/';
    $download->setDocTemplate( $dir . 'output/flowers_odtTemplate.odt' );
    $download->setXsltSource( $dir . 'output/flowers_odt.xslt' );
    $download->setImageSource( $dir . 'images' );

    $download->create( 'flowers.odt' );
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
          <input type="submit" name="download" id="download" value="Download OpenDocument Text (.odt) File">
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
    <form method="post">
      <fieldset>
        <legend>Download Results</legend>
        <p>
          <input type="submit" name="download" id="download" value="Download OpenDocument Text (.odt) File">
        </p>
      </fieldset>
    </form>
  <?php } ?>
</div>
</body>
</html>