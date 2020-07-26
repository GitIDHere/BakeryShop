<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class USAStatesSeeder extends Seeder
{
	private $_states = [
		['state_name'=> 'Alabama', 'alpha_code' => 'AL'],
		['state_name'=> 'Montana', 'alpha_code' => 'MT'],
		['state_name'=> 'Alaska', 'alpha_code' => 'AK'],
		['state_name'=> 'Nebraska', 'alpha_code' => 'NE'],
		['state_name'=> 'Arizona', 'alpha_code' => 'AZ'],
		['state_name'=> 'Nevada', 'alpha_code' => 'NV'],
		['state_name'=> 'Arkansas', 'alpha_code' => 'AR'],
		['state_name'=> 'New hampshire', 'alpha_code' => 'NH'],
		['state_name'=> 'California', 'alpha_code' => 'CA'],
		['state_name'=> 'New jersey', 'alpha_code' => 'NJ'],
		['state_name'=> 'Colorado', 'alpha_code' => 'CO'],
		['state_name'=> 'New mexico', 'alpha_code' => 'NM'],
		['state_name'=> 'Connecticut', 'alpha_code' => 'CT'],
		['state_name'=> 'New york', 'alpha_code' => 'NY'],
		['state_name'=> 'Delaware', 'alpha_code' => 'DE'],
		['state_name'=> 'North carolina', 'alpha_code' => 'NC'],
		['state_name'=> 'District of columbia', 'alpha_code' => 'DC'],
		['state_name'=> 'North dakota', 'alpha_code' => 'ND'],
		['state_name'=> 'Florida', 'alpha_code' => 'FL'],
		['state_name'=> 'Ohio', 'alpha_code' => 'OH'],
		['state_name'=> 'Georgia', 'alpha_code' => 'GA'],
		['state_name'=> 'Oklahoma', 'alpha_code' => 'OK'],
		['state_name'=> 'Hawaii', 'alpha_code' => 'HI'],
		['state_name'=> 'Oregon', 'alpha_code' => 'OR'],
		['state_name'=> 'Idaho', 'alpha_code' => 'ID'],
		['state_name'=> 'Pennsylvania', 'alpha_code' => 'PA'],
		['state_name'=> 'Illinois', 'alpha_code' => 'IL'],
		['state_name'=> 'Rhode island', 'alpha_code' => 'RI'],
		['state_name'=> 'Indiana', 'alpha_code' => 'IN'],
		['state_name'=> 'South carolina', 'alpha_code' => 'SC'],
		['state_name'=> 'Iowa', 'alpha_code' => 'IA'],
		['state_name'=> 'South dakota', 'alpha_code' => 'SD'],
		['state_name'=> 'Kansas', 'alpha_code' => 'KS'],
		['state_name'=> 'Tennessee', 'alpha_code' => 'TN'],
		['state_name'=> 'Kentucky', 'alpha_code' => 'KY'],
		['state_name'=> 'Texas', 'alpha_code' => 'TX'],
		['state_name'=> 'Louisiana', 'alpha_code' => 'LA'],
		['state_name'=> 'Utah', 'alpha_code' => 'UT'],
		['state_name'=> 'Maine', 'alpha_code' => 'ME'],
		['state_name'=> 'Vermont', 'alpha_code' => 'VT'],
		['state_name'=> 'Maryland', 'alpha_code' => 'MD'],
		['state_name'=> 'Virginia', 'alpha_code' => 'VA'],
		['state_name'=> 'Massachusetts', 'alpha_code' => 'MA'],
		['state_name'=> 'Washington', 'alpha_code' => 'WA'],
		['state_name'=> 'Michigan', 'alpha_code' => 'MI'],
		['state_name'=> 'West virginia', 'alpha_code' => 'WV'],
		['state_name'=> 'Minnesota', 'alpha_code' => 'MN'],
		['state_name'=> 'Wisconsin', 'alpha_code' => 'WI'],
		['state_name'=> 'Mississippi', 'alpha_code' => 'MS'],
		['state_name'=> 'Wyoming', 'alpha_code' => 'WY'],
		['state_name'=> 'Missouri', 'alpha_code' => 'MO']
	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach ($this->_states as $state) {
			DB::table('usa_states')->insert([
				'state_name' => $state['state_name'],
				'alpha_code' => $state['alpha_code'],
			]);
        }
    }
}
