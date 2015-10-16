<?php

class FooTest extends TestCase
{
    public function testSomethingIsTrue()
    {
        $this->assertTrue(true);
    }

public function testSome()
    {
        $crawler = $client->request('GET', '/hello/Fabien');

        $link = $crawler->selectLink('Go elsewhere...')->link();
$crawler = $client->click($link);

$form = $crawler->selectButton('validate')->form();
$crawler = $client->submit($form, array('name' => 'Fabien'));
    }

}