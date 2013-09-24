<?php

class polyglotUserGroup
{

    /**
     *
     * id group
     * 
     * @var int 
     */
    protected $id;

    /**
     *
     * group description
     * 
     * @var string 
     */
    protected $description;
    
    public function __construct($id = null)
    {
        if (isset($id)) {
            $this->setId($id);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Ini object by properties array in key=>value format
     *
     * @param array $array
     */
    public function initByArray($array)
    {
        foreach ($array as $key => $value) {
            try {
                $this->$key = $value;
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }
    }

}
?>