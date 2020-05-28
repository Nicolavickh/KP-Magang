<?php


class TopicDao implements JsonSerializable
{
    function getAllTopic()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT t.*, c.name FROM topic t JOIN company c ON t.company_id = c.id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Topic');
        $link = null;
        return $result->fetchAll();
    }

    function addTopic(Topic $t)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO topic (description,requirements,facilities,start_date,finish_date,term,benefit,number_of_people,url,company_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $t->getDescription(), PDO::PARAM_STR);
        $statement->bindValue(2, $t->getRequirements(), PDO::PARAM_STR);
        $statement->bindValue(3, $t->getFacilities(), PDO::PARAM_STR);
        $statement->bindValue(4, $t->getStartDate(), PDO::PARAM_STR);
        $statement->bindValue(5, $t->getFinishDate(), PDO::PARAM_STR);
        $statement->bindValue(6, $t->getTerm(), PDO::PARAM_INT);
        $statement->bindValue(7, $t->getBenefit(), PDO::PARAM_STR);
        $statement->bindValue(8, $t->getNumberOfPeople(), PDO::PARAM_STR);
        $statement->bindValue(9, $t->getUrl(), PDO::PARAM_STR);
        $statement->bindValue(10, $t->getCompany()->getId(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function deleteTopic(Topic $t)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "DELETE FROM topic WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $t->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updateTopic(Topic $t)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE topic SET description=?, requirements=?, facilities=?, start_date=?, finish_date=?, term=?, benefit=?, number_of_people=?, url=?, company_id=? WHERE id = ?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $t->getDescription(), PDO::PARAM_STR);
        $statement->bindValue(2, $t->getRequirements(), PDO::PARAM_STR);
        $statement->bindValue(3, $t->getFacilities(), PDO::PARAM_STR);
        $statement->bindValue(4, $t->getStartDate(), PDO::PARAM_STR);
        $statement->bindValue(5, $t->getFinishDate(), PDO::PARAM_STR);
        $statement->bindValue(6, $t->getTerm(), PDO::PARAM_INT);
        $statement->bindValue(7, $t->getBenefit(), PDO::PARAM_STR);
        $statement->bindValue(8, $t->getNumberOfPeople(), PDO::PARAM_STR);
        $statement->bindValue(9, $t->getUrl(), PDO::PARAM_STR);
        $statement->bindValue(10, $t->getCompany()->getId(), PDO::PARAM_STR);
        $statement->bindValue(11, $t->getId(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;

    }

    public function getTopic($id)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT t.*, c.* FROM topic t JOIN company c ON t.company_id = c.id WHERE t.id = ?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Topic');
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