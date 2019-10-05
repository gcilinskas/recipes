<?php

namespace App\Controller\Api;

use Doctrine\Common\Util\Debug;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @Route("/category")
 */
class CategoryController extends BaseController
{
    /**
     * @var string
     */
    private $allegroApiKey;

    /**
     * @var string
     */
    private $allegroApiSecret;

    /**
     * CategoryController constructor.
     *
     * @param string $allegroApiKey
     * @param string $allegroApiSecret
     */
    public function __construct(string $allegroApiKey, string $allegroApiSecret)
    {
        $this->allegroApiKey = $allegroApiKey;
        $this->allegroApiSecret = $allegroApiSecret;
    }

    /**
     * @Route("/")
     */
    public function index()
    {
        $mainCategories = $this->getMainCategories($this->getAccessToken());
//        $categoryProducts = $this->getCategoryProducts($this->getAccessToken());
//        $categories = $this->getCategories($this->getAccessToken());
//        $products = $this->getProducts($this->getAccessToken());

        Debug::dump($mainCategories);
        die();

        $response = new JsonResponse(
            [
                'data' => $mainCategories
            ]
        );

        return $response;
    }

    /**
     * @return String
     */
    public function getAccessToken(): String
    {
        $authUrl = "https://api.allegro.pl/auth/oauth/token?grant_type=client_credentials";
        $clientId = $this->allegroApiKey;
        $clientSecret = $this->allegroApiSecret;

        $ch = curl_init($authUrl);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERNAME, $clientId);
        curl_setopt($ch, CURLOPT_PASSWORD, $clientSecret);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $tokenResult = curl_exec($ch);
        $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($tokenResult === false || $resultCode !== 200) {
            exit ("Something went wrong");
        }

        $tokenObject = json_decode($tokenResult);

        return $tokenObject->access_token;
    }

    function getMainCategories(String $token)
    {
        $getCategoriesUrl = "https://api.allegro.pl/sale/categories/11763";

        $ch = curl_init($getCategoriesUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $token",
            'content-type: application/vnd.allegro.public.v1+json',
            "Accept: application/vnd.allegro.public.v1+json",
            'Access-Control-Allow-Origin: no-cors',
            "Accept-Language: en-EN"
        ]);

        $mainCategoriesResult = curl_exec($ch);
        $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($mainCategoriesResult === false || $resultCode !== 200) {
            exit ("Something went wrong");
        }

        $categoriesList = json_decode($mainCategoriesResult);

        return $categoriesList;
    }

    public function getCategoryProducts(string $token)
    {
        $getCategoriesUrl = "https://api.allegro.pl/sale/categories?parent.id=435";

        $ch = curl_init($getCategoriesUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $token",
            "Accept: application/vnd.allegro.public.v1+json",
            "Accept-Language: en-EN"
        ]);

        $mainCategoriesResult = curl_exec($ch);
        $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($mainCategoriesResult === false || $resultCode !== 200) {
            exit ("Something went wrong");
        }

        $categoriesList = json_decode($mainCategoriesResult);

        return $categoriesList;
    }

    public function getCategories(string $token)
    {
        // 5 = home and harden
        // 522 = furniture
        $getCategoriesUrl = "https://api.allegro.pl/sale/categories?parent.id=1510";

        $ch = curl_init($getCategoriesUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $token",
            "Accept: application/vnd.allegro.public.v1+json",
            "Accept-Language: en-EN"
        ]);

        $mainCategoriesResult = curl_exec($ch);
        $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($mainCategoriesResult === false || $resultCode !== 200) {
            exit ("Something went wrong");
        }

        $categoriesList = json_decode($mainCategoriesResult);

        return $categoriesList;
    }

    public function getProducts(string $token)
    {
        // 5 = home and harden
        // 522 = furniture
        // 1510 = bar chairs
        $getProductUrl = "https://api.allegro.pl/sale/products?ean=888462600712";

        $ch = curl_init($getProductUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $token",
            "Accept: application/vnd.allegro.public.v1+json",
            "Accept-Language: en-EN"
        ]);

        $mainCategoriesResult = curl_exec($ch);
        $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($mainCategoriesResult === false || $resultCode !== 200) {
            exit ("Something went wrong");
        }

        $categoriesList = json_decode($mainCategoriesResult);

        return $categoriesList;
    }


}
