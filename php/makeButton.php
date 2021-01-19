<?php


class makeButton {

    private $id;
    private $class;
    private $action;
    private $type;

    function __construct($label, $id, $action, $class = "btn") {
	$this->id = $id;
	$this->class = $class;
	$this->action = $action;
	$this->label = $label;
	
    }

    public function setType($type): void {
	$this->type = $type;
    }

    public function pushOutHTML() {
	$back = '<button class="w3-mobile ' . $this->class . '" onclick="' . $this->action . '" type="' . $this->type . '" id="' . $this->id . '">'.$this->label.'</button>';
	return $back;
    }

}
?>
    
