<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Chapters;
use App\Models\Classes;
use App\Models\Questions;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AdminController extends Controller
{
    public function show_admin_page()
    {
        $users = User::paginate(20);

        return view('admin/admin_page')->with('users', $users);
    }

    public function delete_user($id)
    {
        User::where('id', $id)->delete();

        return redirect('/admin')->with('success', 'User supprimé avec succes');

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
        $rooms = Rooms::paginate(20);
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


            $mediaPath = $request->file('media')->store('articles','public');
            $articles->img = $mediaPath;



        $articles->prix = htmlspecialchars($request->input('prix'));
        $articles->tags = htmlspecialchars($request->input('tags'));
        $articles->description = htmlspecialchars($request->input('description'));

        $articles->nb = htmlspecialchars($request->input('nb'));



        $articles->save();

        return redirect('/shop')->with('message','Article créée avec succes');
    }



    public function new_class_page(){

        return view('admin.admin_class_page');

    }

    public function create_classes(Request $request)
    {


        $class = new Classes();
        $class->title = $request->input('title');

        if ($request->hasFile('media_classes')) {
        $mediaPath = $request->file('media_classes')->store('classes','public');
        $class->img = $mediaPath;
    }

        //$class->img = $request->input('media_classes'); // Default image
        $class->description = $request->input('description');
        $class->chef_id = auth()->user()->id;
        $class->save();


        $classId = $class->id;


        if ($request->has('titre')) {
            $titles = $request->input('titre');
            $contenus = $request->input('contenu');
            $medias = $request->file('media');


            if (is_array($titles) && !empty($titles)) {

                for ($i = 0; $i < count($titles); $i++) {

                    $chapter = new Chapters();
                    $chapter->classes_id = $classId;
                    $chapter->title = $titles[$i];
                    $chapter->content = $contenus[$i];

                    // Check if media file is provided
                    if (isset($medias[$i]) && $medias[$i]) {
                        $mediaPath = $medias[$i]->store('chapter','public');
                        $chapter->media = $mediaPath;
                    }

                    $chapter->save();
                }
            }
        }

        return redirect()->back()->with('success', 'La classe a été créée avec succès.');
    }
        // Redirect or perform any other necessary actions


    public function delete_class(int $id){

        $class = Classes::find($id);
        $chapter = Chapters::where('classes_id', $id)->get();


        foreach ($chapter as $chap) {
            $chap->delete();
            $question = Questions::where('chapters_id', $chap->id)->get();
            foreach ($question as $quest) {
                $quest->delete();
            }

        }

        $class->delete();

        return redirect('/class');

    }

}




