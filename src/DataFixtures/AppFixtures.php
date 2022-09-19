<?php

namespace App\DataFixtures;
use App\Entity\Color;
use App\Entity\Article;
use App\Entity\Price;
use App\Entity\Reference;
use App\Entity\Size;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
// une class c'est un cadre on prend 
// instensier cest lui donner la vie la class color est la maman et la couleur red est son bebe
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $colors =['black', 'white', 'yellow' , 'red'];
        $dataColor = [];
        for($i = 0; $i < count($color); $i++){
            $color = new Color();// ici je met au monde une couleur
            $color -> setName($colors[$i]);// ici le $i correspond a l'index de mon tableau colors 
            $dataColor[] = $color;
            $manager->persist($color);
        }
        $sizes =['xs', 's', 'm' , 'l', 'xl'];
        $dataSize = [];
        for($i = 0; $i < count($size); $i++){
            $size = new Size();
            $size -> setName($sizes[$i]);// ici le $i correspond a l'index de mon tableau colors 
            $dataSize[] = $size;
            $manager->persist($size);
        }

        $prices =[29, 39, 49 , 59];
        $dataPrices = [];
        for($i = 0; $i < count($prices); $i++){
            $price = new Color();
            $price -> setName($prices[$i]);// ici le $i correspond a l'index de mon tableau colors 
            $dataPrices[] = $price;
            $manager->persist($price);
        }

        $titles = ['Dahu', 'Seoul', 'Auburn'];
        $images = [
            'https://thumbs.dreamstime.com/b/la-mode-v%C3%AAtx-l-illustration-bleue-de-forme-de-t-shirt-8229384.jpg',
            'https://img.myloview.fr/images/illustration-unique-de-vecteur-de-dessin-anime-t-shirt-bleu-700-145918035.jpg',
            'https://previews.123rf.com/images/siberica/siberica1601/siberica160100173/51442205-t-shirt-croquis-homme-isol%C3%A9-sur-fond-blanc-vector-illustration-.jpg'
        ];

        $dataTitles = [];
        for ($i = 0; $i < count($color); $i++){
            $title = new title();//je declare une variable article
            $title
                ->setTitle($title[$i])  //créer un titre 
                ->setPrice($dataPrices[$i]) 
                ->setDescription(implode('', $faker->sentences($faker->randomDigitNotNull)))//ici je lui dis de me créer un texte avec 150 mots 
                ->setSlug(strtolower($titles[$i]))
                ->setImage($images[$i]);// ici je donne la dimention de l' image
                $dataTitles[] = $title;
            $manager->persist($title);
        } 
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 15; $i++){
            $article = new article();//je declare une variable article
        $article
            ->setColor($faker->unique()->title())  //créer un titre 
            ->setSize($faker->sentence(150))//ici je lui dis de me créer un texte avec 150 mots 
            ->setPrice($faker->randomElement($dataCategories))
            ->setImage($faker->imageUrl(640, 480, 'animals', true));// ici je donne la dimention de l' image
        $manager->persist($article);
        }
        
    }
    $manager->flush();
}
