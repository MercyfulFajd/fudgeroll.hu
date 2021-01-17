<?php

class makeButton {

    private $label;
    private $name;
    private $type;
    private $id;
    private $value;
    private $moreStuff;

    function __construct($label, $name, $type = "text") {
	$this->label = $label;
	$this->name = $name;
	$this->type = $type;
	$this->id = $name;
	$this->value = null;

	$this->moreStuff = "";
    }

    public function setId($id) {
	$this->id = $id;
	return $this;
    }

    function getMoreStuff() {
	return $this->moreStuff;
    }

    public function addMoreStuff($stuff) {
	$this->moreStuff .= (' ' . $stuff);
	return $this;
    }

    public function setValue($value) {
	$this->value = $value;
	return $this;
    }

    function getName() {
	return $this->name;
    }

    function getType() {
	return $this->type;
    }

    function getId() {
	return $this->id;
    }

    function getValue() {
	return $this->value;
    }

    public function pushOutHTML() {
	$back = '<div>';
	$back .= $this->createLabel();
	$back .= $this->createField();



	$back .= '</div>';
	return $back;
    }

    protected function createLabel() {
	return '<label for="' . $this->id . '">' . $this->label . '</label>';
    }

    protected function createField() {
	$back = '<input type="' . $this->type . '" name="' . $this->name .'" id="' . $this->id . '"';
	if ($this->value !== null) {
	    $back .= (' value="' . $this->value . '"');
	}
	$back .= ($this->moreStuff . '>');
	return $back;
    }

}
