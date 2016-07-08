<?php
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AdminBundle\Entity\Town;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
/**
 * Description of Towns
 *
 * @author jHeyvaert
 */
class Towns extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

        $tab_Town = array(
            array(
                "town" => "Oupeye"
            ),
            array(
                "town" => "Liege"
            ),
            array(
                "town" => "Vielsalm"
            ),
            array(
                "town" => "Anderlecht"
            ),
            array(
                "town" => "Spa"
            ),
            array(
                "town" => "Chaudfontaine"
            )
        );

        for($i=0; $i< sizeof($tab_Town); $i++ ){
            $town = new Town();
            $town->setTown($tab_Town[$i]['town']);
            $manager->persist($town);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
    
}
