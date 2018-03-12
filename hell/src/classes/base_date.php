<?php


class Base_Dates
{
	public $created_at;
	public $updated_at;

	public function __construct()
    {
        $this->created_at = date();
        $this->updated_at = date();
    }
}



