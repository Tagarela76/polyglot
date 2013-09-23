<?php
class polyglotUserGroup{
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


}
?>