<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Http\Requests\ImagesRequest;
use App\Repositories\PhotosRepositoryInterface;


class PhotoController extends Controller
{
    public function create (): View
    {
        return view ('photo');
    }

    public function store (ImagesRequest $request, PhotosRepositoryInterface $photosRepository): View
    {
        $photosRepository->save($request->image);

        return view('photo_ok');
    }
}
