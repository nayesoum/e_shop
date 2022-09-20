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
        $faker = Faker\Factory::create();

        $colors =['black', 'white', 'yellow' , 'red'];// i est egale  a 0 compte le nombre de couleurs qu'il y a dans le tableau et ajoute 1 et boucle encore 
        $dataColors = [];
        for($i = 0; $i < count($colors); $i++){
            $color = new Color();// ici je met au monde une couleur
            $color -> setName($colors[$i]);// ici le $i correspond a l'index de mon tableau colors 
            $manager->persist($color);
            $dataColors[] = $color;
        }
        $sizes =['xs', 's', 'm' , 'l', 'xl'];
        $dataSizes =[];
        foreach ($sizes as $s){//dans toutes les sizes prend moi une size
            $size = new Size();
            $size -> setName($s);// ici le $i correspond a l'index de mon tableau colors 
            $manager->persist($size);
            $dataSizes[] = $size;
        }

        $prices =[29, 39, 49 , 59];
        $dataPrices =[];
        foreach ($prices as $p){//dans toutes les prices prend moi une price
            $price = new Price();
            $price->setAmount($p);// ici le $i correspond a l'index de mon tableau colors 
            $manager->persist($price);
            $dataPrices[] = $price;// on le met aprés pour qu'il est la donner
        }

        $references = ['Dahu', 'Seoul', 'Auburn'];
        $images = [
            'https://thumbs.dreamstime.com/b/la-mode-v%C3%AAtx-l-illustration-bleue-de-forme-de-t-shirt-8229384.jpg',
            'https://img.myloview.fr/images/illustration-unique-de-vecteur-de-dessin-anime-t-shirt-bleu-700-145918035.jpg',
            'https://previews.123rf.com/images/siberica/siberica1601/siberica160100173/51442205-t-shirt-croquis-homme-isol%C3%A9-sur-fond-blanc-vector-illustration-.jpg'
        ];

        $dataReferences = [];
        for ($i = 0; $i < count($references); $i++){
            $ref = new Reference();//je declare une variable article
            $ref
                ->setTitle($references[$i])  //créer un titre 
                ->setPrice($faker->randomElement($dataPrices)) 
                ->setDescription($faker->text(200))//ici je lui dis de me créer un texte avec 150 mots 
                ->setSlug(strtolower($references[$i]))
                ->setImage($images[$i]);// ici je donne la dimention de l' image
                $manager->persist($ref);
                $dataReferences[] = $ref;
        } 
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 15; $i++){
            $article = new article();//je declare une variable article
            $article->setReference($dataReferences[array_rand($dataReferences)])
            ->setColor($dataColors[array_rand($dataColors)])  //créer un titre 
            ->setSize($dataSizes[array_rand($dataSizes)])// 
            ->setQty(rand(0, 10 ));
            
            $manager->persist($article);
        }
        
        $manager->flush();
    }
}
