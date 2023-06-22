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

        $classes = Classes::paginate(8);

        return view('class.class-page', compact('classes'));
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
        $user = auth()->user();

        if (!$certif) {
            return back()->with('message', 'Ce cours n\'existe pas');
        }

        $options = new Options();
        $options->set('isRemoteEnabled', true); // Activer le chargement de ressources distantes (facultatif)
        $dompdf = new Dompdf($options);

        $view = view('class.certif', compact('certif', 'user'));

        $dompdf->loadHtml($view->render());
        $dompdf->setPaper('a4', 'landscape');

        $dompdf->render();

        return $dompdf->stream('certificat'."12421".$id."5526".'.pdf');
    }


    public function edit_class(int $id)
    {

        $chapters = Chapters::where('classes_id', $id)->get();

        $class_id = $chapters[0]->classes->id;


        return view('class.class-edit')->
        with('chapters', $chapters)
        ->with('class_id', $class_id);
    }


    public function edit_class_submit(Request $request, int $id)
    {
        $chapters = Chapters::findOrFail($id);

        $chapters->title = $request->input('title');
        $chapters->content = $request->input('content');
        $chapters->save();

        return redirect('/class/'.$chapters->classes->id.'/edit');
    }

    public function edit_class_add_form(Request $request, int $id)
    {

        $questions = $request->input('questions');


        $chapter = new Chapters();
        $chapter->title = 'questionnaire';
        $chapter->type = 'question';
        $chapter->classes_id = $id;
        $chapter->save();

        foreach ($questions as $question) {
            $questionText = $question['question'];
            $answerText = $question['answer'];

            $question = new Questions();
            $question->question = $questionText;
            $question->reponse = $answerText;
            $question->chapters_id = $chapter->id;
            $question->type = "libre"; // a modifier plus tard
            $question->save();

        }

        return redirect('/class/'.$id.'/edit');
    }

    public function edit_class_del_form(int $id)
    {
        $question = Questions::where('chapters_id',$id);
        $question->delete();

        $chapter = Chapters::where('id',$id);
        $chapter->delete();

        return back();
    }


}
