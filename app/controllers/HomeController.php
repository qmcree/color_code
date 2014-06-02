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

        // make predominant category first
        $tally = arsort($response->tally);

        return View::make('results', array(
            'name' => Input::get('name'),
            'tally' => $tally,
            'predominant' => $response->tally,
        ));
    }


}
