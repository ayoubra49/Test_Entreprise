<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EntreprisesRepository;
use Symfony\Component\HttpFoundation\Request; 
use App\Entity\Entreprises;
use App\Entity\Adress;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType;  
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\Persistence\ManagerRegistry;


class EntreprisesController extends AbstractController
{
    #[Route('/entreprises', name: 'app_entreprises')]
    public function index(EntreprisesRepository $entrepriseRepo): Response
    {
        $entr = $entrepriseRepo->findAll(); 

        return $this->render('entreprise/list.html.twig', [
            'controller_name' => 'EntreprisesController',
            'entreprises' => $entr
        ]);
    }
    #[Route('/entreprises/adress', name: 'app_entreprises_adress')]
    public function index_adress(EntreprisesRepository $entrepriseRepo): Response
    {
        $entr = $entrepriseRepo->findAll(); 

        return $this->render('entreprise/list.html.twig', [
            'controller_name' => 'EntreprisesController',
            'entreprises' => $entr
        ]);
    }

    /**
     * @Route("/entreprises/new", name="create_entreprise")
     */
    public function newEntreprises(Request $request, ManagerRegistry $doctrine) { 
   $entreprise = new Entreprises(); 
   $form = $this->createFormBuilder($entreprise) 
      ->add('name', TextType::class) 
      ->add('villeimm', TextType::class) 
      ->add('numsiren', IntegerType::class) 
      ->add('date_creation', DateType::class) 
      ->add('date_imm', DateType::class) 
      ->add('capitale', IntegerType::class) 
      ->add('save', SubmitType::class, array('label' => 'Submit')) 
      ->getForm();  
   
   $form->handleRequest($request);  
   
   if ($form->isSubmitted() && $form->isValid()) { 
      $entreprise = $form->getData(); 
      $entreprise->setDateCreation(new \DateTime('now'));
      $doct = $doctrine->getManager();  
      
      $doct->persist($entreprise);  
      
      $doct->flush();  
      
      return $this->redirectToRoute('app_entreprises'); 
   } else { 
      return $this->render('Entreprise/new.html.twig', array( 
         'form' => $form->createView(), 
      )); 
   } 
}

    /**
     * @Route("/entreprises/new_adress", name="create_entreprise_adress")
     */
    public function createAdress(Request $request, ManagerRegistry $doctrine, EntreprisesRepository $entrepriseRepo) { 
   $entreprise = new Adress(); 
   $entr_id = $entrepriseRepo->findAll();
   $form = $this->createFormBuilder($entreprise) 
      ->add('entr_id', ChoiceType::class, ['choices' => [
        new Entreprises()
    ],]) 
      ->add('adress', TextType::class)
      ->add('save', SubmitType::class, array('label' => 'Submit')) 
      ->getForm();  
   
   $form->handleRequest($request);  
   
   if ($form->isSubmitted() && $form->isValid()) { 
      $entreprise = $form->getData(); 
      $entreprise->setDateCreation(new \DateTime('now'));
      $doct = $doctrine->getManager();  
      
      $doct->persist($entreprise);  
      
      $doct->flush();  
      
      return $this->redirectToRoute('app_entreprises_adress'); 
   } else { 
      return $this->render('adress/new.html.twig', array( 
         'form' => $form->createView(), 
      )); 
   } 
}

/** 
   * @Route("/entreprises/update/{id}", name = "entreprise_update" ) 
*/ 
public function updateAction($id, Request $request, ManagerRegistry $doctrine) { 
   $doct = $doctrine->getManager(); 
   $entreprise = $doct->getRepository('App\Entity\Entreprises')->find($id);  
    
   if (!$entreprise) { 
      throw $this->createNotFoundException( 
         'No book found for id '.$id 
      ); 
   }  
   $form = $this->createFormBuilder($entreprise)
      ->add('name', TextType::class) 
      ->add('villeimm', TextType::class) 
      ->add('numsiren', IntegerType::class) 
      ->add('date_creation', DateType::class) 
      ->add('date_imm', DateType::class) 
      ->add('capitale', IntegerType::class) 
      ->add('save', SubmitType::class, array('label' => 'Submit')) 
      ->getForm();  
   
   $form->handleRequest($request);  
   
   if ($form->isSubmitted() && $form->isValid()) { 
      $book = $form->getData(); 
      $doct = $doctrine->getManager();  
      
      // tells Doctrine you want to save the Product 
      $doct->persist($book);  
        
      //executes the queries (i.e. the INSERT query) 
      $doct->flush(); 
      return $this->redirectToRoute('app_entreprises'); 
   } else {  
      return $this->render('Entreprise/new.html.twig', array(
         'form' => $form->createView(), 
      )); 
   } 
}    

}
