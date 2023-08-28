<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moderators=User::role('moderator')->latest()->get();

        return view("admin.moderators.index",compact("moderators"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moderator=null;

        return view("admin.moderators.add_edit",compact("moderator"));
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
            "name"=>"required|string",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|min:8",
        ]);

        $moderator=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
        ]);

        $moderator->assignRole("moderator");

        return redirect()->route("admin.moderators.index")->with("success","Moderator added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moderator=User::role('moderator')->findOrFail($id);

        return view("admin.moderators.add_edit",compact("moderator"));
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
        $moderator=User::role('moderator')->findOrFail($id);

        $request->validate([
            "name"=>"required|string",
            "email"=>"required|email|unique:users,email,".$moderator->id,
            "password"=>"nullable|min:8",
        ]);

        $dataToUpdate=[
            "name"=>$request->name,
            "email"=>$request->email,
        ];

        if($request->password){
            $dataToUpdate["password"]=bcrypt($request->password);
        }

        $moderator->update($dataToUpdate);

        return redirect()->route("admin.moderators.index")->with("success","Moderator updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moderator=User::role('moderator')->findOrFail($id);

        $moderator->delete();

        return redirect()->route("admin.moderators.index")->with("success","Moderator deleted successfully");
    }

        // block moderator
        public function block(User $moderator)
        {
            $moderator->update([
                "is_blocked" => true
            ]);

            return redirect()->back()->with("success","Moderator blocked successfully");
        }

        // unblock moderator
        public function unblock(User $moderator)
        {
            $moderator->update([
                "is_blocked" => false
            ]);

            return redirect()->back()->with("success","Moderator unblocked successfully");
        }
}
