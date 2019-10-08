<?php

namespace Api\Controllers;

use Api\Models\UserModel;
use Slim\Http\Request;
use Slim\Http\Response;

class LoginController
{
    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $postData = $request->getParsedBody();
        $user = $postData['user'];
        $password = $postData['password'];

        $data['success'] = false;

        if ($this->userModel->verifyLogin($user, $password)){
            $data['success'] = true;
        }

        return $response->withJson($data);
    }

}