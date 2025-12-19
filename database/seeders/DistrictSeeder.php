<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        
        // --- Change this to match the ID of Tamil Nadu in your 'states' table ---
        $tamilNaduStateId = 1; 

        $districts = [
            ['name_en' => 'Ariyalur', 'name_ta' => 'அரியலூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Chengalpattu', 'name_ta' => 'செங்கல்பட்டு', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Chennai', 'name_ta' => 'சென்னை', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Coimbatore', 'name_ta' => 'கோயம்புத்தூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Cuddalore', 'name_ta' => 'கடலூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Dharmapuri', 'name_ta' => 'தர்மபுரி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Dindigul', 'name_ta' => 'திண்டுக்கல்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Erode', 'name_ta' => 'ஈரோடு', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Kallakurichi', 'name_ta' => 'கள்ளக்குறிச்சி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Kancheepuram', 'name_ta' => 'காஞ்சிபுரம்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Kanyakumari', 'name_ta' => 'கன்னியாகுமரி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Karur', 'name_ta' => 'கரூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Krishnagiri', 'name_ta' => 'கிருஷ்ணகிரி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Madurai', 'name_ta' => 'மதுரை', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Mayiladuthurai', 'name_ta' => 'மயிலாடுதுறை', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Nagapattinam', 'name_ta' => 'நாகப்பட்டினம்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Namakkal', 'name_ta' => 'நாமக்கல்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Nilgiris', 'name_ta' => 'நீலகிரி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Perambalur', 'name_ta' => 'பெரம்பலூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Pudukkottai', 'name_ta' => 'புதுக்கோட்டை', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Ramanathapuram', 'name_ta' => 'இராமநாதபுரம்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Ranipet', 'name_ta' => 'ராணிப்பேட்டை', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Salem', 'name_ta' => 'சேலம்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Sivaganga', 'name_ta' => 'சிவகங்கை', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Tenkasi', 'name_ta' => 'தென்காசி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Thanjavur', 'name_ta' => 'தஞ்சாவூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Theni', 'name_ta' => 'தேனி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Thoothukudi', 'name_ta' => 'தூத்துக்குடி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Tiruchirappalli', 'name_ta' => 'திருச்சிராப்பள்ளி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Tirunelveli', 'name_ta' => 'திருநெல்வேலி', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Tirupathur', 'name_ta' => 'திருப்பத்தூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Tiruppur', 'name_ta' => 'திருப்பூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Tiruvallur', 'name_ta' => 'திருவள்ளூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Tiruvannamalai', 'name_ta' => 'திருவண்ணாமலை', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Tiruvarur', 'name_ta' => 'திருவாரூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Vellore', 'name_ta' => 'வேலூர்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Viluppuram', 'name_ta' => 'விழுப்புரம்', 'state_id' => $tamilNaduStateId],
            ['name_en' => 'Virudhunagar', 'name_ta' => 'விருதுநகர்', 'state_id' => $tamilNaduStateId],
        ];

        // Add timestamps to each record
        $districtsWithTimestamps = array_map(function ($district) use ($now) {
            return array_merge($district, [
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }, $districts);

        // Insert the data into the 'districts' table
        DB::table('districts')->insert($districtsWithTimestamps);
    }
}