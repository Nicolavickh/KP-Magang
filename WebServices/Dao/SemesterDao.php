<?php


class SemesterDao implements JsonSerializable
{

    function getAllSemester()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM semester";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Semester');
        $link = null;
        return $result->fetchAll();
    }

    function addSemester (Semester $s)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO semester (name) VALUES (?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $s->getName(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function deleteSemester (Semester $s)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "DELETE FROM semester WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $s->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updateSemester (Semester $s)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE semester SET name=? WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $s->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $s->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;

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