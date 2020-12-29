<?php
/**
 * Project: anippe
 * File: KnowledgeBaseController.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 11:47
 */

namespace App\Http\Controllers\Portal;


use App\Http\Controllers\Controller;
use App\Models\KnowledgeArticle;
use App\Models\KnowledgeCategory;

class KnowledgeBaseController extends Controller
{
    public function index()
    {
        $categories = KnowledgeCategory::whereHas('articles')
                ->with('articles')
                ->withCount('articles')
                ->get();

        return view('portal.knowledge-base.index', compact('categories'));
    }

    public function showCategory(KnowledgeCategory $category)
    {
        $category->load('articles');

        return view('portal.knowledge-base.category', compact('category'));
    }

    public function showArticle(KnowledgeArticle $article)
    {
        return view('portal.knowledge-base.article', compact('article'));
    }
}
