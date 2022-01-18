<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Support\Facades\Http;

class Conversion extends Model
{
    use HasFactory;
    protected $guarded = [];

    /* Send Money Post for Save */
    public static function saveSendMoneyData($request)
    {
        /* api use from fixer.io */
        $response = Http::get('http://data.fixer.io/api/latest?access_key=22e1b7ff4a25f99c10635865e4c87b0c');
        $currency = $response->json();
        if (Auth::user()->currency == "USD") {
            $diff = $currency['rates']['USD'] - $currency['rates']['EUR'];
            $cal = $currency['rates']['EUR'] * $request->amount;
            $price = $cal - $diff;
        } else if (Auth::user()->currency == "EUR") {
            $price = $currency['rates']['USD'] * $request->amount;
        }
        $conversion = Conversion::create([
            'user_id' => $request->user_id,
            'send_amount' => $request->amount,
            'receive_amount' => $price,
            'sender_id' => Auth::user()->id,
        ]);
        $self = User::where('id', Auth::user()->id)->first();
        $self->wallet = $self->wallet - $request->amount;
        $self->save();
        $receive_user = User::where('id', $request->user_id)->first();
        $receive_user->wallet = $receive_user->wallet + $conversion->receive_amount;
        $receive_user->save();
    }
}
