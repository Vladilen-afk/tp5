<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager):void
    {
        $faker =Factory::create("fr_FR");
        $Categories=[];
        $categorie=new Categorie();
        $categorie->setLibelle("Professionnel")
                  ->setImage("image/categorie/srx.jpg")
                  ->setDescription($faker->word());
        $manager->persist($categorie);
        $Categories[]=$categorie;
        $categorie=new Categorie();
        $categorie->setLibelle("Sport")
                  ->setImage("image/categorie/sport.jpg")
                  ->setDescription($faker->word());
        $manager->persist($categorie);
        $Categories[]=$categorie;
        $categorie=new Categorie();
        $categorie->setLibelle("privé")
                  ->setImage("image/categorie/prive.jpg")
                  ->setDescription($faker->word());
        $manager->persist($categorie);
        $Categories[]=$categorie;

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
                ->setCategorie($Categories[mt_rand(0,2)])
                ->setAvatar("https://randomuser.me/api/portraits/" .$type."/" .$i.".jpg");
        $manager->persist($contact);        
        }
        $manager->flush();
        
    }

}