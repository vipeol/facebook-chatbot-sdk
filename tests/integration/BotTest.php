<?php

namespace CodeBot;

use CodeBot\Build\Solid;
use PHPUnit\Framework\TestCase;

class BotTest extends TestCase
{
    private $pageAccessToken = 'AQUI_VAI_O_PAGE_ACCESS_TOKEN';
    public function testAddMenu()
    {
        $call_to_actions = [
            [
                'id' => 1,
                'type' => 'nested',
                'title' => 'O que eu posso fazer?',
                'parent_id' => 0,
                'value' => null
            ],
            [
                'id' => 2,
                'type' => 'web_url',
                'title' => 'Visite nosso site',
                'parent_id' => 0,
                'value' => 'https://sites.code.education/home-code/'
            ],
            [
                'id' => 3,
                'type' => 'web_url',
                'title' => 'Quer aprender Laravel e Vue?',
                'parent_id' => 1,
                'value' => 'http://sites.code.education/laravel-com-vuejs/'
            ],
            [
                'id' => 4,
                'type' => 'postback',
                'title' => 'Ver opções iniciais',
                'parent_id' => 1,
                'value' => 'iniciar'
            ]
        ];

        $bot = Solid::factory();
        $bot->pageAccessToken($this->pageAccessToken);
        $bot->addMenu('default', false, $call_to_actions);

        $this->assertTrue(true);
    }

    public function testRemoveMenu()
    {
        $bot = Solid::factory();
        $bot->pageAccessToken($this->pageAccessToken);
        $bot->removeMenu();

        $this->assertTrue(true);
    }

    public function testAddGetStartedButton()
    {
        $bot = Solid::factory();
        $bot->pageAccessToken($this->pageAccessToken);
        $bot->addGetStartedButton('iniciar');

        $this->assertTrue(true);
    }

    public function testRemoveGetStartedButton()
    {
        $bot = Solid::factory();
        $bot->pageAccessToken($this->pageAccessToken);
        $bot->removeGetStartedButton();

        $this->assertTrue(true);
    }

    public function testAddGreeting()
    {
        $bot = Solid::factory();
        $bot->pageAccessToken($this->pageAccessToken);
        $bot->addGreeting('default', 'Olá {{user_first_name}}');

        $this->assertTrue(true);
    }

    public function testRemoveGreeting()
    {
        $bot = Solid::factory();
        $bot->pageAccessToken($this->pageAccessToken);
        $bot->removeGreeting();

        $this->assertTrue(true);
    }
}