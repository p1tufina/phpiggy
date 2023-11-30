<?php

include __DIR__ . '/src/Framework/Database.php';
require __DIR__ . "/vendor/autoload.php";

use Framework\Database;
use App\Config\Paths;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$db = new Database(
  $_ENV['DB_DRIVER'],
  [
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'dbname' => $_ENV['DB_NAME']
  ],
  $_ENV['DB_USER'],
  $_ENV['DB_PASS']
);

$sqlFile = file_get_contents("./database.sql");

$db->query($sqlFile);

/* $driver = "mysql";

$config = http_build_query(data: [
  'host' => 'localhost',
  'port' => 3306,
  'dbname' => 'phpiggy'
], arg_separator: ';');

$dsn = "{$driver}:{$config}";
$username = "root";
$password = '';

try {
  $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
  die("Unable to connect to database.");
} */

/* try {
  $db->connection->beginTransaction();
  $db->connection->query("INSERT INTO products VALUES(99,'Gloves')");
  $search = "Hats";
  $query = "SELECT * from products WHERE name=:name";
  $stmt = $db->connection->prepare($query);
  $stmt->bindValue('name', 'Gloves', PDO::PARAM_STR);
  $stmt->execute();
  var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
  $db->connection->commit();
} catch (Exception $error) {
  if ($db->connection->inTransaction()) {
    $db->connection->rollBack();
  }

  echo "Transaction failed!";
} */

//$search = "Hats";
//$query = "SELECT * from products WHERE name='{$search}'";
//$query = "SELECT * from products WHERE name=?";
//$query = "SELECT * from products WHERE name=:name";

//$stmt = $db->connection->query($query, PDO::FETCH_ASSOC);
//$stmt = $db->connection->prepare($query);
/* $stmt->execute([
  $search
]); */
/* $stmt->execute([
  'name' => $search
]); */
//$stmt->bindValue('name', $search, PDO::PARAM_STR);

//$stmt->execute();

//var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
