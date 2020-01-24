<?php

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }
    
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->wantTo("Go to the home page");
        $I->amOnPage('/');
        $I->see('String transformation');
    }
    
    public function encodingFormWorks(AcceptanceTester $I)
    {
        $plainString = "some string";
        $encodedString = "ßøµ´  ßÎ®ˆ˜©";
        $I->amOnPage('/');
        $I->amGoingTo("Test encoding");
        $I->seeElement("#encode_form");
        $I->seeElement("#plain_string_input");
        $I->seeElement("#encode_button");
        $I->fillField("#plain_string_input", $plainString);
        $I->click("Encode");
        $I->see("'$plainString' plain string is encoded as '$encodedString'");
    }
    
    public function decodingFormWorks(AcceptanceTester $I)
    {
        $plainString = "password";
        $encodedString = "πåßßÏø®ı";
        $I->amOnPage('/');
        $I->amGoingTo("Test decoding");
        $I->seeElement("#decode_form");
        $I->seeElement("#encoded_string_input");
        $I->seeElement("#decode_button");
        $I->fillField("#encoded_string_input", $encodedString);
        $I->click("Decode");
        $I->see("'$encodedString' encoded string is decoded as '$plainString'");
    }
}
