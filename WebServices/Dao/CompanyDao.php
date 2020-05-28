<?php

include_once 'WebServices/Entity/Student.php';

class CompanyDao implements JsonSerializable
{

    function getAllCompany()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM company";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Company');
        $link = null;
        return $result->fetchAll();
    }

    function getAllStudents()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT i.*, sta.name AS 'stage_name', c.name AS 'company_name', c.id AS 'company_id', s.id AS 'student_id', s.name AS 'student_name', s.email, s.phone, s.cv, s.transcript, s.photo, t.description FROM student s JOIN internship_details i ON i.student_id=s.id JOIN stage sta ON sta.id = i.stage_id JOIN topic t ON t.id = i.topic_id JOIN company c ON c.id=t.company_id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Company');
        $link = null;
        return $result->fetchAll();
    }

    function addCompany(Company $c)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO company (name, email, phone, address, username, password) VALUES (?,?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $c->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $c->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(3, $c->getPhone(), PDO::PARAM_STR);
        $statement->bindValue(4, $c->getAddress(), PDO::PARAM_STR);
        $statement->bindValue(5, $c->getUsername(), PDO::PARAM_STR);
        $statement->bindValue(6, md5($c->getPassword()), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function getCompany($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM company WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Company');
        $link = null;
        return $result;
    }

    function getApplyingStudents($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT s.id, s.name, s.email, s.phone, s.cv, s.transcript, s.photo, t.description FROM student s JOIN internship_details i ON i.student_id=s.id JOIN topic t ON t.id = i.topic_id JOIN company c ON c.id=t.company_id WHERE c.id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch();
        $link = null;
        return $result;
    }

    function updateCompany(Company $c)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE company SET name=?, email=?, phone=?, address=?, username=?, password=? WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $c->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $c->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(3, $c->getPhone(), PDO::PARAM_STR);
        $statement->bindValue(4, $c->getAddress(), PDO::PARAM_STR);
        $statement->bindValue(5, $c->getUsername(), PDO::PARAM_STR);
        $statement->bindValue(6, $c->getPassword(), PDO::PARAM_STR);
        $statement->bindValue(7, $c->getId(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;

    }

    function deleteCompany(Company $c)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "DELETE FROM company WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $c->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }


    function companyLogin(Company $c)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM company WHERE username = ? AND password = ? LIMIT 1";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $c->getUsername(), PDO::PARAM_STR);
        $statement->bindValue(2, md5($c->getPassword()), PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchObject('Company');
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