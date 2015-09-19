<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Controller;
class NameTest extends TestCase{

public function testName(){
	
$name = 'aaa';
$Controller = $this->action('GET','Controller@hoge');
$Controller->hoge();

$this->assertEquals($name,$Controller->hoge());

}
}
