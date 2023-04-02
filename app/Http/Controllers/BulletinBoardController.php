<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoardRequest;
use App\Models\BulletinBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BulletinBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view("index", [
                "boards" => BulletinBoard::all(),
                "salesman" => Auth::id()
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create", ["user_id" => Auth::id()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoardRequest $request)
    {
      if ($request->hasFile('picture')) {
        $userId = Auth::id();
        $ads = new BulletinBoard();
        $ads->title = $request->input('title');
        $ads->description = $request->input('description');
        $ads->price = $request->input('price');
        $ads->salesman =  $userId;
        $file = $request->file('picture');
        $upload_folder = 'public/board' ;
        $filename = $file->getClientOriginalName();
        $img = Storage::putFileAs($upload_folder, $file, $filename);
        $imgName = substr($filename, 0);
        $ads->image = $imgName;
        $ads->save();
        }else{
            BulletinBoard::create($request->all());
        }
        return redirect("/board");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BulletinBoard  $bulletinBoard
     * @return \Illuminate\Http\Response
     */
    public function show(BulletinBoard $board)
    {
       $ads = $board->toArray();
       return view("show", ["board" =>BulletinBoard::where('salesman', Auth::id())->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BulletinBoard  $bulletinBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(BulletinBoard $board)
    {
       $ads = $board->toArray();
       return view("edit",["boards" => BulletinBoard::find($ads)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BulletinBoard  $bulletinBoard
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBoardRequest  $request, BulletinBoard $board)
    {
          $data = $request->all();
          $board->update($data);

      if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $upload_folder = 'public/board' ;
            $filename = $file->getClientOriginalName();
            $img = Storage::delete($upload_folder, $file, $filename);
            $userId = Auth::id();
            $ads = new BulletinBoard();
            $ads->title = $request->input('title');
            $ads->description = $request->input('description');
            $ads->price = $request->input('price');
            $ads->salesman =  $userId;
            $file = $request->file('picture');
            $upload_folder = 'public/board' ;
            $filename = $file->getClientOriginalName();
            $img = Storage::putFileAs($upload_folder, $file, $filename);
            $imgName = substr($filename, 0);
            $ads->image = $imgName;
            $ads->save();
            }
           return redirect('board');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BulletinBoard  $bulletinBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(BulletinBoard $board)
    {
        $board->delete();
        return redirect("/board");
    }

     public function myAds(BulletinBoard $board)
        {
            return view("ribbon", ["boards" =>BulletinBoard::where('salesman', Auth::id())->get()]);
        }
}
