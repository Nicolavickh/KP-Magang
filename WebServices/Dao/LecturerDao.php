<?php


class LecturerDao implements JsonSerializable
{
    function getAllLecturer()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM lecturer";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Lecturer');
        $link = null;
        return $result->fetchAll();
    }

    function addLecturer (Lecturer $l)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO lecturer (id,name,email,phone,password) VALUES (?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $l->getId(), PDO::PARAM_STR);
        $statement->bindValue(2, $l->getName(), PDO::PARAM_STR);
        $statement->bindValue(3, $l->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(4, $l->getPhone(), PDO::PARAM_STR);
        $statement->bindValue(5, md5($l->getPassword()), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function deleteLecturer(Lecturer $l)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "DELETE FROM lecturer WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $l->getId(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updateLecturer(Lecturer $l)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE lecturer SET name=?, email=?, phone=?, password=? WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $l->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $l->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(3, $l->getPhone(), PDO::PARAM_STR);
        $statement->bindValue(4, $l->getPassword(), PDO::PARAM_STR);
        $statement->bindValue(5, $l->getId(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function getLecturer($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM lecturer WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchObject('Lecturer');
        $link = null;
        return $result;
    }

    function lecturerLogin(Lecturer $l)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT l.*, r.name AS 'role_name' FROM lecturer l JOIN lecturer_details ld ON l.id = ld.lecturer_id JOIN role r ON ld.role_id = r.id WHERE l.id = ? AND l.password = ? LIMIT 1";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $l->getId(), PDO::PARAM_STR);
        $statement->bindValue(2, md5($l->getPassword()), PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchObject('Lecturer');
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