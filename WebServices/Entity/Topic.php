<?php
include_once 'Company.php';

class Topic implements JsonSerializable
{

    private $id;
    private $description;
    private $requirements;
    private $facilities;
    private $start_date;
    private $finish_date;
    private $term;
    private $benefit;
    private $number_of_people;
    private $url;
    private $company;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @param mixed $requirements
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
    }

    /**
     * @return mixed
     */
    public function getFacilities()
    {
        return $this->facilities;
    }

    /**
     * @param mixed $facilities
     */
    public function setFacilities($facilities)
    {
        $this->facilities = $facilities;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param mixed $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * @return mixed
     */
    public function getFinishDate()
    {
        return $this->finish_date;
    }

    /**
     * @param mixed $finish_date
     */
    public function setFinishDate($finish_date)
    {
        $this->finish_date = $finish_date;
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
    public function getBenefit()
    {
        return $this->benefit;
    }

    /**
     * @param mixed $benefit
     */
    public function setBenefit($benefit)
    {
        $this->benefit = $benefit;
    }

    /**
     * @return mixed
     */
    public function getNumberOfPeople()
    {
        return $this->number_of_people;
    }

    /**
     * @param mixed $number_of_people
     */
    public function setNumberOfPeople($number_of_people)
    {
        $this->number_of_people = $number_of_people;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function __set($name, $value)
    {
        if (!isset($this->company)) {
            $this->company = new Company();
        }
        if (isset($value)) {
            switch ($name) {
                case 'company_id':
                    $this->company->setId($value);
                    break;
                case 'name':
                    $this->company->setName($value);
                    break;
                case 'email':
                    $this->company->setEmail($value);
                    break;
                case 'phone':
                    $this->company->setPhone($value);
                    break;
                case 'address':
                    $this->company->setAddress($value);
                    break;
                case 'username':
                    $this->company->setUsername($value);
                    break;
                case 'password':
                    $this->company->setPassword($value);
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