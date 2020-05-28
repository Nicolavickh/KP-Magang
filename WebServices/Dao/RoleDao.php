<?php


class RoleDao implements JsonSerializable
{

    function getAllRole()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM role";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Role');
        $link = null;
        return $result->fetchAll();
    }

    function addRole (Role $r)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO role (name) VALUES (?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $r->getName(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updateRole (Role $r)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE role SET name=? WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $r->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $r->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;

    }

    public function getRole($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM role WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Role');
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