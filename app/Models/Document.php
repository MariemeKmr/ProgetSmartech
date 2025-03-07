<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'chemin', 'employe_id', 'type'];

    // Relation avec Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    // Liste des types de fichiers autorisés
    public static function getAllowedTypes()
    {
        return ['pdf', 'docx', 'xlsx'];
    }

    // Accesseur pour récupérer le chemin correct du fichier
    public function getCheminAttribute($value)
    {
        return Storage::url($value);
    }
}
