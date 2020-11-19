<?php

namespace Alura\Pdo\Domain\Model;
use Alura\Pdo\Domain\Model\Phone;

class Student
{
    private ?int $id;
    private string $name;
    private \DateTimeInterface $birthDate;
    /** @var Phone[] */
    private array $phones = [];

    public function __construct(?int $id, string $name, \DateTimeInterface $birthDate) {
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function defineId(int $id) {
        if (!$this->id == null) {
            throw new \DomainException("vc só pode definir o id uma vez.");
        }

        $this->id = $id;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function birthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function age(): int
    {
        return $this->birthDate
            ->diff(new \DateTimeImmutable())
            ->y;
    }

    public function addPhone(Phone $phone): void {
        $this->phones[] = $phone;
    }

    /** @return Phones[] */
    public function phones(): array {
        return $this->phones;
    }

    public function __get($name) {
        return $this->$name();
    }
}
