<?php

class TestRunner extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider provideTestCases
     */
    public function runTestCase($filename)
    {
        $environment = Lisphp_Environment::full();
        $scope = new Lisphp_Scope($environment);
        $scope['test'] = $this;

        $methodNames = array('assertEquals', 'assertSame', 'assertTrue', 'assertFalse');
        foreach ($methodNames as $methodName) {
            $scope[$methodName] = new Lisphp_Runtime_PHPFunction(array($this, $methodName));
        }

        $scope['require'] = new Lisphp_Runtime_PHPFunction(function ($file) use ($scope) {
            $program = Lisphp_Program::load(__DIR__.'/../src/'.$file.'.lisphp');
            $program->execute($scope);
        });

        $program = Lisphp_Program::load($filename);
        $program->execute($scope);
    }

    public function provideTestCases()
    {
        $testCases = array();

        $files = new GlobIterator(__DIR__.'/*.lisphp');
        foreach ($files as $file)
            $testCases[] = array((string) $file);

        return $testCases;
    }
}
