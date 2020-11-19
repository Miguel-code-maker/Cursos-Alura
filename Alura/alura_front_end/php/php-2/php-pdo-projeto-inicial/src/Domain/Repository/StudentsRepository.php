<?php

namespace Alura\Pdo\Domain\Repository;

use Alura\Pdo\Domain\Model\Student;

require_once __DIR__.'/../../../vendor/autoload.php';

interface StudentsRepository {
    public function allStudents(): array;
    public function studentsBirthAt(\DateTimeImmutable $birth_date): array;
    public function studentsWithPhones(): array;
    public function saveStudents(Student $student): bool;
    public function removeStudents(Student $student ): bool;
}