<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tenant_products")
 */
class TenantProduct
{
    /**
     * @var ProductIdentifier
     * @ORM\Embedded(class="ProductIdentifier")
     */
    private $identifier;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @return ProductIdentifier
     */
    public function getIdentifier(): ProductIdentifier
    {
        return $this->identifier;
    }

    /**
     * @param ProductIdentifier $identifier
     */
    public function setIdentifier(ProductIdentifier $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}