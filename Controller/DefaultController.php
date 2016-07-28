<?php

namespace aos\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use aos\UserBundle\Entity\User;

use FOS\UserBundle\Util\LegacyFormHelper;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('aosUserBundle:Default:index.html.twig');
    }
    public function registerAction(Request $request)
    {

        // On crée un objet User
        $user = new User();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder('form', $user);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle',
                'attr' => array('class' => 'form-control'),
            ))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle',
                'attr' => array('class' => 'form-control'),
            ))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password','attr' => array('class' => 'form-control')),
                'second_options' => array('label' => 'form.password_confirmation','attr' => array('class' => 'form-control')),
                'invalid_message' => 'fos_user.password.mismatch',

            ))
        ;

        $firstname = $this->container->getParameter('register.firstname');
        if($firstname){
            $formBuilder ->add('firstname',null, array(
                'required'    => true,
                'attr' => array('class' => 'form-control')
            ));
        }

        $lastname = $this->container->getParameter('register.lastname');
        if($lastname){
            $formBuilder ->add('lastname',null, array(
                'required'    => true,
                'attr' => array('class' => 'form-control')
            ));
        }
        $phonenumber = $this->container->getParameter('register.phonenumber');
        if($phonenumber){
            $formBuilder ->add('phonenumber',null, array(
                'required'    => true,
                'attr' => array('class' => 'form-control')
            ));
        }
        $carte_Identite = $this->container->getParameter('register.carte_Identite');
        if($carte_Identite){
            $formBuilder ->add('carte_Identite',null, array(
                'required'    => true,
                'attr' => array('class' => 'form-control')
            ));
        }
        $birthday = $this->container->getParameter('register.birthday');
        if($birthday){
            $formBuilder ->add('birthday','birthday', array(
                'required'    => true,
                'placeholder' => array(
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                )
            ));
        }
        $gender = $this->container->getParameter('register.gender');
        if($gender){
            $formBuilder->add('gender', Choice, array(
                'choices' => array(
                    'm' => 'Male',
                    'f' => 'Female'
                ),
                'required'    => true,
                'placeholder' => 'Choose your gender',
                'empty_data'  => null
            ));
        }

        $country = $this->container->getParameter('register.country');
        if($country){
            $formBuilder->add('country','country', array(
                'required'    => true,
                'attr' => array('class' => 'form-control'),
                'empty_data'  => null
            ));
        }
        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setEnabled(1);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('fos_user_security_login');
        }

        $visible = $this->container->getParameter('network.visible');
        $facebook = $this->container->getParameter('network.facebook');
        $github = $this->container->getParameter('network.github');

        return $this->render('aosUserBundle:Registration:register.html.twig',array(
            'form' => $form->createView(),
            'visible' => $visible,
            'facebook' => $facebook,
            'github' => $github,
        ));

    }


}
