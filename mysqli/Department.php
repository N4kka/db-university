<?php
class Department {
    public $id;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $head_of_department;

    function __construct($_id, $_name)
    {
        $this->id = $_id;
        $this->name = $_name;
    }

    public function setContacts($_address, $_phone, $_email) {
        $this->address = $_address;
        $this->phone = $_phone;
        $this->email = $_email;
    }

    public function printContacts() {
        return [
            "Address" => $this->address,
            "Phone number" => $this->phone,
            "Email" => $this->email
        ];
    }
}