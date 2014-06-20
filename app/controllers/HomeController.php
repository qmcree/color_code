<?php

class HomeController extends BaseController {

    /**
     * Renders form.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
	{
        $questions = ColorCode\Question::with('options')->get();
		return View::make('form', array('questions' => $questions));
	}

    /**
     * Inserts submission to DB, emails results, and redirects to view results.
     *
     * @return mixed
     */
    public function process()
    {
        $response = new ColorCode\Lib\Response();
        $response->email();

        return Redirect::action('HomeController@showResults')->with('response', $response);
    }

    /**
     * Renders results from flashed data in session.
     *
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
