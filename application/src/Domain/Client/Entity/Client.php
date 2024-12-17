<?php

declare(strict_types=1);

namespace Americor\Domain\Client\Entity;

use Americor\Domain\Client\ValueObject\Address;
use Americor\Domain\Client\ValueObject\Age;
use Americor\Domain\Client\ValueObject\Email;
use Americor\Domain\Client\ValueObject\FicoCreditScore;
use Americor\Domain\Client\ValueObject\PhoneNumber;
use Americor\Domain\Common\Entity\BaseEntity;
use Americor\Domain\Common\ValueObject\Money;
use Americor\Domain\Common\ValueObject\Name;
use Americor\Domain\Common\ValueObject\Ssn;

class Client extends BaseEntity
{
    public function __construct(
        public Ssn $ssn,
        public Name $lastName,
        public Name $name,
        public Age $age,
        public Address $address,
        public Email $email,
        public PhoneNumber $phoneNumber,
        public Money $monthlyIncome,
        public ?FicoCreditScore $ficoCreditScore = null,
    ) {
    }

    public function updateName(Name $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function updateLastName(Name $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function updateAge(Age $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function updateAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function updateEmail(Email $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function updatePhoneNumber(PhoneNumber $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function updateMonthlyIncome(Money $monthlyIncome): self
    {
        $this->monthlyIncome = $monthlyIncome;

        return $this;
    }

    public function updateFicoCreditScore(?FicoCreditScore $ficoCreditScore): self
    {
        $this->ficoCreditScore = $ficoCreditScore;

        return $this;
    }
}
