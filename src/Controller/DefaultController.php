<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{

  /**
   *@Route("/", name="index")
   * @return Response
   */
    public function indexAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('main/accueil.html.twig', array(
            'number' => $number,
        ));
    }

    /**
     *@Route("/formations", name="formations")
     * @return Response
     */
      public function formationsAction()
      {
          $number = mt_rand(0, 100);

          return $this->render('main/formations.html.twig', array(
              'number' => $number,
          ));
      }

      /**
       *@Route("/savoir_faire", name="savoir_faire")
       * @return Response
       */
        public function savoirFaireAction()
        {
            $number = mt_rand(0, 100);

            return $this->render('main/savoir-faire.html.twig', array(
                'number' => $number,
            ));
        }

        /**
         *@Route("/print/web", name="print-web")
         * @return Response
         */
          public function printWebAction()
          {
              $number = mt_rand(0, 100);

              return $this->render('main/print-web.html.twig', array(
                  'number' => $number,
              ));
          }

          /**
           *@Route("/autres/expériences", name="autres-experiences")
           * @return Response
           */
            public function otherExpeAction()
            {
                $number = mt_rand(0, 100);

                return $this->render('main/autres-experiences.html.twig', array(
                    'number' => $number,
                ));
            }

            /**
             *@Route("/portfolio", name="portfolio")
             * @return Response
             */
              public function portfolioAction()
              {

                  return $this->render('main/portfolio.html.twig');
              }

              /**
               *@Route("/download", name="download")
               * @return File
               */
            public function downloadAction()
            {
                // send the file contents and force the browser to download it
                return $this->file('download/Severine_Coyer_2018H.pdf');
            }
}
