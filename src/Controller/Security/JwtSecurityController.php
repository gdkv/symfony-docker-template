<?php

namespace App\Controller\Security;

use App\Repository\OrderRepository;
use App\Service\Sms\SmsCodeCheckService;
use App\Service\Sms\SmsSendService;
use App\Service\User\UserCreateService;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class JwtSecurityController extends AbstractController
{
    
}
