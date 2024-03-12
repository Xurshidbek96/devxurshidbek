<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload_file($file_name, $folder)
    {
        $file = request()->file($file_name);

        // Fayl nomini vaqt bilan birgalikda yaratish
        $fileName = time() . '-' . $file->getClientOriginalName();

        // Faylni diskda saqlash (masalan, 'public' diskda)
        $filePath = $file->storeAs($folder, $fileName, 'public');

        // Saqlangan fayl uchun to'liq URL manzilini olish
        $url = Storage::url($filePath);
        return $url;
    }

    public function unlink_file($file_name)
    {
        if (isset($file_name) && file_exists(public_path($file_name))) {
            unlink(public_path($file_name));
        }
    }
}
