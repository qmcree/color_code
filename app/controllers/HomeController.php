<?php

class HomeController extends BaseController {

	public function showForm()
	{
        $questions = ColorCode\Question::with('options')->get();
		return View::make('form', array('questions' => $questions));
	}

    public function process()
    {
        $response = new ColorCode\Lib\Response();
        $response->email();

        return View::make('results', array(
            'name' => Input::get('name'),
            'tally' => $response->tally,
            'predominant' => $response->predominant,
        ));
    }
}
