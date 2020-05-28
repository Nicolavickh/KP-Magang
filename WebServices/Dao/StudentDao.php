<?php


class StudentDao implements JsonSerializable
{

    function getAllStudent()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM student";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Student');
        $link = null;
        return $result->fetchAll();
    }

    function addStudent(Student $s)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO student (id,name,email,phone,password,photo,cv,transcript,address,active) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $s->getId(), PDO::PARAM_STR);
        $statement->bindValue(2, $s->getName(), PDO::PARAM_STR);
        $statement->bindValue(3, $s->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(4, $s->getPhone(), PDO::PARAM_STR);
        $statement->bindValue(5, md5($s->getPassword()), PDO::PARAM_STR);
        $statement->bindValue(6, $s->getPhoto(), PDO::PARAM_STR);
        $statement->bindValue(7, $s->getCv(), PDO::PARAM_STR);
        $statement->bindValue(8, $s->getTranscript(), PDO::PARAM_STR);
        $statement->bindValue(9, $s->getAddress(), PDO::PARAM_STR);
        $statement->bindValue(10, 1, PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updateStudent(Student $s)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE student SET name=?, email=?, phone=?, password=?, photo=?, cv=?, transcript=?, address=? WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $s->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $s->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(3, $s->getPhone(), PDO::PARAM_STR);
        $statement->bindValue(4, $s->getPassword(), PDO::PARAM_STR);
        $statement->bindValue(5, $s->getPhoto(), PDO::PARAM_STR);
        $statement->bindValue(6, $s->getCv(), PDO::PARAM_STR);
        $statement->bindValue(7, $s->getTranscript(), PDO::PARAM_STR);
        $statement->bindValue(8, $s->getAddress(), PDO::PARAM_STR);
        $statement->bindValue(9, $s->getId(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;

    }

    function getStudent($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM student WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Student');
        $link = null;
        return $result;
    }

    function login(Student $s)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM student WHERE id = ? AND password=? LIMIT 1";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $s->getId(), PDO::PARAM_STR);
        $statement->bindValue(2, md5($s->getPassword()), PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchObject('Student');
        $link = null;
        return $result;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}