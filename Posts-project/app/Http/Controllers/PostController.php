<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
         return view('home', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorija = [
            [
                'label' => 'sportas',
                'value' => 'sportas',
            ],
            [
                'label' => 'transportas',
                'value' => 'transportas',
            ],
            [
                'label' => 'kita',
                'value' => 'kita',
            ],
        ];

        return view('create', compact('kategorija'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pavadinimas' => 'required'
        ]);
        $post = new Post();
        $post->pavadinimas = $request->pavadinimas;
        $post->kategorija = $request->kategorija;
        $post->aprasymas = $request->aprasymas;
        $post->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $kategorija = [
            [
                'label' => 'sportas',
                'value' => 'sportas',
            ],
            [
                'label' => 'transportas',
                'value' => 'transportas',
            ],
            [
                'label' => 'kita',
                'value' => 'kita',
            ],
        ];

        return view('edit', compact('kategorija','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'pavadinimas' => 'required'
        ]);
        $kategorija = [
            [
                'label' => 'sportas',
                'value' => 'sportas',
            ],
            [
                'label' => 'transportas',
                'value' => 'transportas',
            ],
            [
                'label' => 'kita',
                'value' => 'kita',
            ],
        ];

        $post->pavadinimas = $request->pavadinimas;
        $post->kategorija = $request->kategorija;
        $post->aprasymas = $request->aprasymas;
        $post->save();
        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home');
    }
}
