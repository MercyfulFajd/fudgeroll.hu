<?php
require_once 'makeInput.php';
class makeForm {
    private $action;
    private $method;
    private $id;
    private $submitLabel;
    private $resetLabel;
    private $cancelLabel;
    private $fields;
    private $class;
	    
    

        
    function __construct($action="", $method="post", $id="formId") {
	$this->action = $action;
	$this->method = $method;
	$this->id = $id;
	$this->submitLabel = "Uzsgyi";
	$this->resetLabel = "Pánik";
	$this->cancelLabel = "Mégse";
	$this->fields =[];
	return $this;
	
	
    }
    public function add(makeInput $field) {
	$name = $field->getName();
	$field->setId($this->id."-".$name);
	
	$this->fields[]=$field;
	return $this;
    }
    public function setClass($class){
	$this->class = $class;
	return $this;
    }

        public function pushOutHTML() {
	$back = '<form class="'.$this->class.'" action="'.$this->action.'" method="'.$this->method.'" id="'. $this->id.'"><div>';
	foreach($this->fields as $field){
	    $back.=$field->pushOutHTML();
	    
	}
	
	
	
	$back .= ('<nav><button type="submit">'. $this->submitLabel.'</button>');
	$back .= ('<button type="reset">'. $this->resetLabel.'</button>');
	$back .= ('<span class="w3-button" onclick=showSwitch("'.$this->id.'")>'. $this->cancelLabel.'</span></nav>');
	$back .= '</div></form>';
	
	
	
	
	return $back;
	
	
    }

    
    
    
    
    
    
    
}
