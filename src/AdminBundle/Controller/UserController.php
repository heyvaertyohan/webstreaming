<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\User;
use AdminBundle\Form\UserType;
use AdminBundle\Form\UserAdminType;

class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AdminBundle:User')->findAll();
        $currentUser = $this->get('security.context')->getToken()->getUser();
        return $this->render('AdminBundle:User:index.html.twig', array(
            'entities' => $entities,
            'currentUser' => $currentUser
        ));
    }

    public function createAction(Request $request)
    {
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_user_show', array('id' => $entity->getId())));
        }

        return $this->render('AdminBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserAdminType(), $entity, array(
            'action' => $this->generateUrl('admin_user_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function newAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);
        $currentUser = $this->get('security.context')->getToken()->getUser();

        return $this->render('AdminBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'currentUser' => $currentUser
        ));
    }

    public function showAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminBundle:User')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($user->getId());

        return $this->render('AdminBundle:User:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminBundle:User')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $currentUser = $this->get('security.context')->getToken()->getUser();
        $deleteForm = $this->createDeleteForm($user->getId());

        return $this->render('AdminBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'currentUser' => $currentUser

        ));
    }

    private function createEditForm(User $entity)
    {
        $find = false;
        foreach ($entity->getRoles() as $role)
        {
            if ($role == "ROLE_SUPER_ADMIN"){
                $find = true;
            }
        }

        if ($find)
        {
            $form = $this->createForm(new UserAdminType(), $entity, array(
                'action' => $this->generateUrl('admin_user_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            ));
        }
        else{

            $form = $this->createForm(new UserType(), $entity, array(
                'action' => $this->generateUrl('admin_user_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            ));
        }


        $translated = $this->get('translator')->trans('Mise à jour');
        $form->add('submit', 'submit', array('label' => $translated));

        return $form;
    }

    public function updateAction(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:User')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($user->getId());
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($entity);
            $password = $encoder->encodePassword($editForm->get('password')->getData(), $entity->getSalt());
            $entity->setPassword($password);

            $em->flush();

            return $this->redirect($this->generateUrl('admin_user'));
        }

        return $this->render('AdminBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_user'));
    }

    private function createDeleteForm($id)
    {
        $translated = $this->get('translator')->trans('Suppression');
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => $translated))
            ->getForm()
            ;
    }
}
