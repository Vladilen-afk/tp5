<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager):void
    {
        $faker =Factory::create("fr_FR");
        $genres=["male","female"];
       
        for ($i=0; $i<100; $i++){

        $sexe=mt_rand(0,1);
        if ($sexe==0){
            $type="men";
        }else{
            $type="women";
        }

        $contact = new Contact();
        $contact->setNom($faker->lastName())
                ->setPrenom($faker->firstName(mt_rand(0,1)))
                ->setRue($faker->streetAddress())
                ->setCp($faker->numberBetween(75000,92000))
                ->setVille($faker->city())
                ->setMail($faker->email())
                ->setSexe($sexe)
                ->setAvatar("https://randomuser.me/api/portraits/" .$type."/" .$i.".jpg");
        $manager->persist($contact);        
        }
        $manager->flush();
        
    }

}
 19min