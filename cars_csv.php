<?
/*
 * Вывести всю инфу из бд в csv файл
 * */

require_once 'src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace( 'Foundationphp', 'src/Foundationphp' );

use Foundationphp\Exporter\Csv;

require_once 'includes/cars_pdo.php';

if ( isset( $_POST[ 'download' ] ) )
{
  try
  {
    $options[ 'suppress' ] = 'transmission';
    $options[ 'delimiter' ] = "\t";

    new Csv( $result, 'cars_tab.csv', $options );
  } catch ( Exception $e )
  {
    $error = $e->getMessage();
    var_dump( $error );
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Used Cars</title>
  <link href="styles/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
  <? if ( isset( $error ) ) : ?>
    <p><?= $error ?></p>
  <? endif ?>

  <h1>Used Cars for Sale</h1>

  <a href="index.html">Back</a><br><br>

  <form method="post">
    <fieldset>
      <legend>Download Results</legend>
      <p>
        <input type="submit" name="download" id="download" value="Download CSV File">
      </p>
    </fieldset>
  </form>

  <? while ( $row = getRow( $result ) ) : ?>

    <h2><?= $row[ 'make' ] ?></h2>
    <ul>
      <li>Price: $<?= number_format( $row[ 'price' ], 2 ) ?></li>
      <li>Year: <?= $row[ 'yearmade' ] ?></li>
      <li>Mileage: <?= number_format( $row[ 'mileage' ], 0 ) ?></li>
      <li>Transmission: <?= $row[ 'transmission' ] ?></li>
    </ul>
    <p><?= $row[ 'description' ] ?></p>
    <hr>

  <? endwhile ?>

</div>
</body>
</html>