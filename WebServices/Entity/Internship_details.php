<?php

include_once 'Student.php';
include_once 'Stage.php';
include_once 'Topic.php';
include_once 'Period.php';
include_once 'Company.php';
include_once '../Dao/CompanyDao.php';

class Internship_details implements JsonSerializable
{

    private $topic;
    private $period;
    private $student;
    private $status;
    private $date;
    private $term;
    private $stage;

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param mixed $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
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

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * @param mixed $term
     */
    public function setTerm($term)
    {
        $this->term = $term;
    }

    /**
     * @return mixed
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * @param mixed $stage
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
    }

    public function __set($name, $value)
    {
        if (!isset($this->topic)) {
            $this->topic = new Topic();
        }
        if (!isset($this->period)) {
            $this->period = new Period();
        }
        if (!isset($this->student)) {
            $this->student = new Student();
        }
        if (!isset($this->stage)) {
            $this->stage = new Stage();
        }

        if (isset($value)) {
            switch ($name) {
                case 'topic_id':
                    $this->topic->setId($value);
                    break;
                case 'description':
                    $this->topic->setDescription($value);
                    break;
                case 'requirement':
                    $this->topic->setRequirements($value);
                    break;
                case 'facilities':
                    $this->topic->setFacilities($value);
                    break;
                case 'start_date':
                    $this->topic->setStartDate($value);
                    break;
                case 'finish_date':
                    $this->topic->setFinishDate($value);
                    break;
                case 'url':
                    $this->topic->setUrl($value);
                    break;
                case 'company_id':
                    $companyDao = new CompanyDao();
                    $company = $companyDao->getCompany($value);
                    $this->topic->setCompany($company);
                    break;
                case 'term':
                    $this->topic->setTerm($value);
                    break;
                case 'benefit':
                    $this->topic->setBenefit($value);
                    break;
                case 'number_of_people':
                    $this->topic->setNumberOfPeople($value);
                    break;
                case 'period_id':
                    $this->period->setId($value);
                    break;
                case 'period_name':
                    $this->period->setName($value);
                    break;
                case 'student_id':
                    $this->student->setId($value);
                    break;
                case 'student_name':
                    $this->student->setName($value);
                    break;
                case 'email':
                    $this->student->setEmail($value);
                    break;
                case 'phone':
                    $this->student->setPhone($value);
                    break;
                case 'password':
                    $this->student->setPassword($value);
                    break;
                case 'photo':
                    $this->student->setPhoto($value);
                    break;
                case 'cv':
                    $this->student->setCv($value);
                    break;
                case 'transcript':
                    $this->student->setTranscript($value);
                    break;
                case 'stage_id':
                    $this->stage->setId($value);
                    break;
                case 'stage_name':
                    $this->stage->setName($value);
                    break;
                case 'address':
                    $this->student->setAddress($value);
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
        // TODO: Implement jsonSerialize() method.
    }
}