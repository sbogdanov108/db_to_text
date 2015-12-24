<?php
require_once 'src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace( 'Foundationphp', 'src/Foundationphp' );

use Foundationphp\Exporter\Xml;

require_once 'includes/flowers_pdo.php';
if ( isset( $_POST[ 'download' ] ) )
{
  try
  {
    $options[ 'download' ] = true;
    $options[ 'stripNsplit' ] = 'description';

    new Xml( $result, 'arrangements2.xml', $options );
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
  }
  ?>
  <h1>Flower Arrangements</h1>

  <a href="index.html">Back</a><br><br>

  <form method="post">
    <fieldset>
      <legend>Download Results</legend>
      <p>
        <input type="submit" name="download" id="download" value="Download XML">
      </p>
    </fieldset>
  </form>

  <?php while ( $row = getRow( $result ) )
  { ?>
    <h2><?php echo $row[ 'title' ]; ?></h2>
    <figure><img src="images/<?php echo $row[ 'image' ]; ?>" alt="<?php echo $row[ 'alt' ]; ?>"></figure>
    <p class="price">$<?php echo $row[ 'price' ]; ?></p>
    <?php echo $row[ 'description' ]; ?>
    <hr>
  <?php } ?>

</div>
</body>
</html>