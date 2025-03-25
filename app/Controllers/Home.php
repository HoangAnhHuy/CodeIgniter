<?php

namespace App\Controllers;
use App\Models\NewsModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = model(NewsModel::class);

        $data = [
            'news_list' => $model->getNews(),
            'title'     => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }
}
