<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AjaxBOOKCRUDController extends Controller
{
    // public function index()
    // {
    //     $data['books'] = Book::orderBy('id','asc')->paginate(5);
   
    //     return view('pages.home',$data);
    // }
    
   
   
    // public function store(Request $request)
    // {
    //     $book   =   Book::updateOrCreate(
    //                 [
    //                     'id' => $request->id
    //                 ],
    //                 [
    //                     'title' => $request->title, 
    //                     'code' => $request->code,
    //                     'author' => $request->author,
    //                 ]);
    
    //     return response()->json(['success' => true]);
    // }
    
    
   
    // public function edit(Request $request)
    // {   
    //     $where = array('id' => $request->id);
    //     $book  = Book::where($where)->first();
 
    //     return response()->json($book);
    // }
 
   
  
    // public function destroy(Request $request)
    // {
    //     $book = Book::where('id',$request->id)->delete();
   
    //     return response()->json(['success' => true]);
    // }
}
