<?php
// src/Models/Voiture.php
namespace PluginVoiture\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = ['marque', 'modele', 'annee', 'prix'];
}
