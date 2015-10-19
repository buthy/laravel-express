<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;

class PostsAdminController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(5);
        return view('admin/posts/index', compact('posts'));
    }

    public function create()
    {
        return view('admin/posts/create');
    }

    public function store(PostRequest $request)
    {
        // insere e retorna o post
        $post = $this->post->create($request->all());
        // insere as tags na tabela posts_tags
        $post->tags()->sync($this->getTagsIds($request->tags));
        return redirect()->route('admin/posts/index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin/posts/edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $this->post->find($id)->update($request->all());
        $post = $this->postModel->find($id);
        $post->tags()->sync($this->getTagsIds($request->tags));
        return redirect()->route('admin/posts/index');
    }

    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin/posts/index');
    }

    public function getTagsIds($tags)
    {
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];
        foreach($tagList as $tagName){
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }
        return $tagsIDs;
    }
}
