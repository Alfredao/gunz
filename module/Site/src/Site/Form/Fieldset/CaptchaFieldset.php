<?php
namespace Site\Form\Fieldset;

use Zend\Form\Fieldset;

class CaptchaFieldset extends Fieldset
{

    public function __construct()
    {
        parent::__construct('captcha');

        $captchaImage = new \Zend\Captcha\Image(array(
            'font' => './module/Application/resources/fonts/CASTELAR.TTF',
            'width' => 250,
            'height' => 100,
            'dotNoiseLevel' => 40,
            'lineNoiseLevel' => 3
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Captcha',
            'name' => 'captcha',
            'attributes' => array(
                'required' => true,
                'type' => 'password',
                'placeholder' => 'Informe o código de confirmação mostrado na imagem'
            ),
            'options' => array(
                'captcha' => $captchaImage,
                'label' => 'Código de confirmação',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));
    }
}