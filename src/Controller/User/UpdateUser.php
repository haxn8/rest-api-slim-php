<?php declare(strict_types=1);

namespace App\Controller\User;

use Slim\Http\Request;
use Slim\Http\Response;

class UpdateUser extends BaseUser
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $request->getParsedBody();
        $userIdLogged = $input['decoded']->sub;
        $this->checkUserPermissions($args['id'], $userIdLogged);
        $user = $this->getUserService()->updateUser($input, (int) $args['id']);

        return $this->jsonResponse('success', $user, 200);
    }
}
