<?php

namespace ColorCode\Lib;

use ColorCode;

class Response
{
    public $responseId = 0;
    public $tally = array();
    public $predominant = '';

    public function __construct()
    {
        $this->save();
        $this->setTally();
        $this->setPredominant();
    }

    /**
     * Saves response and response options to database.
     * Uses request parameters.
     */
    protected function save()
    {
        $response = new ColorCode\Response();
        $response->ip_address = \Request::getClientIp();
        $response->name = \Input::get('name');
        $response->email = \Input::get('email');

        \DB::transaction(function() use ($response) {
            $response->save();

            foreach (\Input::get('options') as $optionId) {
                ColorCode\ResponseOption::create(array(
                    'response_id' => $response->id,
                    'option_id' => $optionId,
                ));
            }

            \DB::commit();
        });

        $this->responseId = $response->id;
    }

    /**
     * Gets tally of categories.
     * @return array
     */
    protected function setTally()
    {
        $response = ColorCode\Response::with('responseOptions.option.category')->find($this->responseId);

        $tally = array();
        foreach ($response->responseOptions as $responseOption) {
            $categoryName = $responseOption->option->category->name;

            if (!array_key_exists($categoryName, $tally)) {
                $tally[$categoryName] = 1;
            } else {
                $tally[$categoryName]++;
            }
        }
        // make predominant category first
        arsort($tally);

        $this->tally = $tally;
    }

    /**
     * Determines predominant category based on tally.
     */
    protected function setPredominant()
    {
        $sortedCategories = array_keys($this->tally);
        $values = array_values($this->tally);

        // Predominant is WHITE if range of highest score and lowest score is <= 3.
        if (($values[0] - end($values)) <= 3) {
            $this->predominant = 'White';
        } else {
            $this->predominant = $sortedCategories[0];
        }
    }

    /**
     * Emails results.
     */
    public function email()
    {
        $data = array(
            'name' => \Input::get('name'),
            'tally' => $this->tally,
            'predominant' => $this->predominant,
        );

        \Mail::send('email.results', $data, function($email) {
            $email->to(\Input::get('email'), \Input::get('name'))->subject('Your detailed results');
        });
    }
} 