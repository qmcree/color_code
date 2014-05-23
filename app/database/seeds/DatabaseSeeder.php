<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

        Category::create(array('id' => 1, 'name' => 'Red'));
        Category::create(array('id' => 2, 'name' => 'Blue'));
        Category::create(array('id' => 3, 'name' => 'White'));
        Category::create(array('id' => 4, 'name' => 'Yellow'));

        $questions = self::getQuestions();
        foreach ($questions as $question) {
            Question::create(array(
                'id' => $question[0],
                'text' => $question[1],
            ));
        }

        $options = self::getOptions();
        foreach ($options as $option) {
            Option::create(array(
                'question_id' => $option[0],
                'text' => $option[1],
                'category_id' => $option[2],
            ));
        }
	}

    protected static function getQuestions()
    {
        return array_map('str_getcsv', file('/var/www/color_code/app/database/seeds/questions.csv'));
    }

    protected static function getOptions()
    {
        return array_map('str_getcsv', file('/var/www/color_code/app/database/seeds/options.csv'));
    }
}
