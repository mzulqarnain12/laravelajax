<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class AController extends Controller
{
    public function index()
    {
        $data['user'] = Info::orderBy('id', 'asc')->paginate(5);

        return view('pages.home', $data);
    }

    public function store(Request $request)
    {
        $user   =   Info::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'fullname' => $request->fullname,
                'address' => $request->address,
                'contact' => $request->contact,
                'city' => $request->city,
                'country' => $request->country,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $user  = Info::where($where)->first();

        return response()->json($user);
    }

    public function destroy(Request $request)
    {
        $user = Info::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
