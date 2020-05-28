<?php


class StageDao implements JsonSerializable
{

    function getAllStage()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM stage";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Stage');
        $link = null;
        return $result->fetchAll();
    }

    function addStage (Stage $s)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO stage (name) VALUES (?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $s->getName(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function deleteStage (Stage $s)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "DELETE FROM stage WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $s->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updateStage (Stage $s)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE stage SET name=? WHERE id = ?";
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

    public function getStage($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM stage WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Stage');
        $link = null;
        return $result;
    }

    public function getFinishedStage()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM stage WHERE name = 'Finished'";
        $statement = $link->prepare($query);
        $statement->execute();
        $result = $statement->fetchObject('Stage');
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