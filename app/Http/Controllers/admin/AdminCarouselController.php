<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Clockwork\Storage\Storage;
use Illuminate\Support\Facades\File;


class AdminCarouselController extends Controller
{
    //

    public function index()
    {
        $carouselFile = public_path('carousel/carousel.json');
        $carousel = json_decode(file_get_contents($carouselFile), true);

        return view('admin.carousel_edit.index', [
            'data' => $carousel
        ]);
    }

    public function edit($index)
    {
        $carouselFile = public_path('carousel/carousel.json');
        $carousel = json_decode(file_get_contents($carouselFile), true);
        $index = $index - 1; // Indeks item yang ingin diambil
        if (!array_key_exists($index, $carousel['carousel'])) {
            // Redirect jika indeks tidak ada
            return redirect('/carousels')->with('toast_error', 'Item Not Found.');
        }
        $item = $carousel['carousel'][$index];
        return view('admin.carousel_edit.edit', [
            'data' => $item,
            'index' => $index
        ]);
    }

    public function update(Request $request, $index)
    {
        $carouselFile = public_path('carousel/carousel.json');
        $carousel = json_decode(file_get_contents($carouselFile), true);
        $index = $index;
        if (!array_key_exists($index, $carousel['carousel'])) {
            // Redirect jika indeks tidak ada
            return redirect('/carousels')->with('toast_error', 'Item Not Found.');
        }
        $img_old = $carousel['carousel'][$index]['image'];
        if ($files = $request->file('image')) {
            $extension = $files->getClientOriginalExtension();
            $nameImage = hash('sha256', time()) . '.'  . $extension;
            $up = $files->move('carousel/img', $nameImage);

            if ($up) {
                $storage = public_path('carousel/img/'.$img_old);
                if (File::exists($storage) === true) {
                    unlink($storage);
                }
            }
        } else {
            $nameImage = $img_old;
        }


        $carousel['carousel'][$index]['image'] = $nameImage;
        $carousel['carousel'][$index]['text'] = $request->text;

        $proses = File::put($carouselFile, json_encode($carousel, JSON_PRETTY_PRINT));
        if($proses){
            return redirect('/carousels')->with('toast_success', 'Successfuly update Carousel');
        }else{
            return redirect('/carousels')->with('toast_error', 'Failed update Carousel');
        }

    }
}
