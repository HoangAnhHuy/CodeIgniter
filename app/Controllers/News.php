<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news_list' => $model->getNews(),
            'title'     => 'Lưu trữ sản phẩm',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    public function show(?string $slug = null)
    {
        
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if ($data['news'] === null) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Tạo một sản phẩm mới'])
            . view('news/create')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form', 'url');

        $data = $this->request->getPost(['title', 'body']);

        if (! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            return $this->new();
        }

        $post = $this->validator->getValidated();
        $model = model(NewsModel::class);

        // Chuyển đổi tiêu đề sang dạng không dấu
        $title = $post['title'];
        $title = transliterator_transliterate('Any-Latin; Latin-ASCII', $title);
        $slug = url_title($title, '-', true);

        $model->save([
            'title' => $post['title'],
            'slug'  => $slug,
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Tạo một sản phẩm mới'])
            . view('news/success')
            . view('templates/footer');
    }

    public function delete($id)
    {
        $newsModel = new NewsModel();

        // Kiểm tra bài báo có tồn tại không
        if (!$newsModel->find($id)) {
            session()->setFlashdata('error', 'Bài báo không tồn tại.');
            return redirect()->to('/news');
        }

        // Xóa bài báo
        $newsModel->delete($id);
        session()->setFlashdata('success', 'Bài báo đã được xóa.');

        return redirect()->to('/news');
    }

    public function edit($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->find($id);

        if (!$news) {
            session()->setFlashdata('error', 'Bài báo không tồn tại.');
            return redirect()->to('/news');
        }

        return view('templates/header', array('title' => $news['slug']))
            . view('news/edit', ['news' => $news])
            . view('templates/footer');;
    }

    public function update(int $id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->find($id);

        if (!$news) {
            session()->setFlashdata('error', 'Bài báo không tồn tại.');
            return redirect()->to('/news');
        }

        // Lấy dữ liệu từ form
        $data = $this->request->getPost(['title', 'body']);

        // Kiểm tra dữ liệu đầu vào
        if (! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            session()->setFlashdata('error', 'Dữ liệu không hợp lệ.');
            return redirect()->to('/news/edit/' . $id)->withInput();
        }

        // Chuyển đổi tiêu đề thành slug hợp lệ
        $title = esc($data['title']); // Xử lý tránh lỗi XSS
        if (function_exists('transliterator_transliterate')) {
            $title = transliterator_transliterate('Any-Latin; Latin-ASCII', $title);
        }
        $slug = url_title($title, '-', true);

        // Cập nhật vào database
        $newsModel->update($id, [
            'title' => $data['title'],
            'slug'  => $slug,
            'body'  => $data['body'],
        ]);

        session()->setFlashdata('success', 'Bài báo đã được cập nhật.');
        return redirect()->to('/news');
    }
}
