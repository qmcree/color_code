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

        $tally = array();
        foreach ($response->responseOptions as $i => $responseOption) {
            $categoryName = $responseOption->option->category->name;
            if (isset($tally[$categoryName])) {
                $tally[$categoryName]++;
            } else {
                array_push($tally, $categoryName);
                $tally[$categoryName] = 1;
            }
        }

        var_dump($tally);
        exit;
    }
}
