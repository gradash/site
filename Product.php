<?php
ini_set('display_errors', 1);
//print_r($_POST);

interface Persistable
{
    public function persistFields(): array; // fields that will be saved in db
    public function persistTable(): string; // db table name
}

class Product implements Persistable
{
    protected $id;
    protected $productType;
    protected $sku;
    protected $name;
    protected $price;
    protected $db;

// reading data from _POST and forming set method calls.
    public function __construct(array $formData)
    {
        foreach ($formData as $formField => $formValue) {
            $methodName = 'set' . ucfirst($formField);
            if (method_exists($this, $methodName)) {
                $this->$methodName($formValue);
            }
        }

        $this->db = new DB();
    }
// calling database method to save data
    public function persist()
    {
        $this->db->persist($this);
    }

// getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
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
// fields to save
    public function persistFields(): array
    {
        return [
            'id' => $this->id,
            'productType' => $this->productType,
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
// dbtable name
    public function persistTable(): string
    {
        return 'shopDB';
    }

}

$formData = $_POST;
