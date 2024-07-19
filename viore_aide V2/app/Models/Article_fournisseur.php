<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article_fournisseur extends Model
{
    use HasFactory;

    protected $table = 'article_fournisseur';
    protected $fillable = ['article_id', 'fournisseur_id'];
    protected $primaryKey = 'id'; 
    public $incrementing = false; 

    public function article() {
        return $this->belongsTo(Article::class);
    }
    
 }