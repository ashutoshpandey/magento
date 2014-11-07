<?php

class UserTest extends TestCase {

	public function isValidUser()
	{
        $response = $this->action('GET', 'AuthenticationController@isValidUser', array('username'=>'abc', 'password'=>'xyz'));

		$this->assertTrue('invalid', $response->getContent());
	}

}