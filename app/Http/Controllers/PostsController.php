<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            1. 게시글 리스트를 DB에서 읽어와야지
            2. 게시글 목록을 만들어주는 BLADE 에 읽어온 데이터를 전달하고 실행.
            3.


        */

        // select * from posts order by created_at desc
        // $posts = Post::all();

        // 게시글 화면 출력하는거 순서를 바꾸기.
        // $posts = Post::orderBy('created_at','desc')->get();
        // $posts = Post::latest()->get();


        $posts = Post::latest()->paginate(10);

        // dd($posts); // 실험
        return view('bbs.index',['posts' =>$posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd("heiiii");

        return view ('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required','content'=>'required|min:10']);
        //
        // dd($request->all());

        $path = null;

        if($request -> hasFile ('image')){
            // dd($request->file('image'));
            $fileName = time().'_'.
                $request->file('image')->getClientOriginalName();
            $path=$request->file('image')

            ->storeAs('public/images',$fileName);

        // dd($path);
        }


        $input = array_merge($request->all(),
                ["user_id"=>Auth::user()->id]);

                // 이미지가 있으면 $input에 image 항목 추가)
        if($path){
            // dd($path.':'.strrpos($path,'/'));
            $path = substr($path,strrpos($path,'/')+1);
            // dd($path);

            $input = array_merge($input,['image'=> $fileName]);
            // dd($input);
        }
        // $request->all() : ['title'=>'dfak1', 'content'=>'asdsa']
        // ["user_id"=>Auth::user()->id] => ['user_id'=>1]
        // array_merge(['title'=>'dfak1','content'=>'cdkd'],
        // ['user_id'=>1])

         /*
        input의 내용은 ["title" =>"dasads", "content=>asdasd", "user_id"=>1]
        */
        // dd($input);

        // mass assignment
        // Eloquent model 의 white list 인 $fillable에 기술 해야 한다.
        Post::create($input);

        // $post = new Post;
        // $post -> title = $input['title'];
        // $post -> content = $input['content'];

        // ...


        // return view(('bbs.index'), ['posts'=>Post::all()]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //id에 해당하는 Post를 데이터베이스에서 인출
        $post = Post::find($id);
        // 그놈을 상세보기 뷰로 전달한다.
        return view ('bbs.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $id에 해당하는 포스트를 수정 할 수 있는 페이지를 반환해주면 된다.

        return view ('bbs.edit',['post'=>Post::find($id)]);

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
        //
            $this->validate($request, ['title'=>'required', 'content'=>'required|min:3']);

            $post = Post::find($id);
            // $post->title= $request->title;
            // $post->content= $request->content;
            // $post->save();

            // $post->update(['title'=> $request->title,
            //             'content'=>$request->content]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // DI,의존성 주입
        // dd($request);
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
}
