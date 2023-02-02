<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoardRequest;
use App\Models\BulletinBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       BulletinBoard::create($request->all());
               return redirect("/board/create");
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
               return redirect("/board");
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

     public function myfunc(BulletinBoard $board)
        {

            return view("ribbon", ["boards" =>BulletinBoard::where('salesman', Auth::id())->get()]);

        }
}
