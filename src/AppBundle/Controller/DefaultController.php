<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/buzz", name="buzztest")
     */
    public function buzztestAction(Request $request)
    {
        $buzz = $this->container->get('buzz');

        $response = $buzz->get('http://gw.api.alibaba.com/openapi/param2/2/portals.open/api.listPromotionProduct/67726?fields=totalResults,productId,salePrice,volume,30daysCommission&categoryId=3&packageType=piece&originalPriceFrom=10.00&volumeFrom=100&pageSize=40');

        echo $response->getContent();

    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction()
    {
        $category = new Category();
        $category->setName('Apparel Women');

        $product = new Product();
        $product->setAliProductId('32322377471')
                ->setAliProductTitle('Hot Sale In Stock Women Pencil Pants Skinny Zipper Hollow Out Black White 2015 New Fashion Casual Slim Summer Feminino Trousers')
                ->setCategory($category)
                ->setAliProductUrl('productUrl')
                ->setAliSalePrice('US $11.17') // Must change model to make column type=smallint, convert str to int price format, e.g. from 'US $11.17' to 11
                ->setAli30DaysCommission('30daysCommission')
                ->setAliVolume('volume')
                ->setAliCategoryId('3')
                ->setAliAffiliateUrl('promotionUrl')
                ->setNumReviews('44')
                ->setNumReviewPages('4')
                ->setDateOfLatestReview(strtotime('07 Jan 2016 19:19'))
                ->setDateLastCrawled(strtotime('01 Jan 2016 00:19'))
            ;;
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->persist($category);
        $em->flush();

        return new Response('Created product id '.$product->getId().' and category id '.$category->getId() );
    }


    /**
     * @Route("/show/{id}", name="show")
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
                        ->getRepository('AppBundle:Product')
                        ->find($id)
                    ;

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        
        $photos = $product->getPhotos();

        // $imgs_string = '';
        // foreach ($product->getUserImgUrls() as $url) {
        //     $imgs_string .= '<img src="'.$url.'"><br>';
        // }
        return $this->render('product/product_show.html.twig', 
                            array(
                                'product' => $product,
                                'photos'=> $photos,
                            )
                        );
        // return new Response('<a href="/list">Back to Home</a><br><br>Showing product id '.$product->getId().'<br><br>'.$product->getAliName().'<br><br>'.$imgs_string);
    }

    /**
     * @Route("/needscrawl/{id}", name="needscrawl")
     */
    public function needscrawlAction($id)
    {
        $product = $this->getDoctrine()
                        ->getRepository('AppBundle:Product')
                        ->find($id)
                    ;

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        
        $needsCrawl = $product->needsCrawl(strtotime('06 Jan 2016 19:19'));

        return new Response("<p>Does product # $id need to be crawled?</p><br><br><h2>Answer: $needsCrawl</h2>");
    }

    /**
     * @Route("/list", name="list")
     */
    public function listAction()
    {
        $products = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->findAll();

        $ids = array();
        
        // $url = '';
        // foreach ($products as $product) {
        //     // $product_ids[] = $product->getId();
        //    $url .= '<br><a href="/show/'.$product->getId().'">'.$product->getAliName().'</a><br>';
        // }
        // $url .= '</p>';
        return $this->render('product/products_list.html.twig', array('products' => $products));

        // return new Response('List of all products: <br>'.$url);
    }
    /**
    * @Route("category/{id}", name="show_category")
    */
    public function category($id)
    {
        $category = $this->getDoctrine()
                ->getRepository('AppBundle:Category')
                ->find($id);

        $products = $category->getProducts();
        return $this->render('product/products_list.html.twig', array('products' => $products));
    }


    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id)
    {

        $product = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        return new Response('Deleted product id '.$id);
    
    }



}
