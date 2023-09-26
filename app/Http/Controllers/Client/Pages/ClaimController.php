<?php

namespace App\Http\Controllers\Client\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Claims\CreateRequest;
use App\Models\Claim;
use App\Models\Elements\Art;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function complain(CreateRequest $request, int $userId, int $elementId, string $element)
    {
        Claim::add($request->get('reason'), $userId, $elementId, $element);

        return redirect()->back();
    }
}
