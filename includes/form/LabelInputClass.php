<?php

class LabelInput{
    private $hiddenName;
    private $visibleName;
    private $type;
    public function __construct($hiddenName, $visibleName, $type) {
        $this->hiddenName = $hiddenName;
        $this->visibleName = $visibleName;
        $this->type = $type;
    }
    
    public function __toString() {
     
        return "<label for='$this->hiddenName'>$this->visibleName</label>"
                . "<br>"
                . "<input type='".$this->type."' name='".$this->hiddenName."' required=''><br>";
    }
}
