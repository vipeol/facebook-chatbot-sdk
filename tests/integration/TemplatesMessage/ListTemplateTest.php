<?php

namespace CodeBot\TemplatesMessage;

use CodeBot\Element\Button;
use CodeBot\Element\Product;
use PHPUnit\Framework\TestCase;

class ListTemplateTest extends TestCase
{
    public function testListaComDoisProdutos()
    {
        $button = new Button('web_url', null, 'https://angular.io/');
        $product = new Product('Produto 1','https://www.w3schools.com/angular/pic_angular.jpg','Curso de Angular', $button);

        $button = new Button('web_url', null, 'http://php.net/');
        $product2 = new Product('Produto 2','https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/711px-PHP-logo.svg.png','Curso de PHP', $button);

        $template = new ListTemplate(1234);
        $template->add($product);
        $template->add($product2);

        $actual = $template->message('qwe');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'list',
                        'elements' => [
                            [
                                'title' => 'Produto 1',
                                'subtitle' => 'Curso de Angular',
                                'image_url' => 'https://www.w3schools.com/angular/pic_angular.jpg',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'https://angular.io/'
                                ]
                            ],
                            [
                                'title' => 'Produto 2',
                                'subtitle' => 'Curso de PHP',
                                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/711px-PHP-logo.svg.png',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'http://php.net/'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);

    }
}