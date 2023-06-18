<?php

namespace App\Http\Controllers;

use App\Models\Chapters;
use App\Models\Classes;
use App\Models\Questions;
use App\Models\Validateds;

use Illuminate\Http\Request;


use Dompdf\Dompdf;
use Dompdf\Options;
class ClassController extends Controller
{

    public function class_page()
    {

        $classes = Classes::all();


        return view('class.class-page')->with('classes', $classes);
    }

    public function class_chapters_page(int $id)
    {

        $chapters = Chapters::where('classes_id', $id)->paginate(1);


        return view('class.class-chapters')->with('chapters', $chapters);
    }


    public function chapters_check(int $id, Request $request)
    {

        $questions = Questions::where('chapters_id', $id)->get();

        $answers = $request->all();

        foreach ($questions as $question) {

            if ($request['answer-' . $question->id] != $question->reponse) {
                return back()->with('message', 'MAUVAISE REPONSE');
            }


            $validate = new Validateds();
            $validate->validated = true;
            $validate->chapters_id = $id;
            $validate->user_id = auth()->user()->id;

            $validate->save();

            return back()->with('message', 'BONNE REPONSE');

        }
    }
        public function certif_check(int $id)
        {

            $chapters = Chapters::where('classes_id', $id)->where('type', "question")->get();
            $validated = Validateds::where('user_id', auth()->user()->id)->pluck('chapters_id')->toArray();

            $cmp = count($chapters);
            $valid=0;


            foreach ($chapters as $chapter) {

                if (in_array($chapter->id, $validated)) {
                    $valid+=1;
                }
            }

            $class = Classes::where('id',$id)->first();

            if ($cmp == $valid) {

                return view('class.getcertif')->with('class', $class);

            } else {
                return back()->with('message', 'Vous n\'avez pas validé toutes les questions de ce cours');
            }

        }



    public function certification(int $id)
    {

        $certif = Classes::find($id);

        if (!$certif) {
            return back()->with('message', 'Ce cours n\'existe pas');
        }

        $options = new Options();
        $options->set('isRemoteEnabled', true); // Activer le chargement de ressources distantes (facultatif)
        $dompdf = new Dompdf($options);

        $view = view('class.certif', compact('certif'));

        $dompdf->loadHtml($view->render());
        $dompdf->setPaper('a4', 'landscape');

        $dompdf->render();

        return $dompdf->stream('certif.pdf');
    }



}
