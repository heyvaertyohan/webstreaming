<?php
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AdminBundle\Entity\Locality;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
/**
 * Description of Localities
 *
 * @author jHeyvaert
 */
class Localities extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){
        $tab_Locality = array(
            array(
                "locality" => "Herstal"
            ),
            array(
                "locality" => "Vottem"
            ),
            array(
                "locality" => "Liers"
            ),
            array(
                "locality" => "Milmort"
            ),
            array(
                "locality" => "Liege"
            ),
            array(
                "locality" => "Glain"
            ),
            array(
                "locality" => "Rocourt"
            ),
            array(
                "locality" => "Bressoux"
            ),
            array(
                "locality" => "Jupille-sur-Meuse"
            ),
            array(
                "locality" => "Wandre"
            ),
            array(
                "locality" => "Grivegnée"
            ),
            array(
                "locality" => "Angleur"
            ),
            array(
                "locality" => "Chênée"
            ),
            array(
                "locality" => "Sclessin"
            ),
            array(
                "locality" => "Anderlecht"
            ),
            array(
                "locality" => "Vielsalm"
            ),
            array(
                "locality" => "Oupeye"
            ),
            array(
                "locality" => "Haccourt"
            ),
            array(
                "locality" => "Hermalle-sous-Argenteau"
            ),
            array(
                "locality" => "Hermée"
            ),
            array(
                "locality" => "Heure-le-Romain"
            ),
            array(
                "locality" => "Houtain-Saint-Siméon"
            ),
            array(
                "locality" => "Vivegnis"
            ),
            array(
                "locality" => "Bruxelles"
            ),
            array(
                "locality" => "Chaudfontaine"
            )
        );

        for($i=0; $i< sizeof($tab_Locality); $i++ ){
            $locality = new Locality();
            $locality->setLocality($tab_Locality[$i]['locality']);
            $manager->persist($locality);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
    
}
