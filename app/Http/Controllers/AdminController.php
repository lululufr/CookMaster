<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AdminController extends Controller
{
    public function show_admin_page()
    {
        return view('admin/admin_page');
    }

    public function delete_user($id)
    {
        User::where('id', $id)->delete();

        redirect('/admin')->with('success', 'User supprimé avec succes');

    }

    public function modify_user($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('/admin/modify_user',['user'=>$user]);
    }

    public function modify_user_apply($id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        $table = $request->input('table');


        switch ($table) {
            case 'username':
                $user->username = $request->input('new_content');
                break;
            case 'firstname':
                $user->firstname = $request->input('new_content');
                break;
            case 'lastname':
                $user->lastname = $request->input('new_content');
                break;
            case 'email':
                $user->email = $request->input('new_content');
                break;
            case 'role':
                $user->role = $request->input('new_content');
                break;
            case 'buying_plan':
                $user->buying_plan = $request->input('new_content');
                break;

            //case 'password':
            //$user->username = $request->input('new_content');
            //break;

        }

        $user->save();

        return view('/admin/modify_user',['user'=>$user]);
    }


    public function show_admin_choice()
    {
        return view('admin.admin_choice');
    }

    public function show_admin_room()
    {
        //affiche toutes les salles
        $rooms = Rooms::all();
        return view('admin.room_admin',['rooms'=>$rooms]);
    }


    public function modify_room($id)
    {
        $rooms = Rooms::where('id', $id)->firstOrFail();

        return view('admin.modify_room',['rooms'=>$rooms]);
    }


    public function modify_room_apply($id, Request $request)
    {
        $rooms = Rooms::where('id', $id)->firstOrFail();
        $table = $request->input('table');


        switch ($table) {
            case 'city':
                $rooms->city = $request->input('new_content');
                break;
            case 'street':
                $rooms->street = $request->input('new_content');
                break;
            case 'postal_code':
                $rooms->postal_code = $request->input('new_content');
                break;
            case 'salle_number':
                $rooms->salle_number = $request->input('new_content');
                break;
            case 'description':
                $rooms->description = $request->input('new_content');
                break;

            //case 'password':
            //$user->username = $request->input('new_content');
            //break;

        }

        $rooms->save();

        return view('admin.modify_room',['rooms'=>$rooms]);
    }


    public function create_room_page()
    {
        return view('admin.create_room');
    }

    public function create_room_apply(Request $request)
    {

        $rooms = new Rooms();

        $rooms->city = htmlspecialchars($request->input('city'));
        $rooms->street = htmlspecialchars($request->input('street'));
        $rooms->postal_code = htmlspecialchars($request->input('postal_code'));
        $rooms->salle_number = htmlspecialchars($request->input('salle_number'));
        $rooms->description = htmlspecialchars($request->input('description'));
        $rooms->tags = htmlspecialchars($request->input('tags'));


        $rooms->save();

        return redirect('/admin/room')->with('message','Salle créée avec succes');
    }

    public function create_article_page(){
        return view('admin.create_article');
    }

    public function create_article_apply(Request $request){
        $articles = new Articles();

        $articles->titre = htmlspecialchars($request->input('titre'));
        $articles->img = htmlspecialchars($request->input('prix'));
        $articles->prix = htmlspecialchars($request->input('img'));
        $articles->discount = htmlspecialchars($request->input('discount'));
        $articles->tags = htmlspecialchars($request->input('tags'));
        $articles->description = htmlspecialchars($request->input('description'));
        $articles->lesson = htmlspecialchars($request->input('lesson'));


        $articles->save();

        return redirect('/admin/article')->with('message','Salle créée avec succes');
    }
}
