<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeCategory extends BaseOrganisationModel
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articles()
    {
        return $this->hasMany(KnowledgeArticle::class, 'category_id');
    }
}
