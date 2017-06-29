<?php

namespace CodeBot\TemplatesMessage;

use PHPUnit\Framework\TestCase;
use CodeBot\Element\Button;

class ButtonsTemplateTest extends TestCase
{
    public function testRetornoComTipoPostback()
    {
        $buttonsTemplate = new ButtonsTemplate(1234);
        $buttonsTemplate->add(new Button('postback','Que tal uma resposta do bot','resposta'));
        $actual = $buttonsTemplate->message('Olha um exemplo de template com botões...');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'Olha um exemplo de template com botões...',
                        'buttons' => [
                            [
                                'type' => 'postback',
                                'title' => 'Que tal uma resposta do bot',
                                'payload' => 'resposta'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

    public function testRetornoComTipoWeburl()
    {
        $buttonsTemplate = new ButtonsTemplate(1234);
        $buttonsTemplate->add(new Button('web_url','link de acesso','http://www.urlteste.com.br'));
        $actual = $buttonsTemplate->message('clique no link do botão');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'clique no link do botão',
                        'buttons' => [
                            [
                                'type' => 'web_url',
                                'title' => 'link de acesso',
                                'url' => 'http://www.urlteste.com.br'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

    public function testRetornoComTipoShareContents()
    {
        $buttonsTemplate = new ButtonsTemplate(1234);
        $buttonsTemplate->add(new Button('share_contents','Qualquer','conteudo a ser compartilhado'));
        $actual = $buttonsTemplate->message('compatilhe aqui esta informação');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'compatilhe aqui esta informação',
                        'buttons' => [
                            [
                                'type' => 'share_contents',
                                'title' => 'Qualquer',
                                'share_contents' => 'conteudo a ser compartilhado'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

}