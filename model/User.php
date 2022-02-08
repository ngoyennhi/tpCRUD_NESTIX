<?php
class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $userName;
    private $email;

    /**
     * Get the value of ID
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get the value of firstName
     */
    public function getfirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setfirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

}
