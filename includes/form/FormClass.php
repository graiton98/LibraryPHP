<?php


class Form{
    private $process_file;
    private $button_text;
    private $labelInputArray = [];
    public function __construct($process_file, $button_text) {
        $this->process_file = $process_file;
        $this->button_text = $button_text;
    }
    
    public function addField($labelInput){
        $this->labelInputArray[] = $labelInput;
    }
    
    public function printForm(){
        echo "<form action='$this->process_file' method='POST'>";
        foreach ($this->labelInputArray as $labelInput){
            echo $labelInput;
        }
        echo "<input type='submit' value='$this->button_text'>";
        echo "</form>";
    }
}
