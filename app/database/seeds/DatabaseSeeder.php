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

//        $this->call('UsersTableSeeder');
        $this->call('PlansTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(['email' => 'mvanmeter1@gmail.com', 'password' => Hash::make('changeme')]);
    }

}

class PlansTableSeeder extends Seeder {



    public function run()
    {
        DB::table('plans')->delete();
        $plan1 = [
            'id' => 'package',
            'name' => 'Package',
            'amount' => 200,
            'interval' => 'month',
            'currency' => 'usd',
            'metadata' => ['prints_per_month' => 5]
        ];
        $plan2 = [
            'id' => 'collection',
            'name' => 'Collection',
            'amount' => 600,
            'interval' => 'month',
            'currency' => 'usd',
            'metadata' => ['prints_per_month' => 15]
        ];
        $plan3 = [
            'id' => 'album',
            'name' => 'Album',
            'amount' => 900,
            'interval' => 'month',
            'currency' => 'usd',
            'metadata' => ['prints_per_month' => 25]
        ];
        
        Stripe::setApiKey($_ENV['STRIPE_SECRET']);
        Stripe_Plan::create($plan1);
        Stripe_Plan::create($plan2);
        Stripe_Plan::create($plan3);

    }

}