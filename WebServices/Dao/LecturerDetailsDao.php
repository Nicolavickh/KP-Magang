<?php


class LecturerDetailsDao implements JsonSerializable
{

    function getAllLecturerDetails()
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT l.id AS 'lecturer_id', l.name AS 'lecturer_name' , r.id AS 'role_id', r.name AS 'role_name', ay.id AS 'academic_year_id', ay.year AS 'year', s.id AS 'semester_id', s.name AS 'semester_name', ld.status AS 'status' FROM lecturer_details ld JOIN lecturer l ON ld.lecturer_id = l.id JOIN role r ON r.id = ld.role_id JOIN academic_year ay ON ld.academic_year_id = ay.id JOIN semester s ON s.id = ld.semester_id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Lecturer_details');
        $link = null;
        return $result->fetchAll();
    }

    function addLecturerDetails (Lecturer_details $l)
    {
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "INSERT INTO lecturer_details (lecturer_id, role_id, academic_year_id, semester_id, status) VALUES (?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $l->getLecturer()->getId(), PDO::PARAM_STR);
        $statement->bindValue(2, $l->getRole()->getId(), PDO::PARAM_INT);
        $statement->bindValue(3, $l->getAcademicYear()->getId(), PDO::PARAM_INT);
        $statement->bindValue(4, $l->getSemester()->getId(), PDO::PARAM_INT);
        $statement->bindValue(5, 1, PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function updateLecturerDetails(Lecturer_details $l)
    {
        $res = 0;
        $link = db_Helper::createMySQLConnection();
        $link->beginTransaction();
        $query = "UPDATE lecturer_details SET status=? WHERE lecturer_id = ? AND role_id=? AND academic_year_id=? AND semester_id=?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $l->getStatus(), PDO::PARAM_INT);
        $statement->bindValue(2, $l->getLecturer()->getId(), PDO::PARAM_STR);
        $statement->bindValue(3, $l->getRole()->getId(), PDO::PARAM_INT);
        $statement->bindValue(4, $l->getAcademicYear()->getId(), PDO::PARAM_INT);
        $statement->bindValue(5, $l->getSemester()->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
            $res = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $res;
    }

    public function getLecturerDetails($lecturerId, $roleId, $semesterId, $yearId)
    {
        $link = db_Helper::createMySQLConnection();
        $query = "SELECT l.id AS 'lecturer_id', l.name AS 'lecturer_name' , r.id AS 'role_id', r.name AS 'role_name', ay.id AS 'academic_year_id', ay.year AS 'year', s.id AS 'semester_id', s.name AS 'semester_name', ld.status AS 'status' FROM lecturer_details ld JOIN lecturer l ON ld.lecturer_id = l.id JOIN role r ON r.id = ld.role_id JOIN academic_year ay ON ld.academic_year_id = ay.id JOIN semester s ON s.id = ld.semester_id WHERE ld.lecturer_id=? AND ld.role_id=? AND ld.academic_year_id=? AND ld.semester_id=?";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $lecturerId, PDO::PARAM_STR);
        $statement->bindParam(2, $roleId, PDO::PARAM_INT);
        $statement->bindParam(3, $yearId, PDO::PARAM_INT);
        $statement->bindParam(4, $semesterId, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Lecturer_details');
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