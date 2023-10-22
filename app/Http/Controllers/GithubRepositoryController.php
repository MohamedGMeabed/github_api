<?php

namespace App\Http\Controllers;

use App\Http\Resources\GithubRepositoryResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GithubRepositoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/github-repositories",
     *     description="Github Repositories",
     *     @OA\Response(response="default", description="Github Repositories"),
     *   @OA\Parameter(
     *          description="language",
     *          in="query",
     *          name="language",
     *          required=false,
     *          example="php",
     * ),
    *   @OA\Parameter(
     *          description="date",
     *          in="query",
     *          name="date",
     *          required=false,
     *          example="2020-01-01",
     * ),
      *   @OA\Parameter(
     *          description="Pagination Count",
     *          in="query",
     *          name="per_page",
     *          required=false,
     *          example="10",
     * ),
     * )
    */
    public  function index(Request $request)
    {

        $url = 'https://api.github.com/search/repositories';

        $query = [
            'q'        => "Q",
            'sort'     => 'stars',
            'order'    => 'desc',
            'per_page' =>  $request->input('per_page', 10)
        ];

        if($request->filled('language'))
        {
            $query['q'] = 'language:'.$request->input('language');
        }
        if($request->filled('date'))
        {
            $date =Carbon::parse($request->input('date'));
            $query['q'] .= ' created:'.$date->format('Y-m-d');
        }

        $response = Http::get($url,$query);

        return GithubRepositoryResource::collection($response['items']);
    }
}
