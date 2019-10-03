<?php

namespace Api\Controllers;

use Api\Models\StatsModel;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class DisplayLoginController
{
    protected $renderer;

    protected $statsModel;

    public function __construct(PhpRenderer $renderer,StatsModel $statsModel)
    {
        $this->renderer = $renderer;
        $this->statsModel = $statsModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        if ($loggedIn == true)
        {
            return $response->withRedirect('./home');
        }

        $this->renderer->render($response, 'login.phtml');
    }
}