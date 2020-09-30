<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('DataTypesTableSeeder');
        $this->seed('DataRowsTableSeeder');
        $this->seed('MenusTableSeeder');
        $this->seed('MenuItemsTableSeeder');
        $this->seed('RolesTableSeeder');
        $this->seed('PermissionsTableSeeder');
        $this->seed('PermissionRoleTableSeeder');
        $this->seed('SettingsTableSeeder');
        $this->seed('UserSeeder');
        $this->seed('PageSeeder');

        // App
        $this->seed('SpecialitiesSeeder');
        $this->seed('SchedulesTableSeeder');
        $this->seed('AnalysisTypesTableSeeder');
        $this->seed('AnalysisTableSeeder');
        $this->seed('PaymentAccountsTableSeeder');
    }
}
