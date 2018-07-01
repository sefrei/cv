<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     *@Route("/email", name="email")
     * @return Response
     */
      public function emailAction()
      {

          return $this->render('contact/email.html.twig');
      }


    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $contactFormData = $form->getData();
           $message = (new \Swift_Message('Un mail de '.$contactFormData['name']))
               ->setFrom([$contactFormData['email']  => 'Frei Frei'])
               ->setTo('severine.coyer@hugolo.fr')
               ->setCharset('utf-8')
               ->setContentType('text/html')
               ->setBody($this->renderView('email/swift.html.twig',
                   [
                       'mail' => $contactFormData,
                   ]));
            // $message->attach(\Swift_Attachment::fromPath('images/SevCoy.svg')->setFilename('severine.svg'));


           if ($mailer->send($message) == true) {
              $this->addFlash('success', 'Votre message a bien été envoyé!');
            } else {
              $this->addFlash('danger', 'Nous avons rencontré un problème, votre message n\'a pas pu être envoyé');
            }

           return $this->redirectToRoute('contact');
       }

        return $this->render('contact/index.html.twig', [
            'our_form' => $form->createView(),
        ]);
    }
}
