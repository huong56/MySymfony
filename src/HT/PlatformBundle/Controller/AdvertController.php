<?php

namespace HT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AdvertController extends Controller
{
	public function indexAction()
	{
		$content = $this->get('templating')
						->render('HTPlatformBundle:Advert:index.html.twig', 
								 array('nom' => 'Huong', 
								 	   'advert_id' => 5
								 	  )
								);
    	return new Response($content);

    	/*$url = $this->get('router')
    	   			->generate('ht_platform_view', array('id' => 5), URLGeneratorInterface::ABSOLUTE_URL);*/

    	//$url = $this->generateUrl('ht_platform_home', array(), URLGeneratorInterface::ABSOLUTE_URL);

    	return new Response("L'URL de l'annonce d'id 5 est : ".$url);

	}

	public function viewAction($id)
	{
		return new Response("Affichage de l'annonce d'id : ".$id);
	}

	public function viewSlugAction($slug, $year, $_format)
	{
		return new Response("On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$_format.".");
	}

	public function addAction()
	{
		return new Response('Ajouter un nouveau truc');
	}

	public function editAction($id)
	{
		return new Response('Modifier un truc avec son id '.$id);
	}

	public function deleteAction($id)
	{
		return new Response('Supprimer un truc avec son id '.$id);
	}
}