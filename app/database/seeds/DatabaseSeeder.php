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

        $questions = self::getQuestions();
        foreach ($questions as $question) {
            PhoneProvider::create(array(
                'name' => $provider[0],
                'sms_email_domain' => $provider[1],
            ));
        }

        $options = self::getOptions();
        foreach ($options as $option) {
            PhoneProvider::create(array(
                'name' => $provider[0],
                'sms_email_domain' => $provider[1],
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
