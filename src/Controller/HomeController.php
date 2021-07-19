<?php

namespace App\Controller;

use App\Entity\Channel;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class HomeController extends AbstractController
{

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/tv/fr", name="tvFr")
     */

    public function tvFR()
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);


        $the_language='Français';
        $channelRepository = $this->getDoctrine()
            ->getRepository(Channel::class)
            ->findByLanguage($the_language);

        $jsonContent = $serializer->serialize($channelRepository, 'json');


        return $this->render('tv/tvFR.html.twig',["Channel"=>$channelRepository]);
    }

    /**
     * @Route("/tv/en", name="tvEn")
     */

    public function tvEN()
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);


        $the_language='English';
        $channelRepository = $this->getDoctrine()
            ->getRepository(Channel::class)
            ->findByLanguage($the_language);

        $jsonContent = $serializer->serialize($channelRepository, 'json');


        return $this->render('tv/tvEN.html.twig',["Channel"=>$channelRepository]);

    }
}
