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

        // make predominant category first
        arsort($tally);

        return View::make('results', array(
            'name' => Input::get('name'),
            'tally' => $tally,
            'predominant' => $this->getPredominant($tally),
        ));
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
        foreach ($response->responseOptions as $responseOption) {
            $categoryName = $responseOption->option->category->name;

            if (!array_key_exists($categoryName, $tally)) {
                $tally[$categoryName] = 1;
            } else {
                $tally[$categoryName]++;
            }
        }

        return $tally;
    }

    /**
     * Determines predominant category based on tally.
     *
     * @param $tally
     * @return string
     */
    protected function getPredominant($tally) {
        $sortedCategories = array_keys($tally);
        $values = array_values($tally);

        // Predominant is WHITE if range of highest score and lowest score is <= 3.
        if (($values[0] - end($values)) <= 3) {
            return 'White';
        } else {
            return $sortedCategories[0];
        }
    }
}
