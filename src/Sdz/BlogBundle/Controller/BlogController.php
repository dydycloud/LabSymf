<?php 
namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function indexAction($page)
    {
        if ($page < 1) {
            //declenche une exception NotFoundHttpException
            //et on affiche la page code 404
            throw $this->createNotFoundException('Page inexistante (page = '.$page.')');
        }
        
         // Ici, on récupérera la liste des articles, puis on la passera au template

        return $this->render('SdzBlogBundle:Blog:index.html.twig', array('articles' => ''));
    }

    public function showAction($id)
    {
        
        $image = array(
            'url'      => 'http://uploads.siteduzero.com/icones/478001_479000/478657.png',
            'alt'   => 'Logo Symfony2'
        );

        $article = array(
            'id'      => 1,
            'titre'   => 'Mon weekend a Phi Phi Island !',
            'auteur'  => 'winzou',
            'image' => $image,
            'contenu' => 'Ce weekend était trop bien. Blabla…',
            'date'    => new \Datetime()
        );

        
            return $this->render('SdzBlogBundle:Blog:show.html.twig', array('article' => $article));
        }
    
    public function addAction()
    {
        //gestion du formulaire d'ajout
        if ($this->get('request')->getMethod() == 'POST' ) {
            //création et gestion du formulaire

            //message pour valider que l'ajout a été réalisé
            $this->get('session')->getFlashBag()->add('notice', 'News ajoutée');

            //redirection
            $this->redirect($this->generateUrl('sdz_show', array('id' => 5)));
        }
        //Si la request n'est pas du type POST on affiche le formulaire
        return $this->render('SdzBlogBundle:Blog:add.html.twig');
    }

    public function editAction($id)
    {
        // Ici, on récupérera l'article correspondant à l'$id
        $article = array(
          'id'      => 1,
          'titre'   => 'Mon weekend a Phi Phi Island !',
          'auteur'  => 'winzou',
          'contenu' => 'Ce weekend était trop bien. Blabla…',
          'date'    => new \Datetime()
        );
        // Ici, on s'occupera de la création et de la gestion du formulaire

        return $this->render('SdzBlogBundle:Blog:edit.html.twig', array('article' => $article));
    }

    public function deleteAction($id)
    {
        // Ici, on récupérera l'article correspondant à l'$id
 
        // Ici, on gérera la suppression de l'article en question

        return $this->render('SdzBlogBundle:Blog:delete.html.twig', array('id' => $id));
    }

    public function menuAction()
    {
    // On fixe en dur une liste ici, bien entendu par la suite on la récupérera depuis la BDD !
    $liste = array(
      array('id' => 2, 'titre' => 'Mon dernier weekend !'),
      array('id' => 5, 'titre' => 'Sortie de Symfony2.1'),
      array('id' => 9, 'titre' => 'Petit test')
    );
         
    return $this->render('SdzBlogBundle:Blog:menu.html.twig', array(
      'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
    ));
    }
}