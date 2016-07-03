<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
		$this->call(EventTypesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
		$this->call(MotivationsTableSeeder::class);
        $this->call(ResponsibilitiesTableSeeder::class);
        $this->call(ResponsibilityEventsTableSeeder::class);
		$this->call(MotivationEventsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
		$this->call(AddressesTableSeeder::class);
        $this->call(PhonesTableSeeder::class);
        $this->call(ProfileTypesTableSeeder::class);
		$this->call(ProfilesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
		$this->call(LevelLanguagesTableSeeder::class);
		$this->call(LanguageLevelsTableSeeder::class);
		$this->call(StudiesTableSeeder::class);
		$this->call(StudyUniversitiesTableSeeder::class);
		$this->call(ApplicationsTableSeeder::class);
    }
}
