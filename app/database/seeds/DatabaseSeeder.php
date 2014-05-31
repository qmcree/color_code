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

        ColorCode\Category::create(array('id' => 1, 'name' => 'Red'));
        ColorCode\Category::create(array('id' => 2, 'name' => 'Blue'));
        ColorCode\Category::create(array('id' => 3, 'name' => 'White'));
        ColorCode\Category::create(array('id' => 4, 'name' => 'Yellow'));

        $questions = self::getQuestions();
        foreach ($questions as $question) {
            ColorCode\Question::create(array(
                'id' => $question[0],
                'text' => $question[1],
            ));
        }

        $options = self::getOptions();
        foreach ($options as $option) {
            ColorCode\Option::create(array(
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
