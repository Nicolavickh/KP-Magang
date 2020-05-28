<?php
include_once 'Role.php';
include_once 'Semester.php';
include_once 'Lecturer.php';
include_once 'Academic_year.php';

class lecturer_details implements JsonSerializable
{
    private $lecturer;
    private $role;
    private $academic_year;
    private $semester;
    private $status;

    /**
     * @return mixed
     */
    public function getLecturer()
    {
        return $this->lecturer;
    }

    /**
     * @param mixed $lecturer
     */
    public function setLecturer($lecturer)
    {
        $this->lecturer = $lecturer;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getAcademicYear()
    {
        return $this->academic_year;
    }

    /**
     * @param mixed $academic_year
     */
    public function setAcademicYear($academic_year)
    {
        $this->academic_year = $academic_year;
    }

    /**
     * @return mixed
     */
    public function getSemester()
    {
        return $this->semester;
    }

    /**
     * @param mixed $semester
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function __set($name, $value)
    {
        if (!isset($this->role)) {
            $this->role = new Role();
        }
        if (!isset($this->semester)) {
            $this->semester = new Semester();
        }
        if (!isset($this->academic_year)) {
            $this->academic_year = new Academic_year();
        }
        if (!isset($this->lecturer)) {
            $this->lecturer = new Lecturer();
        }

        if (isset($value)) {
            switch ($name) {
                case 'role_id':
                    $this->role->setId($value);
                    break;
                case 'role_name':
                    $this->role->setName($value);
                    break;
                case 'semester_id':
                    $this->semester->setId($value);
                    break;
                case 'semester_name':
                    $this->semester->setName($value);
                    break;
                case 'academic_year_id':
                    $this->academic_year->setId($value);
                    break;
                case 'year':
                    $this->academic_year->setYear($value);
                    break;
                case 'lecturer_id':
                    $this->lecturer->setId($value);
                    break;
                case 'lecturer_name':
                    $this->lecturer->setName($value);
                    break;
                case 'email':
                    $this->lecturer->setEmail($value);
                    break;
                case 'phone':
                    $this->lecturer->setPhone($value);
                    break;
                case 'password':
                    $this->lecturer->setPassword($value);
                    break;
                default:
                    break;
            }
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