<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-15
 * Time: 13:12
 */

/**
 * @var \Codeception\Scenario $scenario
 */

$I = new FunctionalTester($scenario);

$I->wantTo('open index page of site');
$I->amOnPage('/');
$I->seeInTitle('Phalcon Demo Application | Welcome');
$I->see("This is a Phalcon Demo Application. Please don't provide us any personal information. Thanks!");
$I->see('Log In/Sign Up');
$I->see('Phalcon Demo Application', 'h1');