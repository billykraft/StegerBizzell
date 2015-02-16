<?php

class DatabaseSeeder extends Seeder {

	    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        // DB::table('Users')->delete();
        User::create(array(
                'user_id' => 1,
                'first_name' => 'luke',
                'last_name' => 'conlon',
                'email' => 'luke@cubeatx.com',
                'password' => Hash::make('password'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
        ));
        User::create(array(
                'user_id' => 2,
                'first_name' => 'billy',
                'last_name' => 'kraft',
                'email' => 'billy@cubeatx.com',
                'password' => Hash::make('password'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
        ));  
            User::create(array(
            'user_id' => 3,
            'first_name' => 'edward',
            'last_name' => 'cates',
            'email' => 'edward@cubeatx.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));    
    }
}

