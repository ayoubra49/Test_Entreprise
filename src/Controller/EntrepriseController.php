<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class EntrepriseController extends AbstractController
{
        public function edit(Article $article)
    {
        $form = $this->createForm(EntrepriseFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Article $article */
            $article = $form->getData();
            $em->persist($article);
            $em->flush();
            $this->addFlash('success', 'Article Created! Knowledge is power!');
            return $this->redirectToRoute('app_entreprise_list');
        }
        return $this->render('Entreprise/new.html.twig', [
            'articleForm' => $form->createView()
        ]);
    }
    /**
     * @Route("/entreprise", name="app_entreprise_list")
     */
    public function list()
    {
        $entr = $this->getDoctrine()
        ->getRepository('AppBundle:Entreprise') 
        ->findAll(); 
   return $this->render('Entreprise/list.html.twig', array('data' => $entr)); 
    }
    /**
     * @Route("/entreprise/new", name="app_entreprise_new")
     */
    public function new()
    {
$form = $this->createForm(EntrepriseType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();
            $item->setProduct($product);

            $cart = $cartManager->getCurrentCart();
            $cart
                ->addItem($item)
                ->setUpdatedAt(new \DateTime());

            $cartManager->save($cart);

            return $this->redirectToRoute('product.detail', ['id' => $product->getId()]);
        }

        return $this->render('product/detail.html.twig', [
            'product' => $product,
            'form' => $form->createView()
        ]);
    }
}