<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use AdminBundle\Entity\User;

class UserAdminType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'label' => 'User name',
                'translation_domain' => 'messages'
            ))
            ->add('telnumber', 'text', array(
                'label' => 'Phone number',
                'translation_domain' => 'messages'
            ))
            ->add('usertype', 'choice', array(
                'required' => false, //permet d'avoir le premier champ à vide
                'choices'  => array(
                    User::TYPE_SURFER => 'surfer',
                    User::TYPE_ARTIST => 'artist',
                    User::TYPE_ARTISTSGROUP => 'group',
                    User::TYPE_ADMIN => 'admin'
                ),
                'translation_domain' => 'messages',
                'label' => 'Type utilisateur'
            ))
            ->add('email', 'text', array(
                'label' => 'Email',
                'translation_domain' => 'messages'
            ))
            ->add('password', 'repeated', array(
                'required' => false,
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            /*->add('password', 'repeated', array(
                'label' => 'Mot de passe',
                'translation_domain' => 'messages'
            ))*/
            ->add('tryingnumber', 'integer', array(
                'label' => "Trying number",
                'translation_domain' => 'messages'
            ))
            ->add('bamed', 'checkbox', array(
                'label' => 'Bamed',
                'required' => false
            ))
            ->add('addressstreet', 'text', array(
                'label' => 'Street',
                'translation_domain' => 'messages'
            ))
            ->add('addressnumber', 'integer', array(
                'label' => 'Number',
                'translation_domain' => 'messages'
            ))
            ->add('postcode', 'entity', array(
                'required' => false, //permet d'avoir le premier champ à vide
                'label' => "Post code",
                'translation_domain' => 'messages',
                'class' => 'AdminBundle\Entity\Postcode',
                'property' => 'postcode',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.postcode', 'ASC'); }
            ))
            ->add('town', 'entity', array(
                'required' => false, //permet d'avoir le premier champ à vide
                'translation_domain' => 'messages',
                'label' => 'Town',
                'class' => 'AdminBundle\Entity\Town',
                'property' => 'town',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.town', 'ASC'); }
            ))
            ->add('locality', 'entity', array(
                'required' => false, //permet d'avoir le premier champ à vide
                'translation_domain' => 'messages',
                'label' => 'Locality',
                'class' => 'AdminBundle\Entity\Locality',
                'property' => 'locality',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->orderBy('l.locality', 'ASC'); }
            ))
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_user';
    }
}
