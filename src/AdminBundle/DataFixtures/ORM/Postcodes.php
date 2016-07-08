<?php
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AdminBundle\Entity\Postcode;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
/**
 * Description of PostCodes
 *
 * @author jHeyvaert
 */
class PostCodes extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){
        $tab_Postcode = array(
            array(
                "postcode" => "4040"
            ),
            array(
                "postcode" => "4041"
            ),
            array(
                "postcode" => "4042"
            ),
            array(
                "postcode" => "4000"
            ),
            array(
                "postcode" => "4020"
            ),
            array(
                "postcode" => "4900"
            ),
            array(
                "postcode" => "1070"
            ),
            array(
                "postcode" => "6690"
            ),
            array(
                "postcode" => "4680"
            ),
            array(
                "postcode" => "4681"
            ),
            array(
                "postcode" => "4682"
            ),
            array(
                "postcode" => "4683"
            ),
            array(
                "postcode" => "4684"
            ),
            array(
                "postcode" => "4050"
            ),
            array(
                "postcode" => "4030"
            ),
            array(
                "postcode" => "4031"
            ),
            array(
                "postcode" => "4032"
            )
        );

        for($i=0; $i< sizeof($tab_Postcode); $i++ ){
            $postcode = new Postcode();
            $postcode->setPostcode($tab_Postcode[$i]['postcode']);
            $manager->persist($postcode);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
    
}
