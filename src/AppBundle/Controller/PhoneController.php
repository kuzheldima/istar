<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Phone;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Phone controller.
 *
 * @Route("phone")
 */
class PhoneController extends Controller
{
    /**
     * Lists all phone entities.
     *
     * @Route("/", name="phone_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $phones = $em->getRepository('AppBundle:Phone')->findAll();

        return $this->render('phone/index.html.twig', array(
            'phones' => $phones,
        ));
    }

    /**
     * Creates a new phone entity.
     *
     * @Route("/new", name="phone_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $phone = new Phone();
        $form = $this->createForm('AppBundle\Form\PhoneType', $phone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($phone);
            $em->flush($phone);

            return $this->redirectToRoute('phone_show', array('id' => $phone->getId()));
        }

        return $this->render('phone/new.html.twig', array(
            'phone' => $phone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a phone entity.
     *
     * @Route("/{id}", name="phone_show")
     * @Method("GET")
     */
    public function showAction(Phone $phone)
    {
        $deleteForm = $this->createDeleteForm($phone);

        return $this->render('phone/show.html.twig', array(
            'phone' => $phone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing phone entity.
     *
     * @Route("/{id}/edit", name="phone_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Phone $phone)
    {
        $deleteForm = $this->createDeleteForm($phone);
        $editForm = $this->createForm('AppBundle\Form\PhoneType', $phone);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('phone_edit', array('id' => $phone->getId()));
        }

        return $this->render('phone/edit.html.twig', array(
            'phone' => $phone,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a phone entity.
     *
     * @Route("/{id}", name="phone_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Phone $phone)
    {
        $form = $this->createDeleteForm($phone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($phone);
            $em->flush($phone);
        }

        return $this->redirectToRoute('phone_index');
    }

    /**
     * Creates a form to delete a phone entity.
     *
     * @param Phone $phone The phone entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Phone $phone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('phone_delete', array('id' => $phone->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
