<?php

namespace App\Http\Controllers;

use App\Assistants\Payment\PaymentService;
use App\Models\Education\Group;
use App\Models\Education\Order;
use Auth;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //password1: nFkv8gZ80Wwzvf4Y2CVT
    //password2: U7HrMPCWiB80Tz3S8CGm

    //password1-test: BBxRi6n10SaO0YnCx8ie
    //password2-test: eC19cwgwNBe2wiRTnq16

    private $service;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    public function pay($id)
    {
        $this->checkAccess($id);

//        dd('Ok');
        $price = Group::find($id)->getPrice();

        $order = Order::make([
            'user_id' => Auth()->user()->id,
            'group_id' => $id,
            'sum' => $price,
        ]);

        $order->saveOrFail();

        $paymentAddress = $this->service->pay($order);

        return redirect($paymentAddress);
//        return redirect()->back();
    }

    public function result(Request $request)
    {
        $this->service->result($request);
    }

    private function checkAccess($groupID): void
    {
        if (!Gate::allows('pay', $groupID)) {
            abort(403);
        }
    }
}
