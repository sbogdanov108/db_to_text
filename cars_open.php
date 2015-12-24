<?php
require_once 'src/Foundationphp/Psr4Autoloader.php';
$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace( 'Fusonic', 'src/Fusonic' );

use Fusonic\SpreadsheetExport\Spreadsheet;
use Fusonic\SpreadsheetExport\ColumnTypes\CurrencyColumn;
use Fusonic\SpreadsheetExport\ColumnTypes\NumericColumn;
use Fusonic\SpreadsheetExport\ColumnTypes\TextColumn;
use Fusonic\SpreadsheetExport\Writers\OdsWriter;

require_once 'includes/cars_pdo.php';
if ( isset( $_POST[ 'download' ] ) )
{
  try
  {
    $sheet = new Spreadsheet();
    $sheet->addColumn( new NumericColumn( 'car_id' ) );
    $make = new TextColumn( 'make' );
    $make->width = 1.2 * 2.54;
    $sheet->addColumn( $make );

    $sheet->addColumn( new NumericColumn( 'yearmade' ) );
    $sheet->addColumn( new NumericColumn( 'mileage' ) );
    $sheet->addColumn( new TextColumn( 'transmission' ) );

    $price = new CurrencyColumn( 'price' );
    $price->currency = 'USD';
    $sheet->addColumn( $price );

    $description = new TextColumn( 'description' );
    $description->width = 3.25 * 2.54;
    $sheet->addColumn( $description );

    while ( $row = getRow( $result ) )
    {
      foreach ( $row as $key => $value )
      {
        $row[ $key ] = str_replace( [ '&', '<' ], [ '&amp;', '&lt;' ], $value );
      }
      $row = array_values( $row );

      $sheet->addRow( $row );
    }

    $writer = new OdsWriter();
    $writer->includeColumnHeaders = true;
    $sheet->download( $writer, 'cars' );
    exit;
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
  <title>Used Cars</title>
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
  <h1>Used Cars for Sale</h1>

  <a href="index.html">Back</a><br><br>

  <form method="post">
    <fieldset>
      <legend>Download Results</legend>
      <p>
        <input type="submit" name="download" id="download" value="Download OpenDocument">
      </p>
    </fieldset>
  </form>

  <?php while ( $row = getRow( $result ) )
  { ?>
    <h2><?php echo $row[ 'make' ]; ?></h2>
    <ul>
      <li>Price: $<?php echo number_format( $row[ 'price' ], 2 ); ?></li>
      <li>Year: <?php echo $row[ 'yearmade' ]; ?></li>
      <li>Mileage: <?php echo number_format( $row[ 'mileage' ], 0 ); ?></li>
      <li>Transmission: <?php echo $row[ 'transmission' ]; ?></li>
    </ul>
    <p><?php echo $row[ 'description' ]; ?></p>
    <hr>
  <?php } ?>

</div>
</body>
</html>