<?php

namespace HT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
	public function indexAction($page)
	{
		/* Afficher la reponse depuis un fichier view twig */
		/*$content = $this->get('templating')
						->render('HTPlatformBundle:Advert:index.html.twig', 
								 array('nom' => 'Huong', 
								 	   'advert_id' => 5
								 	  )
								);
    	return new Response($content);*/

    	//Generateur d'url
    	/*$url = $this->get('router')
    	   			->generate('ht_platform_view', array('id' => 5), URLGeneratorInterface::ABSOLUTE_URL);*/

    	//ou comme suivant
    	//$url = $this->generateUrl('ht_platform_home', array(), URLGeneratorInterface::ABSOLUTE_URL);

    	//return new Response("L'URL de l'annonce d'id 5 est : ".$url);

    	if($page < 1)
    	{
    		throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    	}

    	return $this->render('HTPlatformBundle:Advert:index.html.twig');

	}

	public function viewAction($id/*, Request $request*/)
	{
		return $this->render('HTPlatformBundle:Advert:view.html.twig', array('id' => $id));

		/* 1. Récupérer les paramètres de la requête, décommenter Request $request */
		/*$tag = $request->query->get('tag');
		$headers = $request->headers->get('USER_AGENT');
		//return new Response("Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag." et user agent : ".$headers);

		//$response = $this->get('templating')->renderResponse('HTPlatformBundle:Advert:view.html.twig', array('id' => $id, 'tag' => $tag));

		//$response = $this->render('HTPlatformBundle:Advert:view.html.twig', array('id' => $id, 'tag' => $tag));
		//return $response;

		/* 2. Redirection une réponse, commenter Request $request */
		//$url = $this->get('router')->generate('ht_platform_home');
		//return new RedirectResponse($url);

		//* ou */
		//return $this->redirectToRoute('ht_platform_home');

		/* 3. Changer le Content-Type de la réponse si c'est différent que html, commenter Request $request*/
		//$response = new Response(json_encode(array('id' => $id)));
		//$response->headers->set('Content-Type', 'application/json');
		//return $response;

		/* ou plus simple */
		//return new JsonResponse(array('id' => $id));	

		/* 4. Object Session, décommenter Request $request */	
		//$session = $request->getSession();

		//On récupère le contenu de la variable user_id
		//$userId = $session->get('user_id');
		
		//On définit une nouvelle valeur pour cette variable user_id
		//$session->set('user_id', 91);

		//return new Response("Je suuis une page de test, je n'ai rien à dire");

	}

	public function viewSlugAction($slug, $year, $_format)
	{
		return new Response("On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$_format.".");
	}

	public function addAction(Request $request)
	{
		/* Exemple de message flash : la vie d'un message qui ne dure que le temps d'une seule page */
		//$session = $request->getSession();

		//FlashBag contient les messages flash dans la session, un ou plusieurs
		//$session->getFlashBag()->add('info', 'Annonce bien enregistrée');
		//$session->getFlashBag()->add('info', 'Oui oui, elle est bien enregistrée');

		//return $this->redirectToRoute('ht_platform_view', array('id' => 5));

		/* La gestion d'un formulaire, si la requête est en POST, cad le visiteur a soumise le formulaire */
		if ($request->isMethod('POST'))
		{
			$request->getSession()->getFlashBag()->add('notice', 'Annonce est bien enregistrée');
			return $this->redirectToRoute('ht_platform_view', array('id' => 5));
		}

		return $this->render('HTPlatformBundle:Advert:add.html.twig');
	}

	public function editAction(Request $request)
	{
		if ($request->isMethod('POST'))
		{
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifié');
			return $this->redirectToRoute('ht_platform_view', array('id' => 5));
		}

		return $this->render('HTPlatformBundle:Advert:edit.html.twig');
	}

	public function deleteAction($id)
	{
		return new Response('Supprimer un truc avec son id '.$id);
	}

	public function menuAction()
	{
		$listAdverts = array(
			array('id' => 2, 'title' => 'Recherche développeur Symfony'),
			array('id' => 5, 'title' => 'Mission de webmaster'),
			array('id' => 9, 'title' => 'Offre de stage webdesigner')
		);

		return $this->render("HTPlatformBundle:Advert:menu.html.twig", array("listAdverts" => $listAdverts));
	}

	
}