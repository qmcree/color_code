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

        return Redirect::action('HomeController@showResults')->with('response', $response);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function showResults()
    {
        if (!Session::has('response'))
            return Redirect::action('HomeController@showForm');

        $response = Session::get('response');

        return View::make('results', array(
            'name' => Input::get('name'),
            'tally' => $response->tally,
            'predominant' => $response->predominant,
        ));
    }
}
