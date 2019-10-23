<?php


namespace App\Controller;


use App\Model\ItemManager;

class ContactController extends AbstractController
{
    public function index(){
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById(3);
        $title = 'Welcome to my contact page';
        return $this->twig->render('Contact/index.html.twig', [
            'title' => $title,
            'item' => $item
        ]);
    }
}