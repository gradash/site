<?php
require_once "Product.php";
require_once "Dvd.php";
require_once "Book.php";
require_once "Furniture.php";

class DB
{
    private $user = "root";
    private $pass = "";
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=myshop', $this->user, $this->pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function persist(Persistable $object)
    {
        //var_dump($object);
        $keys = implode(",", array_keys($object->persistFields()));

        $values = ":" . implode(",:", array_keys($object->persistFields()));

        $query = 'INSERT ' . ' INTO ' . $object->persistTable() . ' (' . $keys . ') VALUES (' . $values . ')';

        //var_dump($query);

        $sth = $this->connection->prepare($query);
        $sth->execute($object->persistFields());

    }

    public function showAll()
    {

        $query = $this->connection->query('SELECT * FROM shopDB ORDER BY sku');
        $products = [];
        while ($row = $query->fetch()) {

            if ($row['productType'] === 'Book') {
                $products[] = new Book($row);
            }

            if ($row['productType'] === 'DVD') {
                $products[] = new DVD($row);
            }

            if ($row['productType'] === 'Furniture') {
                $products[] = new Furniture($row);
            }

        }
        return $products;
    }

}
