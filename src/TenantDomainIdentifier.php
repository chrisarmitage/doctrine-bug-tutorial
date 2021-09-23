<?php

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

abstract class TenantDomainIdentifier
{
    /**
     * @var UuidInterface
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    protected $uuid;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    protected $tenant;

    protected function __construct(?UuidInterface $uuid, $tenant)
    {
        $this->uuid = $uuid ?? Uuid::uuid4();
        $this->tenant = $tenant;
    }

    public function __toString(): string
    {
        return $this->tenant . ':' . $this->uuid->toString();
    }

    public static function fromString(string $value, $tenant)
    {
        return new static(Uuid::fromString($value), $tenant);
    }

    public static function forTenant($tenant)
    {
        return new static(null, $tenant);
    }

    public function equals($other): bool
    {
        return $other instanceof self
            && $this->uuid->equals($other->uuid)
            && $this->tenant = $other->tenant;
    }
}