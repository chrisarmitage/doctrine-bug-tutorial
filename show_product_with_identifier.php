<?php
// show_product.php <id>
require_once "bootstrap.php";

$uuid = $argv[1];
$tenant = $argv[2];
$identifier = ProductIdentifier::fromString($uuid, $tenant);

/** @var \Doctrine\ORM\EntityManager $entityManager */
$product = $entityManager->getRepository('TenantProduct')
    ->findOneBy([
        'identifier.uuid' => $uuid,
        'identifier.tenant' => $tenant,
    ]);

if ($product === null) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("-%s\n", $product->getName());