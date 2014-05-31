<?php

class HomeController extends BaseController {

	public function showForm()
	{
        $questions = ColorCode\Question::with('options')->get();
		return View::make('form', array('questions' => $questions));
	}

    public function process()
    {
        $response = new ColorCode\Response();
        $response->ip_address = Request::getClientIp();
        $response->name = Input::get('name');
        $response->email = Input::get('email');

        DB::transaction(function() use ($response) {
            $response->save();

            foreach (Input::get('options') as $optionId) {
                ColorCode\ResponseOption::create(array(
                    'response_id' => $response->id,
                    'option_id' => $optionId,
                ));
            }

            DB::commit();
        });

        $tally = $this->getTally($response->id);

        var_dump($tally);
        exit;
    }

    /**
     * Gets tally of categories.
     *
     * @param integer $responseId
     * @return array
     */
    protected function getTally($responseId)
    {
        $response = ColorCode\Response::with('responseOptions.option.category')->find($responseId);

        var_dump($response->responseOptions[0]->option->category->name);
        exit;
    }
}
