<?php

namespace App\Http;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function check(Request $request)
    {
        $XML = '<?xml version="1.0" encoding="UTF-8"?>';
        $XML .= '<response>';

        $orderId = $request->input('pg_order_id');
        $order = Order::query()->find($orderId);
        if (!$order) {
            $XML .= '<pg_status>rejected</pg_status>';
            $XML .= '<pg_description>Платеж не разрешен</pg_description>';
            $XML .= '<pg_salt>random string</pg_salt>';
            $XML .= '<pg_sig>ksdjrimzjedkljsujjemnjsuj</pg_sig>';
            $XML .= '</response>';

            return response($XML, 200)->header('Content-Type', 'application/xml');
        }

        if(!$order->is_payed){
            $XML .= '<pg_status>rejected</pg_status>';
            $XML .= '<pg_description>Платеж не разрешен</pg_description>';
        }else{
            $XML .= '<pg_status>ok</pg_status>';
            $XML .= '<pg_description>Платеж разрешен</pg_description>';
        }
        $XML .= '<pg_salt>random string</pg_salt>';
        $XML .= '<pg_sig>ksdjrimzjedkljsujjemnjsuj</pg_sig>';
        $XML .= '</response>';

        return response($XML, 200)->header('Content-Type', 'application/xml');
    }

    public function result(Request $request)
    {
        $id = $request->input('order');
        $order = Order::query()->find($id);
        $status = $request->input('status');
        if($order && $status['code'] == 'success'){
            $order->update(['payed_at' => now(), 'is_payed' => 1, 'comment' => $request->input('id')]);
            echo '{"status": "ok"}';
        }
    }

}
