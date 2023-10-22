<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GithubRepositoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'repo_name'=>$this['name'],
            'full_name'=>$this['full_name'],
            'owner_name'=>$this['owner']['login'],
            'owner_url'=>$this['owner']['html_url'],
            'repo_url'=>$this['html_url'],
        ];
    }
}
