<?php
ini_set('display_errors', 1);
//print_r($_POST);



interface Persistable
{
    public function persistFields(): array;
    public function persistTable(): string;
}


class Product implements Persistable
{
    protected $id;
    protected $productType;
    protected $sku;
    protected $name;
    protected $price;
    protected $db;
    

    public function __construct(array $formData)
    {
        foreach($formData as $formField => $formValue) {
             $methodName = 'set'.ucfirst($formField);
            if (method_exists($this, $methodName)) {
                $this->$methodName($formValue);
            }
        }

        $this->db = new DB();
    }

    public function persist()
    {
        // TODO try catch
        $this->db->persist($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProductType()
    {
        return $this->productType;
    }
    public function setProductType($productType)
    {
        return $this->productType = $productType;
    }
    public function getSku()
    {
        return $this->sku;
    }
    public function setSku($sku)
    {
        return $this->sku = $sku;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        return $this->name = $name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        return $this->price = $price;
    }


    public function persistFields(): array
    {
        return [
            'productType' => $this->productType,
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
    public function persistTable(): string
    {
        return 'shopdb';
    }

}

//require_once "Db.php";
//require_once "Dvd.php";
//require_once "Book.php";
//require_once "Furniture.php";



$formData = $_POST;

/*if ($_POST) {
    if($_POST["productType"] === "DVD"){
        $x = (new DVD($formData));
    } 
    if($_POST["productType"] === "Book"){
        $x = (new Book($formData));
    } 
    if($_POST["productType"] === "Furniture"){
        $x = (new Furniture($formData));
    }
    $x->persist();

    header('Location: /');

}


*/

