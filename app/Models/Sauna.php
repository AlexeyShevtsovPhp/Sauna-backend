<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sauna extends Model
{

    protected $table = 'saunas';

    use HasFactory;
    use Notifiable;
    public $timestamps = false;

    public static function updateSaunaPhoto($saunaId, $file): string
    {
        $sauna = Sauna::findOrFail($saunaId);

        $filename = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();

        $directory = public_path('images/saunaList');

        if (!file_exists($directory . DIRECTORY_SEPARATOR . $filename)) {
            $file->move($directory, $filename);
        }

        $currentPictures = $sauna->picture ?? [];

        if (is_string($currentPictures)) {
            $currentPictures = json_decode($currentPictures, true) ?? [];
        }

        $newUrl = asset("images/saunaList/{$filename}");
        if (!in_array($newUrl, $currentPictures)) {
            $currentPictures[] = $newUrl;
        }

        $sauna->picture = $currentPictures;
        $sauna->save();

        return $newUrl;
    }

    public static function deleteSaunaPhoto(int $saunaId, string $photoUrl): bool
    {
        $sauna = self::find($saunaId);

        $pictures = json_decode($sauna->picture, true) ?? [];

        unset($pictures[array_search($photoUrl, $pictures)]);

        $sauna->picture = json_encode(array_values($pictures));

        $filePath = public_path($photoUrl);

        if (file_exists($filePath)) {
            unlink($filePath);
        }
        return $sauna->save();
    }
}
