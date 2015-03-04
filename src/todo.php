<?php
    class ToDo{

        private $description;

        function __construct($descrip){
            $this->description = $descrip;
        }

        function setDescription($new_description)
        {
            $this->description = (string) $new_description;
        }

        function getDescription()
        {
            return $this->description;
        }
    }

?>
