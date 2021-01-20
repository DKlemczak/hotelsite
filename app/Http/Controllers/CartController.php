<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Roomtypes;
use App\Models\Reservation;
use App\Models\Reservation_positions;
use Illuminate\Support\Facades\Date;
use Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart');
        $value = 0;
        foreach($cart as $product)
        {
            $value += $product['value'];
        }

        return view("cart.index",['cart' => $cart, 'value' => $value]);
    }

    public function store()
    {
        $cart = session('cart');
        $value = 0;
        foreach($cart as $product)
        {
            $value += $product['value'];
        }
        $reservation_id = $cart[0]['reservation'];

        $reservation = Reservation::find($reservation_id);

        $reservation->advance = $value/10;
        $reservation->rest_price = $value - $reservation->advance;
        $reservation->full_price = $value;
        $reservation->status = 1;
        $reservation->save();

        CartController::destroytheCart();
        return view('statics.index');
    }

    public function addToCart(request $Request)
    {
        $roomtype = Roomtypes::find($Request->id);

        $rooms = Rooms::where('roomtypes_id',$roomtype->id)->get();
        $earliest_date = date('Y-m-d');
        $reservationroom = new Rooms;

        foreach($rooms as $room)
        {
            $date_temp = $room->reservation_positions->min('last_day_of_reservation');

            if($date_temp < $earliest_date)
            {
                $earliest_date = $date_temp;
                $reservationroom = $room;
            }
            else if($date_temp == null)
            {
                $reservationroom = $room;
                break;
            }
        }
        $cart = session()->get('cart');

        if(!$cart)
        {
            $reservation = new Reservation;
            $reservation->status = 0;
            $reservation->advance = 0;
            $reservation->rest_price = 0;
            $reservation->full_price = 0;
            $reservation->user_id = Auth::user()->id;
            $reservation->save();

            $reservation_position = new Reservation_positions;
            $reservation_position->rooms_id = $reservationroom->id;
            $reservation_position->reservation_id = $reservation->id;
            $from = Carbon::createFromFormat('Y-m-d', $Request->datefrom);
            $to = Carbon::createFromFormat('Y-m-d', $Request->dateto);
            $reservation_position->first_day_of_reservation = $Request->datefrom;
            $reservation_position->last_day_of_reservation = $Request->dateto;
            $reservation_position->value = $from->diffIndays($to) * $roomtype->PricePerDay;
            $reservation_position->save();

            $cart = [
                $reservationroom->id = [
                    "id" => $reservation_position->id,
                    "name" => $roomtype->Name,
                    "room" => $reservationroom->id,
                    "quantity" => 1,
                    "price" => $roomtype->PricePerDay,
                    "datefrom" => $Request->datefrom,
                    "dateto" => $Request->dateto,
                    "value" => $reservation_position->value,
                    "reservation" => $reservation->id
                ],
            ];

            session()->put('cart', $cart);
            session()->put('reservation', $reservation);
            return redirect()->back();
        }

        $reservation_position = new Reservation_positions;
        $reservation_position->rooms_id = $reservationroom->id;
        $session_temp = session('reservation');
        $reservation_position->reservation_id = $session_temp["id"];
        $from = Carbon::createFromFormat('Y-m-d', $Request->datefrom);
        $to = Carbon::createFromFormat('Y-m-d', $Request->dateto);
        $reservation_position->first_day_of_reservation = $Request->datefrom;
        $reservation_position->last_day_of_reservation = $Request->dateto;
        $reservation_position->value = $from->diffIndays($to) * $roomtype->PricePerDay;
        $reservation_position->save();

        $cart[$reservationroom->id] = [
            "id" => $reservation_position->id,
            "room" => $reservationroom->id,
            "name" => $roomtype->Name,
            "quantity" => 1,
            "price" => $roomtype->PricePerDay,
            "datefrom" => $Request->datefrom,
            "dateto" => $Request->dateto,
            "value" => $reservation_position->value,
            "reservation" => session('reservation')["id"]
        ];

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removefromCart($room, $id)
    {
        $reservation_position = Reservation_positions::find($id);
        $reservation_position->delete();

        $cart = session()->pull('cart', []);
        unset($cart[$room]);
        if(empty($cart))
        {
            CartController::destroytheCart();
            return view('statics.index');
        }

        session()->put('cart', $cart);

        $cart = session('cart');
        $value = 0;

        foreach($cart as $product)
        {
            $value += $product['value'];
        }

        return view("cart.index",['cart' => $cart, 'value' => $value]);
    }

    public function destroytheCart()
    {
        session()->forget('cart');
        return view('statics.index');
    }
}
