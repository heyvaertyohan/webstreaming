<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AdminBundle\Entity\User;
use AdminBundle\Entity\Town;
/**
 * Description of Surfers
 *
 * @author jHeyvaert
 */
class Surfers extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager){

        $tab_Surfers = array(
            array(
                "postcode" => $manager->getRepository('AdminBundle:Postcode')->findOneBy(array('postcode' => '4680')),
                "localite" => $manager->getRepository('AdminBundle:Locality')->findOneBy(array('locality' => 'Oupeye')),
                "town" => $manager->getRepository('AdminBundle:Town')->findOneBy(array('town' => 'Oupeye')),
                "name" => "admin",
                "firstname" => "admin",
                "username" => "admin",
                "enabled" => 1,
                "email" => "admin@gmail.com",
                "tel" => "042641941",
                "addressstreet" => "Rue roi albert",
                "addressnumber" => "75",
                "usertype" => User::TYPE_ADMIN,
                "password" => "admin",
                "role" => User::ROLE_SUPER_ADMIN,
                "tryingnumber" => "4",
                "bamed" => "0",
                "inscriptioncf" => "0",
                "inscription" => "0"
            ),
            array(
                "postcode" => $manager->getRepository('AdminBundle:Postcode')->findOneBy(array('postcode' => '4680')),
                "localite" => $manager->getRepository('AdminBundle:Locality')->findOneBy(array('locality' => 'Oupeye')),
                "town" => $manager->getRepository('AdminBundle:Town')->findOneBy(array('town' => 'Oupeye')),
                /*"bloc" => $manager->getRepository('AdminBundle:Postcode')->findOneBy(array('bloc' => 'bloc1')),*/
                "name" => "Tilkin",
                "firstname" => "Marie",
                "username" => "marie",
                "enabled" => 1,
                "email" => "tilkinmariepaule@gmail.com",
                "tel" => "042641941",
                "addressstreet" => "Rue roi albert",
                "addressnumber" => "75",
                "usertype" => User::TYPE_SURFER,
                "password" => "marie",
                "role" => User::ROLE_SURFER,
                "tryingnumber" => "4",
                "bamed" => "0",
                "inscriptioncf" => "0",
                "inscription" => "0"
            ),
            array(
                "postcode" => $manager->getRepository('AdminBundle:Postcode')->findOneBy(array('postcode' => '4680')),
                "localite" => $manager->getRepository('AdminBundle:Locality')->findOneBy(array('locality' => 'Oupeye')),
                "town" => $manager->getRepository('AdminBundle:Town')->findOneBy(array('town' => 'Oupeye')),
                /*"bloc" => $manager->getRepository('AdminBundle:Postcode')->findOneBy(array('bloc' => 'bloc1')),*/
                "name" => "Lega",
                "firstname" => "Dany",
                "username" => "Dany",
                "enabled" => 1,
                "email" => "DanyLega@gmail.com",
                "tel" => "0484134231",
                "addressstreet" => "Rue bouxhtay",
                "addressnumber" => "7",
                "usertype" => User::TYPE_SURFER,
                "password" => "testpwd",
                "role" => User::ROLE_SURFER,
                "tryingnumber" => "4",
                "bamed" => "0",
                "inscriptioncf" => "0",
                "inscription" => "0"
            ),
            array(
                "postcode" => $manager->getRepository('AdminBundle:Postcode')->findOneBy(array('postcode' => '4680')),
                "localite" => $manager->getRepository('AdminBundle:Locality')->findOneBy(array('locality' => 'Oupeye')),
                "town" => $manager->getRepository('AdminBundle:Town')->findOneBy(array('town' => 'Oupeye')),
                "name" => "Metallica",
                "firstname" => "",
                "username" => "Metallica",
                "enabled" => 1,
                "email" => "Metallica@gmail.com",
                "tel" => "0484134231",
                "addressstreet" => "Rue des stars",
                "addressnumber" => "1",
                "usertype" => User::TYPE_ARTISTSGROUP,
                "password" => "Metallica123",
                "role" => User::ROLE_ARTISTSGROUP,
                "tryingnumber" => "4",
                "bamed" => "0",
                "inscriptioncf" => "0",
                "inscription" => "0"
            )
            /*, array(
                "postcode" => $manager->getRepository('AdminBundle:Postcode')->findOneBy(array('postcode' => '4680')),
                "localite" => $manager->getRepository('AdminBundle:Locality')->findOneBy(array('locality' => 'Oupeye')),
                "town" => $manager->getRepository('AdminBundle:Town')->findOneBy(array('town' => 'Oupeye')),
                "name" => "Heyvaert",
                "firstname" => "Yohan",
                "username" => "yohan",
                "enabled" => 1,
                "email" => "heyvaertyohan@gmail.com",
                "tel" => "042641941",
                "addressstreet" => "Rue roi albert",
                "addressnumber" => "75",
                "usertype" => "surfer",
                "password" => "yohan",
                "role" => "ROLE_ADMIN",
                "tryingnumber" => "4",
                "bamed" => "0",
                "inscriptioncf" => "0",
                "inscription" => "0"
            )*/
        );

        for ($i = 0; $i < sizeof($tab_Surfers); $i++) {
            $surfer = new AdminBundle\Entity\Surfer();
            $surfer->setName($tab_Surfers[$i]['name']);
            $surfer->setFirstname($tab_Surfers[$i]['firstname']);
            $surfer->setUsername($tab_Surfers[$i]['username']);
            $surfer->setEnabled($tab_Surfers[$i]['enabled']);
            $surfer->setEmail($tab_Surfers[$i]['email']);
            $surfer->setPassword($this->container->get('security.encoder_factory')->getEncoder($surfer)->encodePassword($tab_Surfers[$i]['password'], $surfer->getSalt()));
            $surfer->setRoles(array($tab_Surfers[$i]['role']));
            $surfer->setTelnumber($tab_Surfers[$i]['tel']);
            $surfer->setInscriptioncf($tab_Surfers[$i]['inscription']);
            $surfer->setUsertype($tab_Surfers[$i]['usertype']);
            $surfer->setTryingnumber($tab_Surfers[$i]["tryingnumber"]);
            $surfer->setBamed($tab_Surfers[$i]["bamed"]);
            $surfer->setInscriptioncf($tab_Surfers[$i]["inscriptioncf"]);
            $surfer->setPostcode($tab_Surfers[$i]['postcode']);
            $surfer->setLocality($tab_Surfers[$i]['localite']);
            $surfer->setTown($tab_Surfers[$i]['town']);
            /*$surfer->setBloc($tab_Surfers[$i]['bloc']);*/
            $surfer->setAddressstreet($tab_Surfers[$i]['addressstreet']);
            $surfer->setAddressnumber($tab_Surfers[$i]['addressnumber']);
            $manager->persist($surfer);

            $manager->flush();
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }

}
