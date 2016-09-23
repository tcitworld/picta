<?php

namespace Picta\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Picta\Entity\Pic;
use Picta\Entity\User;

class PicsController extends FOSRestController
{
    public function getPicsAction()
    {
        $me = new User();
        $me->setName("toto");
        $pic = new Pic($me);
        $pic->setTitle('test');
        var_dump($pic);
        $me->addPic($pic);
        return new JsonResponse($me->getPics());
    }

    public function postPicAction()
    {
      //
    }

    public function getPicAction()
    {
      //
    }

    public function patchPicAction()
    {
      //
    }

    public function deletePicAction()
    {
      //
    }

    public function getUserPicsAction()
    {
      //
    }
}
