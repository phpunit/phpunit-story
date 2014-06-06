<?php

require_once 'PHPUnit/Extensions/Story/TestCase.php';
require_once 'PHPUnit/Extensions/Story/Then.php';

class StepTest extends PHPUnit_Framework_TestCase {
    protected function setUp() {
        parent::setUp();
    }

    public function testGetArgumentsAsStringWithStringAsArgumentDisplayElementAsString() {
        $Step = new PHPUnit_Extensions_Story_Then(array('action', 'keep behavior with string'));
        $expected = "keep behavior with string";
        $this->assertEquals($expected, $Step->getArguments(true));
    }

    public function testGetArgumentsAsStringWithSingleArrayAsArgumentDisplayElementAsString() {
        $Step = new PHPUnit_Extensions_Story_Then(array('action', array('single element')));
        $expected = "array (\n  0 => 'single element',\n)";
        $this->assertEquals($expected, $Step->getArguments(true));
    }

    public function testGetArgumentsAsStringWithObjectAsArgumentDisplayElementAsString() {
        $Step = new PHPUnit_Extensions_Story_Then(array('action', new PHPUnit_Extensions_Story_Then(array('action', array('single element')))));
        $expected = "PHPUnit_Extensions_Story_Then::__set_state(array("
            . "\n   'action' => 'action',"
            . "\n   'arguments' => "
            . "\n  array ("
            . "\n    0 => "
            . "\n    array ("
            . "\n      0 => 'single element',"
            . "\n    ),"
            . "\n  ),"
            . "\n))";
        $this->assertEquals($expected, $Step->getArguments(true));
    }
}
