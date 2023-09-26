<?php


namespace App\Assistants\Payment;

use App\Models\Education\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentService
{
    public function pay(Order $order)
    {
        $mrh_login = "arttestru";
        $mrh_pass1 = "BBxRi6n10SaO0YnCx8ie";
        $inv_id = $order->id;
        $inv_desc = "Test";
        $shp_item = 'course';
        $out_sum = $order->sum;
        $IsTest = 1;
        $crc = md5("$mrh_login:$out_sum:$inv_id:$mrh_pass1:Shp_item=$shp_item");

        $query = http_build_query([
            'MerchantLogin' => $mrh_login,
            'InvID' => $inv_id,
            'OutSum' => $out_sum,
            'Shp_item' => 'course',
            'Desc' => $inv_desc,
            'SignatureValue' => $crc,
            'IsTest' => $IsTest
        ]);

        return $paymentAddress = 'https://merchant.roboxchange.com/Index.aspx?' . $query;
    }

    public function result(Request $request)
    {
        $password2 = 'eC19cwgwNBe2wiRTnq16';

        $out_sum = $request['OutSum'];
        $inv_id = $request['InvId'];
        $shp_item = $request['Shp_item'];
        $crc = $request['SignatureValue'];

        $crc = strtoupper($crc);

        $my_crc = strtoupper(md5("$out_sum:$inv_id:$password2:Shp_item=$shp_item"));

        if ($my_crc !== $crc) {
            return 'bad sign';
        }

        $this->markAsPaid($inv_id);

        return 'OK' . $inv_id;
    }

    public function markAsPaid($inv_id)
    {
        $order = Order::findOrFail($inv_id);
        $order->markAsPaid(Carbon::now());
    }
}
