<?php

use app\Http\Controllers\TestO;
require_once("./app/Http/Controllers/TestO.php");

class NameTest extends TestCase{

	public function testName(){
	
		$test = "aaa";

		$this->test = new TestO();
		$this->assertEquals($test,$this->test->name());

	}

	public function testTel(){
	
		$test = 09000000000;

		$this->test = new TestO();
		$this->assertEquals($test,$this->test->tel());

	}

public function testCusCount(){
	
		$test = "aaaaa";

		$this->test = new TestO();
		$this->assertEquals($test,$this->test->cusCount());

	}

public function testAddress(){
	
		$test = "aaa@co.jp";

		$this->test = new TestO();
		$this->assertEquals($test,$this->test->address());

	}
}



