<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 05.11.15
 * Time: 15:24
 */

$sqlite = 'sqlite:sqlite/phpexport.db';

try
{
  $db = new PDO( $sqlite );
  $sql = 'SELECT * FROM arrangements';

  $result = $db->query( $sql );
  $errorInfo = $db->errorInfo();

  if( isset( $errorInfo[ 2 ] ) )
    $error = $errorInfo[ 2 ];

//  var_dump($result);
//  var_dump($errorInfo);
}
catch( PDOException $e )
{
  $error = $e->getMessage();

//  var_dump($error);
}

/**
 * Получить выборку в виде массива из бд
 *
 * @param $result
 */
function getRow( $result )
{
  return $result->fetch( PDO::FETCH_ASSOC );
}