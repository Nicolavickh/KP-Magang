<?php
include_once 'WebServices/Entity/Stage.php';

class InternshipDetailsDao implements JsonSerializable
{
    function getAllInternshipDetailsWithStatus()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM internship_details";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Internship_details');
        $link = null;
        return $result->fetchAll();
    }
    function getAllInternshipDetails()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT c.id AS 'company_id', stu.id AS 'nrp', stu.name AS 'student_name', t.description AS 'topic', p.name AS 'period', sta.name AS 'stage', i.term, i.date, i.status FROM internship_details i JOIN period p ON p.id = i.period_id JOIN stage sta ON sta.id = i.stage_id JOIN student stu ON stu.id = i.student_id JOIN topic t ON t.id = i.topic_id JOIN company c ON c.id = t.company_id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Internship_details');
        $link = null;
        return $result->fetchAll();
    }

    function getAllAppliedTopics()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT i.status, i.student_id, t.description, c.name AS 'company_name', p.name AS 'period_name', sta.name AS 'stage_name', i.status  FROM internship_details i JOIN period p ON p.id = i.period_id JOIN stage sta ON sta.id = i.stage_id JOIN student stu ON stu.id = i.student_id JOIN topic t ON t.id = i.topic_id JOIN company c ON c.id = t.company_id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Internship_details.');
        $link = null;
        return $result->fetchAll();
    }

    function addInternshipDetails(Internship_details $i)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO internship_details (student_id, term, period_id, topic_id, stage_id ) VALUES (?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $i->getStudent()->getId(), PDO::PARAM_STR);
        $statement->bindValue(2, $i->getTerm(), PDO::PARAM_INT);
        $statement->bindValue(3, $i->getPeriod()->getId(), PDO::PARAM_INT);
        $statement->bindValue(4, $i->getTopic()->getId(), PDO::PARAM_INT);
        $statement->bindValue(5, 1, PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function accOrReject(Internship_details $i, Stage $stage)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE internship_details SET status=?, stage_id=? WHERE student_id=? AND topic_id=? AND period_id=? AND stage_id=?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $i->getStatus(), PDO::PARAM_INT);
        $statement->bindValue(2, $stage->getId(), PDO::PARAM_INT);
        $statement->bindValue(3, $i->getStudent()->getId(), PDO::PARAM_STR);
        $statement->bindValue(4, $i->getTopic()->getId(), PDO::PARAM_INT);
        $statement->bindValue(5, $i->getPeriod()->getId(), PDO::PARAM_INT);
        $statement->bindValue(6, $i->getStage()->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
            $res = 1;
        } else {
            $link->rollBack();
            $res = 0;
        }
        $link = null;
        return $res;
    }

    function checkInternshipStatus($studentId){
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT * FROM internship_details WHERE student_id = ? AND (status=0 OR status=1)";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $studentId, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchObject('Internship_details');
        $link = null;
        if ($result == null){
            return (true);
        }else{
            return (false);
        }
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