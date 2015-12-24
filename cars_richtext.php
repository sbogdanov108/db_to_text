<?php
require_once 'src/PHPRtfLite.php';
PHPRtfLite::registerAutoloader();

require_once 'includes/cars_pdo.php';

if ( isset( $_POST[ 'download' ] ) )
{
  try
  {
    $rtf = new PHPRtfLite();

    // Установить свойства страницы
    $rtf->setMargins( 2.54, 2.54, 2.54, 2.54 );
    $rtf->setPaperFormat( PHPRtfLite::PAPER_LETTER );

    // Добавить футер
    $footer = $rtf->addFooter();
    $fontFooter = new PHPRtfLite_Font( 8, 'Arial', '#000000' );
    $alignFooter = new PHPRtfLite_ParFormat( PHPRtfLite_ParFormat::TEXT_ALIGN_CENTER );
    $footer->writeText( 'Used cars for sale - <pagenum>', $fontFooter, $alignFooter );

    // Определить шрифты
    $fontH1 = new PHPRtfLite_Font( 16, 'Arial', '#4E9C93' );
    $fontH2 = new PHPRtfLite_Font( 14, 'Arial', '#4E9C93' );
    $fontP = new PHPRtfLite_Font( 12, 'Helvetica', '#000000' );

    // Вертикальное форматирование текста
    $formatH1 = new PHPRtfLite_ParFormat();
    $formatH1->setSpaceAfter( 8 );
    $formatH2 = new PHPRtfLite_ParFormat();
    $formatH2->setSpaceAfter( 6 );
    $formatP = new PHPRtfLite_ParFormat();
    $formatP->setSpaceAfter( 3 );

    // Содержание страницы
    $section = $rtf->addSection();
    $section->writeText( 'Used Cars for Sale', $fontH1, $formatH1 );

    while ( $row = getRow( $result ) )
    {
      $section->writeText( $row[ 'make' ], $fontH2, $formatH2 );
      $section->setNoBreak();

      $section->writeText( '<bullet> Price: $' . number_format( $row[ 'price' ], 2 ), $fontP, $formatP );
      $section->writeText( '<bullet> Mileage: ' . number_format( $row[ 'mileage' ] ), $fontP, $formatP );
      $section->writeText( '<bullet> Transmission: ' . $row[ 'transmission' ], $fontP, $formatP );
      $section->writeText( $row[ 'description' ] . '<hr>', $fontP, $formatP );
    }

    // Выходной файл
    $rtf->sendRtf( 'cars.rtf' );
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
        <input type="submit" name="download" id="download" value="Download Rich Text File">
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