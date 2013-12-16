<?php namespace Rightleaf\Cart;

class ProductException extends \Exception {}

abstract Class Product {

    protected $id = NULL;
    protected $price = 0;
    protected $priceOverride = 0;
    protected $name = 'Unkown Product';
    protected $quantity = 0;

    /**
     * @param int $quantity
     * @param string $name
     * @param int $price
     * @param null $id
     */
    public function __construct($quantity = 1, $name = 'Foo', $price = 1, $id = 1)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPrice($price);
        $this->setQuantity($quantity);
    }


    /**
     * return current price
     *
     * @return void
     * @author
     **/
    public function getPrice()
    {
        if ($this->priceOverride != 0) {
            return $this->priceOverride;
        } else {
            return number_format($this->price);
        }
    }

    /**
     * Get the product's name
     *
     * @return void
     * @author
     **/
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the product's Id
     *
     * @return void
     * @author
     **/
    public function getId()
    {
        return $this->id;
    }

    /**
     * get the products quantity
     *
     * @return void
     * @author
     **/
    public function getQuantity()
    {
        return $this->quantity;
    }


    /**
     * Return the value of this * qty
     *
     * @return void
     * @author
     **/
    public function getLineTotal()
    {
        return $this->getQuantity() * $this->getPrice();
    }

    /**
     * Set the quantity
     *
     * @return void
     * @author
     **/
    public function setQuantity($quantity)
    {
        if(!is_int($quantity) || $quantity < 0)
        {
            throw new ProductException('Quantity must be a positive integer > 0');
        }

        $this->quantity = $quantity;
    }

    /**
     * Set the ID
     *
     * @return void
     * @author
     **/
    public function setId ($id)
    {
        if(strlen(trim($id)) <= 0)
        {
            throw new ProductException("Id must contain something");
        }

        $this->id = $id;
        return $this;
    }

    /**
     * Set the price of the product
     *
     * @return void
     * @author
     **/
    public function setPrice($price)
    {
        if(!is_numeric($price) || $price < 0)
        {
            throw new ProductException("Price must be a positive integer");
        }

        $this->price = $price;
        return $this;
    }

    public function setPriceOverride($price)
    {
        if(!is_numeric($price) || $price < 0)
        {
            throw new ProductException("Override Price must be a positive integer.")
        }

        $this->priceOverride = $price;
        return $this;
    }

    /**
     * Set the name
     *
     * @return void
     * @author
     **/
    public function setName($name)
    {
        if(strlen($name) > 0)
        {
            $this->name = $name;
        }
        return $this;

    }
}