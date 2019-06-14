<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Contstraints\DateTime;

use App\Form\ItemType;
use App\Entity\Catalogue;
use App\Entity\Item;
use App\Entity\Issue;
use App\Entity\Historic;

use App\Repository\CatalogueRepository;
use App\Repository\IssueRepository;

class ItemController extends AbstractController {

    /**
     * @Route("/item", name="item")
     */
    public function index() {
        return $this->render('item/index.html.twig', [
                    'controller_name' => 'ItemController',
        ]);
    }


    public function search_items(Catalogue $catalogo) {
         $user = null;
        if(isset($_SESSION['_sf2_attributes']['_security_main'])){
            $user = $_SESSION['_sf2_attributes']['_security_main'];
        }
        return $this->render('item/items.html.twig', [
                    'controller_name' => 'ItemController',
                    'catalogo' => $catalogo,
            'opcion'=>3,
              'user'=> $user
        ]);
    }

    public function display_items_issue(Request $request) {
        $user = null;
         if(isset($_SESSION['_sf2_attributes']['_security_main'])){
            $user = $_SESSION['_sf2_attributes']['_security_main'];
        }
      
        $id_issue = $request->get('id');
        $id_catalogue = $request->get('id_catalogue');
          $em = $this->getDoctrine()->getManager(); 
        $catalogue = $em->getRepository(Catalogue::class)->find($id_catalogue);
        
        $issue = $em->getRepository(Issue::class)->find($id_issue);
      
        return $this->render('item/items.html.twig', [
                    'controller_name' => 'ItemController',
                    'issue' => $issue,
            'magazine'=>$catalogue,
            'opcion'=>3,
            'user'=> $user
        ]);
    }

    public function register_item(Catalogue $catalogue, Request $request) {
        //Crear formulario
        $item = new Item();

        $fileTmpPath = "";
        if (isset($_FILES['item'])) {
            $fileTmpPath = $_FILES['item']['tmp_name']['cover'];
            $fileName = $_FILES['item']['name']['cover'];
      
            $images_field = "../public/images/item_images/";
            $route = $images_field . $fileName;

            if (move_uploaded_file($fileTmpPath, $route)) {
                $message = 'Se ha cargado bien la imagen';
            } else {
                $message = 'No se ha podido cargar la imagen';
            }

        }


        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            $item->setCatalogue($catalogue);
            if (isset($_FILES['item'])) {
                $item->setCover($fileName);
            }
            //Guardamos el item
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();


            return $this->render('item/create_item.html.twig', [
                        'form' => $form->createView(),
                        'create' => true,
                        'catalogue' => $catalogue,
                'opcion'=>3
            ]);
        }
        return $this->render('item/create_item.html.twig', [
                    'form' => $form->createView(),
                    'create' => true,
                    'catalogue' => $catalogue,
            'opcion'=>3
        ]);
    }

    public function register_issue_item(Request $request) {
        
          $item = new Item();

             $id_issue = $request->get('id');
            $id_catalogue = $request->get('id_catalogue');
             $em = $this->getDoctrine()->getManager(); 
            $catalogue = $em->getRepository(Catalogue::class)->find($id_catalogue);
            $issue = $em->getRepository(Issue::class)->find($id_issue);
        $fileTmpPath = "";
        if (isset($_FILES['item'])) {
            $fileTmpPath = $_FILES['item']['tmp_name']['cover'];
            $fileName = $_FILES['item']['name']['cover'];
      
            $images_field = "../public/images/item_images/";
            $route = $images_field . $fileName;

            if (move_uploaded_file($fileTmpPath, $route)) {
                $message = 'Se ha cargado bien la imagen';
            } else {
                $message = 'No se ha podido cargar la imagen';
            }

        }
        
        //Crear formulario
      
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            $item->setIssue($issue);
            //Guardamos el item
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();


            return $this->render('item/create_item.html.twig', [
                        'form' => $form->createView(),
                        'create' => true,
                        'issue' => $issue,
                'catalogue'=>$catalogue,
                'opcion'=>3
            ]);
        }
        return $this->render('item/create_item.html.twig', [
                    'form' => $form->createView(),
                    'create' => true,
                    'issue' => $issue,
              'catalogue'=>$catalogue,
            'opcion'=>3
        ]);
    }

    public function edit_item(Request $request, Item $item ) {
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $fileTmpPath = "";
            if (isset($_FILES['item'])) {
                $fileTmpPath = $_FILES['item']['tmp_name']['cover'];
                $fileName = $_FILES['item']['name']['cover'];
            }

            $images_field = "../public/images/item_images/";
            $route = $images_field . $fileName;

            if (move_uploaded_file($fileTmpPath, $route)) {
                $message = 'Se ha cargado bien la imagen';
            } else {
                $message = 'No se ha podido cargar la imagen';
            }

            $item->setCover($fileName);
            //Guardamos el item
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();
            
            ////GUARDAR HISTÓRICO
         //  $date_time = new \DateTime();
          // $date_time = $date_time->format('Y-m-d'); 
            $historic = new Historic;
       
            $historic->setItem($item);
         //   $historic->setEditingDate($date_time);
            $historic->setStatus($item->getStatus());
            $historic->setSaleValue($item->getSaleValue());
            $historic->setEstimatedValue($item->getEstimatedValue());
            $historic->setPurchaseValue($item->getPurchaseValue());
            $em = $this->getDoctrine()->getManager();
            $em->persist($historic);
            $em->flush();

            return $this->render('item/create_item.html.twig', [
                        'form' => $form->createView(),
                        'edit' => true,
                        'item' => $item,
                'opcion'=>3
            ]);
        }

        return $this->render('item/create_item.html.twig', [
                    'form' => $form->createView(),
                    'edit' => true,
                    'item' => $item,
            'opcion'=>3
        ]);
    }

    public function delete_item(Item $item) {

        $em = $this->getDoctrine()->getManager();
        $em->remove($item);
        $em->flush();

        return $this->render('item/items.html.twig', [
                    'controller_name' => 'ItemController',
                    'item' => $item,
            'opcion'=>3
        ]);
    }

    public function delete_item_issue(Item $item) {
        // $issue = $item['issue'];
        //   $issue = $issueRepository->findByIssueId($item);
        $em = $this->getDoctrine()->getManager();
        $em->remove($item);
        $em->flush();

        return $this->render('item/items.html.twig', [
                    'controller_name' => 'ItemController',
                    'issue' => $issue[0],
            'opcion'=>3
        ]);
    }

}
