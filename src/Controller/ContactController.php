<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /** 
     * @Route("/contact", name="contact", methods={"GET"})
     */
    public function listeContact()
    {
        $manager=$this->getDoctrine()->getManager();
        $repo=$manager->getRepository(Contact::class);
        $Contacts=$repo->findAll();
        return $this->render('contact/listeContact.html.twig',[
            'lesContacts' => $Contacts
        ]);
    }
}