<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="Github Repositories", version="0.2"),
*/
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
