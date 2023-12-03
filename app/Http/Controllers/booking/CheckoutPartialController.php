<?php

namespace App\Http\Controllers\booking;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutPartialController extends Controller
{
    //

    // private $extra;

    // public function __construct($extra)
    // {
    //     $this->extra = $extra;
    // }


    //logic extra 
    public function extra($extra){
        //price extra start
        $extra_price = 0;
        if ($extra !== null) {
            $extra_array = array();
            foreach ($extra as $extras) {
                $explode_extra = explode(',', $extras);
                $extra_array[] = $explode_extra[0];
                $harga_extra = $explode_extra[1];
                $extra_price += intval($harga_extra);
            }

            $extra_id = implode('', $extra_array);
            $split_extra = str_split($extra_id);
            $extra_id_fix = implode(',', $split_extra);
        } elseif ($extra == null) {
            $extra_id_fix = null;
        }

        return [
            'extra_price' => $extra_price,
            'extra_id_fix' => $extra_id_fix
        ];
    }

    public function kendaraanHotel($kendaraan, $hotel){
        if ($kendaraan !== null || $hotel !== null) {
            $kendaraan_explode = explode(",", $kendaraan);
            $kendaraan = intval($kendaraan_explode[0]);

            $hotels_explode = explode(",", $hotel);
            $hotels = intval($hotels_explode[0]);
        } else {
            $kendaraan = null;
            $hotels = null;
        }

        return [
            'kendaraan' => $kendaraan,
            'hotel' => $hotels
        ];
    }

    public function session($wisataId,$wisataHarga,$wisataPriceChild,$departure){


        $session = Session::where('wisata_id', $wisataId)->where('startDate', '<=', $departure)->where('endDate', '>=', $departure)->where('type', 'session')->first();
        $weekend = Session::where('wisata_id', $wisataId)->where('type', 'weekend')->first();
        $day = Carbon::now()->format('l');
        $day_departure = Carbon::parse($departure)->format('l');

        if ($session !== null) {
            $harga = $session->price;
            $harga_child = $session->price_child;
            if ($session->price_child == null) {
                $harga_child = $wisataPriceChild;
            }
        } elseif ($session == null) {
            if ($weekend !== null) {

                if ($day_departure == 'Saturday' || $day_departure == 'Sunday') {
                    $harga = $weekend->price;
                    $harga_child = $weekend->price_child;
                } else {
                    $harga = $wisataHarga;
                    $harga_child = $wisataPriceChild;
                }
            } else {
                $harga = $wisataHarga;
                $harga_child = $wisataPriceChild;
            }
        }
        return [
            'harga' => $harga,
            'price_child' => $harga_child
        ];
    }

    public function quantity($adult,$child,$harga,$harga_child){
        if ($adult > 0 || $child > 0) {
            $total_pesan = $adult + $child;
            $priceWisata = $harga * $adult + $harga_child * $child;
        } else {
            $total_pesan = 1;
            $priceWisata = $harga;
        }

        return [
            'priceWisata' => $priceWisata,
            'total_pesan' => $total_pesan
        ];
    }

    public function event($priceWisata,$eventGet,$total_pesan,$wisataId){
        $count_3 = $priceWisata;
        if ($eventGet->count() > 0) {
            $count_4 = $priceWisata;
            if ($eventGet->where('tipe', 'min_jumlah')->count() > 0) {
                $min_jumlah = Event::where('wisata_id', $wisataId)->where('tipe', 'min_jumlah')->first();
                if ($total_pesan >= $min_jumlah->min_jumlah) {
                    $count_3 = $priceWisata - ($priceWisata * $min_jumlah->potongan / 100);
                }
            }

            if ($eventGet->where('tipe', 'min_harga')->count() > 0) {
                $min_harga = Event::where('wisata_id', $wisataId)->where('tipe', 'min_harga')->first();
                if ($count_4 >= $min_harga->min_harga) {
                    $count_3 = $count_3 - ($count_3 * $min_harga->potongan / 100);
                }
            }

            if ($eventGet->where('tipe', 'aktif')->count() > 0) {
                $event_aktif = Event::where('wisata_id', $wisataId)->where('tipe', 'aktif')->first();
                $count_3 = $count_3 - ($count_3 * $event_aktif->potongan / 100);
            }

            return [
                'hargaEvent' => $count_3
            ];
        }
    }
}
