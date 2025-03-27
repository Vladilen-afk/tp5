<?php

namespace App\DataFixtures;

use Faker\Factory;
namespace App\DataFixtures;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker =Factory::create("fr_FR");
        $genres=["male","female"];
        $sexe=mt_rand(0,1);
        if ($sexe==0){
            $type="men";
        }else{
            $type="women";
        }
        for ($i=0; $i<100; $i++){

        $contact = new Contact();
        $contact->setNom($faker->lastName());
        $contact->setPrenom($faker->firstName(mt_rand(0,1)));
        $contact->setRue($faker->streetAddress());
        $contact->setCp($faker->numberBetween(75000,92000));
        $contact->setVille($faker->city());
        $contact->setMail($faker->email());
        $contact->setAvatar("https://randomuser.me/api/portaits/".$type."/".$i.".jpg");
        $manager->persist($contact);        
        }
        $manager->flush();
        
    }

    min19
