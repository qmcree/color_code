<?php

class HomeController extends BaseController {

	public function showForm()
	{
        $questions = Question::with('options')->get();
		return View::make('form', array('questions' => $questions));
	}

    public function process()
    {

    }
}
