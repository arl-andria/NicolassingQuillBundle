<?php

/*
 * This file is part of the FOSUserBundle package.
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nicolassing\QuillBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Nicolas Assing <nicolas.assing@gmail.com>
 */
class QuillType extends AbstractType
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['theme'] = $options['theme'];
        $view->vars['height'] = $options['height'];
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'theme' => $this->config['theme'],
                'height' => $this->config['height'],
            ]
        );
    }

    public function getParent(): string
    {
        return TextareaType::class;
    }
}
