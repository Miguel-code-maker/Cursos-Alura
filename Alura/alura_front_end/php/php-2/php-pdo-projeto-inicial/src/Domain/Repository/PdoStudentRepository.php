<?php


namespace Alura\Pdo\Domain\Repository;

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Model\Student;
use PDO;

require_once __DIR__.'/../../../vendor/autoload.php';


class PdoStudentRepository implements StudentsRepository {
    protected PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function allStudents(): array {
        $response = $this->connection->query("SELECT * FROM students;");

        return $this->studentList($response);
    }

    public function studentsBirthAt(\DateTimeImmutable $birth_date): array {
        $response = $this->connection->query("SELECT * FROM students WHERE birth_date = ?;");
        $response->bindValue(1, $birth_date->format('Y-m-d'));
        $response->execute();

        return $this->studentList($response);
    }

    private function studentList(\PDOStatement $statamentQuery) {
        $listStatament = $statamentQuery->fetchAll();
        $studentList = [];

        foreach($listStatament as $statament) {
            $studentList[] = new Student(
                $statament['id'],
                $statament['name'],
                new \DateTimeImmutable($statament['birth_date']));
        }

        return $studentList;
    }

//    private function fillPhoneOf(Student $student) {
//        $response = $this->connection->prepare("SELECT id, area_code, number FROM phones WHERE student_id = ?");
//        $response->bindValue(1, $student->id(), PDO::PARAM_INT);
//        $response->execute();
//
//        $phonesDataList = $response->fetchAll();
//        foreach ($phonesDataList as $phonesData) {
//            $phone = new Phone($phonesData['id'], $phonesData['area_code'], $phonesData['number']);
//
//            $student->addPhone($phone);
//        }
//    }

    public function saveStudents(Student $student): bool {
        if ($student->id == null) {
            return $this->insert($student);
        }
        return $this->update();

    }

    private function insert(Student $student) {
        $response = $this->connection->prepare("INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);");

        $sucesses = $response->execute([
            ':name' => $student->name,
            ':birth_date' => $student->birthDate()->format('Y-m-d')
        ]);

        $student->defineId($this->connection->lastInsertId());

        return $sucesses;
    }

    public function update(Student $student) {
        $response = $this->connection->prepare("UPDATE studetns SET name = :name, birth_date = :date;");
        $response->bindValue(':name', $student->name);
        $response->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        return $response->execute();
    }

    public function removeStudents(Student $student): bool {
        if ($student->id == null) {
            throw new \DomainException("aluno não esta enserido na tabela");
        }
        $response = $this->connection->prepare("DELETE FROM students WHERE id = ?;");
        $response->bindValue(1, $student->id());
        return $response->execute();
    }

    public function studentsWithPhones(): array {
        $slqQuery = "SELECT students.id , students.name, students.birth_date,
                            phones.id AS phones_id, phones.area_code, phones.number
                     FROM students
                     JOIN phones ON students.id = phones.student_id;"
        ;
        $response = $this->connection->query($slqQuery);
        $result = $response->fetchAll();
        $studentList = [];

        foreach ($result as $row) {
            if (!array_key_exists($row['id'], $studentList)) {
                $studentList[$row['id']] = new Student($row['id'], $row['name'], new \DateTimeImmutable($row['birth_date']));
            }
            $phone = new Phone($row['phones_id'], $row['area_code'], $row['number']);
            $studentList[$row['id']]->addPhone($phone);

        }

        return $studentList;
    }
}