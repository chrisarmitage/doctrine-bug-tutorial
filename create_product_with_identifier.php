<?php

// create_product.php <name>
require_once "bootstrap.php";

$newProductName = $argv[1];

$product = new TenantProduct();
$product->setIdentifier(ProductIdentifier::forTenant(6));
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with Identifier " . $product->getIdentifier() . "\n";