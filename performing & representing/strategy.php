<?php 

class Product{
    private string $name;
    private string $category;
    private float $taxes;
    private float $price;

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) : Product{
        $this->name = $name;
        return $this;
    }

    public function getCategory() : string {
        return $this->category;
    }

    public function setCategory(string $category) : Product{
        $this->category = $category;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function getTaxes(): float
    {
        return $this->taxes;
    }

    public function setTaxes(float $taxes): Product
    {
        $this->taxes = $taxes;
        return $this;
    }
}

interface TaxCaculatorStrategy{
    public function caculate(Product $product) : float;
}

class FoodTaxStrategy implements TaxCaculatorStrategy{
    const TAX_RATE = 30;
    public function caculate(Product $product) : float
    {
        return $product->getPrice() * (self::TAX_RATE / 100);
    }
}

class ElectronicTaxStrategy implements TaxCaculatorStrategy{
    const TAX_RATE = 40;
    public function caculate(Product $product) : float
    {
        return $product->getPrice() * (self::TAX_RATE / 100);
    }
}

class TaxFreeStrategy implements TaxCaculatorStrategy{
    public function caculate(Product $product) : float
    {
        return 0;
    }
}

class Context{
    public function __construct(public TaxCaculatorStrategy $taxCaculatorStrategy)
    {
        
    }

    public function caculateProduct(Product $product){
        $taxes = $this->taxCaculatorStrategy->caculate($product);
        $product->setTaxes($taxes);
    }
}

$product = new Product;
$product->setName("Lamp")->setCategory('electronic')->setPrice(1000);

switch($product->getCategory()){
    case 'foods' : 
        $strategy = new FoodTaxStrategy;
        break;
    case 'electronic' : 
        $strategy = new ElectronicTaxStrategy;
        break;
    case 'books' : 
        $strategy = new TaxFreeStrategy;
        break;
    default : 
        throw new \Exception('Class Not Found');  
}

$context = new Context($strategy);
$context->caculateProduct($product);

echo $product->getTaxes();
?>