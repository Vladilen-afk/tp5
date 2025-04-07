<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'app_contact')]
    public function listeContact(ContactRepository $repo)
    {
        $Contacts=$repo->findAll();
        return $this->render('contact/listeContact.html.twig',[
            'lesContacts' => $Contacts
        ]);
    }

    #[Route('/contact/{id}', name: 'fiche_contact')]
    public function ficheContact(contact $contact)
    {
        return $this->render('contact/ficheContact.html.twig',[
            'leContact' => $contact
        ]);
    }
}
