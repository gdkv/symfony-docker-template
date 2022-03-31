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

class UserSecurityController extends AbstractController
{

    #[Route('/profile/send-code', name: 'app_user_send_code', methods: ['POST'])]
    public function sendCode(Request $request)
    {
        // $result = ($smsSendService)($request);
        // return new JsonResponse($result);
    }

    #[Route('/profile/user-data-add', name: 'app_user_data_add')]
    public function userDataAdd(Request $request)
    {   
        // $result = ($userCreateService)($request);
        // return new JsonResponse($result);
    }

    #[Route('/profile/check-code', name: 'app_user_check_code')]
    public function checkCode(Request $request)
    {
        // $result = ($smsCodeCheckService)($request);
        // return new JsonResponse($result);
    }
    
    #[Route('/profile/logout', name: 'app_user_logout')]
    public function logout()
    {
        throw new LogicException('This method can be blank.');
    }

    #[Route('/profile/login', name: 'app_user_login')]
    public function login()
    {
        // return $this->render('security/user.html.twig');
    }

    #[Route('/profile', name: 'app_user_profile')]
    public function profile()
    {
        // return $this->render('security/profile.html.twig', [
        //     'orders' => $orderRepository->findBy(['user' => $this->getUser(), ], ['created_at' => 'DESC', ]),
        // ]);
    }
}
