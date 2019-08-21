<?php

namespace App\Http\Controllers\blog\masters;
use App\Models\masters\Blog;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language=DB::table('language')->get();
        // dd($language);
        $blog = DB::table('blog as b')
        ->join('language AS l', 'l.id', '=', 'b.language_id')
        ->select('b.*', 'l.name as language_name')
        ->orderBy('b.id', 'ASC')
        ->get();

        // dd($blog);

    return view('blog.masters.blog.index')->with('language', $language)->with('blog', $blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */










    public function create()
    {
        $languages=DB::table('language')->lists('name','id');

		return view('blog.masters.blog.create')->with('languages', $languages);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
		// dd($request->all());
	
		$blog = Blog::create($request->all());

	
		$blog->update($request->all());

		return redirect()->route('blog.masters.blog.index')->with('message', 'Successfully Added')->with('er_type', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $blog = DB::table('blog as b')
     
        ->select('b.*')
        ->where('b.id', $id)
        ->first();

        $languages=DB::table('language')->lists('name','id');

    return view('blog.masters.blog.show')->with('blog', $blog)->with('languages', $languages);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = DB::table('blog as b')

        ->select('b.*')
        ->where('b.id', $id)
        ->first();

        $languages=DB::table('language')->lists('name','id');

// dd($blog);

    if ($blog) {
        return view('blog.masters.blog.edit')->with('blog', $blog)->with('languages', $languages);

    } else {

        return redirect()->route('blog.masters.blog.index')->with('message', 'Cannot Edit Deactivated Details')->with('er_type', 'danger');
    }
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
      	// dd($request->all());
		$blog = Blog::where('id', '=', $request->id)->first();
	



		$blog->update($request->all());

		return redirect()->route('blog.masters.blog.index')->with('message', 'Updated successfully')->with('er_type', 'success');

	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id) {
		$blog = Blog::where('id', '=', $id)->first();
		if ($blog) {
			$blog->delete();

			return redirect()->route('blog.masters.blog.index')->with('message', 'Successfully deactivated')->with('er_type', 'danger');
		} else {
			$blog = Blog::onlyTrashed()->where('id', '=', $id)->first();
			$blog->restore();

			return redirect()->route('blog.masters.blog.index')->with('message', 'Successfully activated')->with('er_type', 'success ');
		}
	}
}
