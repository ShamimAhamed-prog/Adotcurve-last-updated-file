<?php
   
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Post;
 
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Redirect;

use Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Support\Str;

use App\Models\PostCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts']= Post::orderBy('id','desc')->where('status', 'active')->limit(3)->get();
        return view('welcome',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=PostCategory::all();
        return view('backend.admin.postcreate',compact('category'));
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
            'c_name'=>'required',
            'title' => 'required',
            'description' => 'required',
            'slug'=>'required',
            'image' => 'required',
        ]);
        $register=new Post();
        $register->c_name = $request->c_name;
        $register->title = $request->title;
        $register->slug = $request->slug;
        $register->description =$request->description;
        $file =$request->image;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->image->move('assets/blog/',$filename);
        $register->image=$filename;
        $register->save();
        // $insert = [
        //     'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image'=>$request->image,
        // ];
   
        // Post::insertGetId($insert);
    
        return redirect()->back()->with('status', 'Blog Succesfully Created');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
 
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 
    }
    public function SinglePost($id){
        $posts=Post::where('id', $id)->get();
        return view('backend.admin.Singleblog',compact('posts'));
    }
    public function BlogList(){
        $posts=Post::all();
        return view('backend.admin.bloglist',compact('posts'));
    }
    public function Activeblog($id) {
        $data=Post::find($id);
        $data->status='active';
       $data->save();
       return redirect()->back()->with('status', 'Post Active Successfully');
      }
      public function Deactiveblog($id) {
        $data=Post::find($id);
        $data->status='deactive';
        $data->save();
       return redirect()->back()->with('status', 'Post Deactive Successfully');
      }
      
}