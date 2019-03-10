<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_position', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 99)->unique();
        });

        $positions = [
            'chief_executive_officer',
            'chief_financial_officer',
            'chief_technology_officer',
            'chief_information_officer',
            'chief_operating_officer',
            'chief_compliance_officer',
            'chief_security_officer',
            'chief_marketing_officer',
            'chief_data_officer',
            'chief_analytics_officer',
            'accountant',
            'auditor',
            'computer_support_specialist',
            'copywriter',
            'courier',
            'designer',
            'driver',
            'editor',
            'engineer',
            'guard',
            'human_resources_specialist',
            'lawyer',
            'manager',
            'marketer',
            'promoter',
            'sales_manager',
            'secretary',
            'system_administrator',
            'systems_analyst',
            'translator',
            'web_developer',
        ];

        foreach ($positions as $position) {
            DB::table('catalog_position')->insert(['key' => $position]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_position');
    }
}
