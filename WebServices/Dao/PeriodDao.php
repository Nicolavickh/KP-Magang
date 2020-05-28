<?php


class PeriodDao implements JsonSerializable
{

    function getAllPeriod()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM period";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Period');
        $link = null;
        return $result->fetchAll();
    }

    function addPeriod (Period $p)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO period (name,status) VALUES (?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $p->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, 1, PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function deletePeriod (Period $p)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "DELETE FROM period WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $p->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updatePeriod (Period $p)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE period SET name=?, status=? WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $p->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $p->getStatus(), PDO::PARAM_INT);
        $statement->bindValue(3, $p->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    public function getPeriod($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM period WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Period');
        $link = null;
        return $result;
    }
    public function getActivePeriod()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM period WHERE status = 1";
        $statement = $link->prepare($query);
        $statement->execute();
        $result = $statement->fetchObject('Period');
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