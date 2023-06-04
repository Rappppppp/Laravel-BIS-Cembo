<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('app_content', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->text('html_content');
            $table->timestamps();
        });

        $introduction = '<p>Barangay Cembo is situated along the Pasig River and belongs to the Second District of Makati City. It is under the North East Cluster or Cluster 6 with Guadalupe Viejo, West Rembo and Northside. Based on the 2015 Census of Population conducted by the Philippine Statistics Authority (PSA), Cembo has 26,213 total population and a percentage share of 4.50%. By population density, on the other hand, considering its land area and population count, the barangay has 61 persons per 1,000 square meters.This barangay has a total land area of 426,700 square meters and it is predominantly residential. Cembo BLISS and the New Building of Makati Science High School are located within Barangay Cembo.</p>';

        $history = '<p>Cembo, a popular acronym for Central Enlisted Men&rsquo;s Barrio, has its beginning in 1949, when the first batch of enlisted servicemen from the Infantry Group, Philippine Ground Force, Florida Blanca, Pampanga arrived at the Fort William McKinley (now Fort Bonifacio). They were directed to settle at big rolling open tract of land adjacent to the North Gate (Gate I) which was mostly covered by a dense growth of cogon grass. The place was selected to be the site for the housing area of the enlisted personnel of the Philippine Ground Force.</p>';

        $history_cont = '<p>As the bulk of the whole command came later, the housing area became congested. M/Sgt. Teofilo Bautista, the barrio Lieutenant and Assistant Reservation Officer, was directed by the higher headquarter offices to lead a survey team for the location of the unoccupied space in the vast sprawling reservation thus West Rembo was created. Subsequently, the other barrios were created like the East Rembo, Comembo, and Pembo to accommodate the increasing population of the military personnel.</p>';

        $mission = '<p>Barangay Cembo to be a safe and secured place to live in for its constituents and other stakeholders will advocate and provide continuous information dissemination and intensified actions and programs on the social, economic, infrastructure, environmental management and institutional sectors.</p>';

        $vision = '<p>Barangay Cembo to be livable and disaster resilient community with safe and secured environment for its God-loving, productive and responsible citizens who will enjoy easy access to employment opportunities and basic services through the efficient and excellent public service of its leaders.</p>';

        $health = '<p>Valuing lives and providing premium and personalized healthcare services are the promise and commitment that make MakatiMed the premier hospital in the Philippines for over fifty (50) years. MakatiMed, with 600-bed capacity, delivers quality and compassionate services through its highly skilled, competent, and board-certified Physicians, Nurses, Allied Healthcare Professionals, and Management Staff, equipped with modern facilities and state-of-the-science medical equipment and technology.</p>';

        $agriculture = '<p>Irrigated farm areas mainly grow rice and sugarcane whereas rainfed areas are planted with coconut, corn and cassava. The Philippines&#39; major agricultural products include rice, coconuts, corn, sugarcane, bananas, pineapples, and mangoes.</p>';

        $firedept = '<p>the fire department is a vital public service organization dedicated to protecting and preserving the safety of communities by preventing and responding to fire emergencies. Comprising highly trained and dedicated firefighters, the fire department plays a crucial role in safeguarding lives, property, and the environment.</p>';

        $maintenance = '<p>it is a proactive and preventive approach that focuses on avoiding or minimizing downtime, malfunctions, and costly repairs. It involves conducting regular inspections, routine servicing, and scheduled maintenance tasks to identify and address potential problems before they escalate. By adhering to maintenance schedules and following established procedures, organizations can enhance the reliability, performance, and lifespan of their assets.</p>';

        DB::table('app_content')->insert([
            [
                'content' => 'aboutus_introduction',
                'html_content' => $introduction,
                'created_at' => now(),
                'updated_at' => '',
            ],
            [
                'content' => 'aboutus_history_1',
                'html_content' => $history,
                'created_at' => now(),
                'updated_at' => '',
            ],
            [
                'content' => 'aboutus_history_2',
                'html_content' => $history_cont,
                'created_at' => now(),
                'updated_at' => '',
            ],
            [
                'content' => 'aboutus_mission',
                'html_content' => $mission,
                'created_at' => now(),
                'updated_at' => '',
            ],
            [
                'content' => 'aboutus_vision',
                'html_content' => $vision,
                'created_at' => now(),
                'updated_at' => '',
            ],
            [
                'content' => 'services_health',
                'html_content' => $health,
                'created_at' => now(),
                'updated_at' => '',
            ],
            [
                'content' => 'services_agriculture',
                'html_content' => $agriculture,
                'created_at' => now(),
                'updated_at' => '',
            ],
            [
                'content' => 'services_firedept',
                'html_content' => $firedept,
                'created_at' => now(),
                'updated_at' => '',
            ],
            [
                'content' => 'services_maintenance',
                'html_content' => $maintenance,
                'created_at' => now(),
                'updated_at' => '',
            ],
        ]);

    }

    public function down()
    {
        Schema::dropIfExists('app_content');
    }
};