<?php


class AcademicYearDao implements JsonSerializable
{

    function getAllAcademicYear()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM academic_year";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Academic_year');
        $link = null;
        return $result->fetchAll();
    }

    function addAcademicYear (Academic_year $a)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO academic_year (year) VALUES (?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $a->getYear(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function deleteAcademicYear (Academic_year $a)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "DELETE FROM academic_year WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $a->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updateAcademicYear (Academic_year $a)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE academic_year SET year=? WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $a->getYear(), PDO::PARAM_STR);
        $statement->bindValue(2, $a->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;

    }

    public function getAcademicYear($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM academic_year WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Academic_year');
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