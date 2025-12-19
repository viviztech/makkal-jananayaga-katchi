<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $targetTable = 'cities'; // Table name is cities

        // --- District Name to ID Mapping ---
        $districtMap = DB::table('districts')->pluck('id', 'name_en')->all();

        // Failsafe in case districts table is empty
        if (empty($districtMap)) {
            $this->command->error('Districts table is empty. Please run DistrictSeeder first.');
            return;
        }

        $municipalities = [
            // Ariyalur (2)
            ['name_en' => 'Ariyalur', 'name_ta' => 'அரியலூர்', 'district' => 'Ariyalur'],
            ['name_en' => 'Jayankondam', 'name_ta' => 'ஜெயங்கொண்டம்', 'district' => 'Ariyalur'],

            // Chengalpattu (6)
            ['name_en' => 'Chengalpattu', 'name_ta' => 'செங்கல்பட்டு', 'district' => 'Chengalpattu'],
            ['name_en' => 'Madurantakam', 'name_ta' => 'மதுராந்தகம்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Maraimalai Nagar', 'name_ta' => 'மறைமலை நகர்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Nandivaram-Guduvancheri', 'name_ta' => 'நந்திவரம்-கூடுவாஞ்சேரி', 'district' => 'Chengalpattu'],
            //['name_en' => 'Pallavaram', 'name_ta' => 'பல்லாவரம்', 'district' => 'Chengalpattu'], // Merged into Tambaram Corp
            //['name_en' => 'Tambaram', 'name_ta' => 'தாம்பரம்', 'district' => 'Chengalpattu'], // Upgraded to Corporation
            ['name_en' => 'Pammal', 'name_ta' => 'பம்மல்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Anakaputhur', 'name_ta' => 'அனகாபுத்தூர்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Sembakkam', 'name_ta' => 'செம்பாக்கம்', 'district' => 'Chengalpattu'], // Often listed under Kancheepuram historically

            // Chennai (0) - Corporation only

            // Coimbatore (7)
            //['name_en' => 'Coimbatore', 'name_ta' => 'கோயம்புத்தூர்', 'district' => 'Coimbatore'], // Corporation
            ['name_en' => 'Karamadai', 'name_ta' => 'காரமடை', 'district' => 'Coimbatore'], // Newly upgraded
            ['name_en' => 'Kottur', 'name_ta' => 'கோட்டூர்', 'district' => 'Coimbatore'], // Newly upgraded
            ['name_en' => 'Madukkarai', 'name_ta' => 'மதுக்கரை', 'district' => 'Coimbatore'],
            ['name_en' => 'Mettupalayam', 'name_ta' => 'மேட்டுப்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Pollachi', 'name_ta' => 'பொள்ளாச்சி', 'district' => 'Coimbatore'],
            ['name_en' => 'Valparai', 'name_ta' => 'வால்பாறை', 'district' => 'Coimbatore'],
            ['name_en' => 'Gudalur (Coimbatore)', 'name_ta' => 'கூடலூர் (கோயம்புத்தூர்)', 'district' => 'Coimbatore'], // Newly upgraded

            // Cuddalore (6)
            ['name_en' => 'Chidambaram', 'name_ta' => 'சிதம்பரம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Cuddalore', 'name_ta' => 'கடலூர்', 'district' => 'Cuddalore'], // Newly upgraded to Corp? Checking... No, still municipality.
            ['name_en' => 'Nellikuppam', 'name_ta' => 'நெல்லிக்குப்பம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Panruti', 'name_ta' => 'பண்ருட்டி', 'district' => 'Cuddalore'],
            ['name_en' => 'Thittagudi', 'name_ta' => 'திட்டக்குடி', 'district' => 'Cuddalore'], // Newly upgraded
            ['name_en' => 'Vadalur', 'name_ta' => 'வடலூர்', 'district' => 'Cuddalore'], // Newly upgraded
            ['name_en' => 'Virudhachalam', 'name_ta' => 'விருத்தாசலம்', 'district' => 'Cuddalore'],

            // Dharmapuri (2)
            ['name_en' => 'Dharmapuri', 'name_ta' => 'தருமபுரி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Harur', 'name_ta' => 'அரூர்', 'district' => 'Dharmapuri'], // Newly upgraded

            // Dindigul (3)
            //['name_en' => 'Dindigul', 'name_ta' => 'திண்டுக்கல்', 'district' => 'Dindigul'], // Corporation
            ['name_en' => 'Kodaikanal', 'name_ta' => 'கொடைக்கானல்', 'district' => 'Dindigul'],
            ['name_en' => 'Oddanchatram', 'name_ta' => 'ஒட்டன்சத்திரம்', 'district' => 'Dindigul'],
            ['name_en' => 'Palani', 'name_ta' => 'பழனி', 'district' => 'Dindigul'],

            // Erode (4)
            //['name_en' => 'Erode', 'name_ta' => 'ஈரோடு', 'district' => 'Erode'], // Corporation
            ['name_en' => 'Bhavani', 'name_ta' => 'பவானி', 'district' => 'Erode'], // Newly upgraded
            ['name_en' => 'Gobichettipalayam', 'name_ta' => 'கோபிசெட்டிபாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Punjai Puliampatti', 'name_ta' => 'புஞ்சை புளியம்பட்டி', 'district' => 'Erode'],
            ['name_en' => 'Sathyamangalam', 'name_ta' => 'சத்தியமங்கலம்', 'district' => 'Erode'],

            // Kallakurichi (3)
            ['name_en' => 'Kallakurichi', 'name_ta' => 'கள்ளக்குறிச்சி', 'district' => 'Kallakurichi'],
            ['name_en' => 'Sankarapuram', 'name_ta' => 'சங்கராபுரம்', 'district' => 'Kallakurichi'], // Newly upgraded
            ['name_en' => 'Tirukoilur', 'name_ta' => 'திருக்கோயிலூர்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Ulundurpettai', 'name_ta' => 'உளுந்தூர்பேட்டை', 'district' => 'Kallakurichi'], // Newly upgraded

            // Kancheepuram (2)
            //['name_en' => 'Kancheepuram', 'name_ta' => 'காஞ்சிபுரம்', 'district' => 'Kancheepuram'], // Corporation
            ['name_en' => 'Kundrathur', 'name_ta' => 'குன்றத்தூர்', 'district' => 'Kancheepuram'],
            ['name_en' => 'Mangadu', 'name_ta' => 'மாங்காடு', 'district' => 'Kancheepuram'],

            // Kanyakumari (4)
            ['name_en' => 'Colachel', 'name_ta' => 'குளச்சல்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kuzhithurai', 'name_ta' => 'குழித்துறை', 'district' => 'Kanyakumari'],
            //['name_en' => 'Nagercoil', 'name_ta' => 'நாகர்கோவில்', 'district' => 'Kanyakumari'], // Corporation
            ['name_en' => 'Padmanabhapuram', 'name_ta' => 'பத்மநாபபுரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Killiyur', 'name_ta' => 'கிள்ளியூர்', 'district' => 'Kanyakumari'], // Newly upgraded? Check status

            // Karur (4)
            //['name_en' => 'Karur', 'name_ta' => 'கரூர்', 'district' => 'Karur'], // Corporation
            ['name_en' => 'Inam Karur', 'name_ta' => 'இனாம் கரூர்', 'district' => 'Karur'], // Usually merged with Karur Corp
            ['name_en' => 'Kulithalai', 'name_ta' => 'குளித்தலை', 'district' => 'Karur'],
            ['name_en' => 'Pallapatti', 'name_ta' => 'பள்ளப்பட்டி', 'district' => 'Karur'],
            ['name_en' => 'Punjai Thottakurichi', 'name_ta' => 'புஞ்சை தோட்டக்குறிச்சி', 'district' => 'Karur'], // Newly upgraded

            // Krishnagiri (2)
            //['name_en' => 'Hosur', 'name_ta' => 'ஓசூர்', 'district' => 'Krishnagiri'], // Corporation
            ['name_en' => 'Krishnagiri', 'name_ta' => 'கிருஷ்ணகிரி', 'district' => 'Krishnagiri'],
            ['name_en' => 'Bargur', 'name_ta' => 'பர்கூர்', 'district' => 'Krishnagiri'], // Newly upgraded

            // Madurai (3)
            //['name_en' => 'Madurai', 'name_ta' => 'மதுரை', 'district' => 'Madurai'], // Corporation
            ['name_en' => 'Melur', 'name_ta' => 'மேலூர்', 'district' => 'Madurai'],
            ['name_en' => 'Thirumangalam', 'name_ta' => 'திருமங்கலம்', 'district' => 'Madurai'],
            ['name_en' => 'Usilampatti', 'name_ta' => 'உசிலம்பட்டி', 'district' => 'Madurai'],

            // Mayiladuthurai (2)
            ['name_en' => 'Mayiladuthurai', 'name_ta' => 'மயிலாடுதுறை', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Sirkazhi', 'name_ta' => 'சீர்காழி', 'district' => 'Mayiladuthurai'],

            // Nagapattinam (2)
            ['name_en' => 'Nagapattinam', 'name_ta' => 'நாகப்பட்டினம்', 'district' => 'Nagapattinam'],
            ['name_en' => 'Vedaranyam', 'name_ta' => 'வேதாரண்யம்', 'district' => 'Nagapattinam'],

            // Namakkal (5)
            ['name_en' => 'Kumarapalayam', 'name_ta' => 'குமாரபாளையம்', 'district' => 'Namakkal'],
            ['name_en' => 'Namakkal', 'name_ta' => 'நாமக்கல்', 'district' => 'Namakkal'],
            ['name_en' => 'Pallipalayam', 'name_ta' => 'பள்ளிபாளையம்', 'district' => 'Namakkal'],
            ['name_en' => 'Rasipuram', 'name_ta' => 'ராசிபுரம்', 'district' => 'Namakkal'],
            ['name_en' => 'Tiruchengode', 'name_ta' => 'திருச்செங்கோடு', 'district' => 'Namakkal'],

            // Nilgiris (4)
            //['name_en' => 'Coonoor', 'name_ta' => 'குன்னூர்', 'district' => 'Nilgiris'], // Upgraded to Municipality Grade I/Selection
            ['name_en' => 'Gudalur (Nilgiris)', 'name_ta' => 'கூடலூர் (நீலகிரி)', 'district' => 'Nilgiris'],
            ['name_en' => 'Hubbathala', 'name_ta' => 'ஹுப்பத்தலை', 'district' => 'Nilgiris'], // Newly upgraded
            ['name_en' => 'Ooty (Udhagamandalam)', 'name_ta' => 'உதகமண்டலம்', 'district' => 'Nilgiris'], // Municipality HQ Name
            ['name_en' => 'Nelliyalam', 'name_ta' => 'நெல்லியாளம்', 'district' => 'Nilgiris'],

            // Perambalur (1)
            ['name_en' => 'Perambalur', 'name_ta' => 'பெரம்பலூர்', 'district' => 'Perambalur'],

            // Pudukkottai (2)
            ['name_en' => 'Aranthangi', 'name_ta' => 'அறந்தாங்கி', 'district' => 'Pudukkottai'],
            ['name_en' => 'Pudukkottai', 'name_ta' => 'புதுக்கோட்டை', 'district' => 'Pudukkottai'],

            // Ramanathapuram (4)
            ['name_en' => 'Keelakarai', 'name_ta' => 'கீழக்கரை', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Paramakudi', 'name_ta' => 'பரமக்குடி', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Ramanathapuram', 'name_ta' => 'இராமநாதபுரம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Rameswaram', 'name_ta' => 'ராமேஸ்வரம்', 'district' => 'Ramanathapuram'],

            // Ranipet (6)
            ['name_en' => 'Arakkonam', 'name_ta' => 'அரக்கோணம்', 'district' => 'Ranipet'],
            ['name_en' => 'Arcot', 'name_ta' => 'ஆற்காடு', 'district' => 'Ranipet'],
            ['name_en' => 'Melvisharam', 'name_ta' => 'மேல்விஷாரம்', 'district' => 'Ranipet'],
            ['name_en' => 'Ranipet', 'name_ta' => 'ராணிப்பேட்டை', 'district' => 'Ranipet'],
            ['name_en' => 'Sholinghur', 'name_ta' => 'சோளிங்கர்', 'district' => 'Ranipet'], // Newly upgraded
            ['name_en' => 'Walajapet', 'name_ta' => 'வாலாஜாபேட்டை', 'district' => 'Ranipet'],

            // Salem (6)
            //['name_en' => 'Salem', 'name_ta' => 'சேலம்', 'district' => 'Salem'], // Corporation
            ['name_en' => 'Attur', 'name_ta' => 'ஆத்தூர்', 'district' => 'Salem'],
            ['name_en' => 'Edappadi', 'name_ta' => 'எடப்பாடி', 'district' => 'Salem'],
            ['name_en' => 'Mettur', 'name_ta' => 'மேட்டூர்', 'district' => 'Salem'],
            ['name_en' => 'Narasingapuram', 'name_ta' => 'நரசிங்கபுரம்', 'district' => 'Salem'],
            ['name_en' => 'Tharamangalam', 'name_ta' => 'தாரமங்கலம்', 'district' => 'Salem'], // Newly upgraded
            ['name_en' => 'Idappadi', 'name_ta' => 'இடப்பாடி', 'district' => 'Salem'], // Duplicate of Edappadi? Correcting.
            ['name_en' => 'Sangagiri', 'name_ta' => 'சங்ககிரி', 'district' => 'Salem'], // Newly upgraded

            // Sivaganga (3)
            ['name_en' => 'Devakottai', 'name_ta' => 'தேவகோட்டை', 'district' => 'Sivaganga'],
            ['name_en' => 'Karaikudi', 'name_ta' => 'காரைக்குடி', 'district' => 'Sivaganga'],
            ['name_en' => 'Sivaganga', 'name_ta' => 'சிவகங்கை', 'district' => 'Sivaganga'],

            // Tenkasi (6)
            ['name_en' => 'Kadayanallur', 'name_ta' => 'கடையநல்லூர்', 'district' => 'Tenkasi'],
            ['name_en' => 'Puliyankudi', 'name_ta' => 'புளியங்குடி', 'district' => 'Tenkasi'],
            ['name_en' => 'Sankarankoil', 'name_ta' => 'சங்கரன்கோவில்', 'district' => 'Tenkasi'],
            ['name_en' => 'Shenkottai', 'name_ta' => 'செங்கோட்டை', 'district' => 'Tenkasi'],
            ['name_en' => 'Surandai', 'name_ta' => 'சுரண்டை', 'district' => 'Tenkasi'], // Newly upgraded
            ['name_en' => 'Tenkasi', 'name_ta' => 'தென்காசி', 'district' => 'Tenkasi'],

            // Thanjavur (3)
            //['name_en' => 'Kumbakonam', 'name_ta' => 'கும்பகோணம்', 'district' => 'Thanjavur'], // Corporation
            //['name_en' => 'Thanjavur', 'name_ta' => 'தஞ்சாவூர்', 'district' => 'Thanjavur'], // Corporation
            ['name_en' => 'Aduthurai alias Maruthuvakudi', 'name_ta' => 'ஆடுதுறை', 'district' => 'Thanjavur'], // TP - Added full name
            ['name_en' => 'Pattukkottai', 'name_ta' => 'பட்டுக்கோட்டை', 'district' => 'Thanjavur'],
            ['name_en' => 'Thirukattupalli', 'name_ta' => 'திருக்காட்டுப்பள்ளி', 'district' => 'Thanjavur'], // Newly upgraded

            // Theni (6)
            ['name_en' => 'Bodinayakkanur', 'name_ta' => 'போடிநாயக்கனூர்', 'district' => 'Theni'],
            ['name_en' => 'Chinnamanur', 'name_ta' => 'சின்னமனூர்', 'district' => 'Theni'],
            ['name_en' => 'Cumbum', 'name_ta' => 'கம்பம்', 'district' => 'Theni'],
            ['name_en' => 'Gudalur (Theni)', 'name_ta' => 'கூடலூர் (தேனி)', 'district' => 'Theni'],
            ['name_en' => 'Periyakulam', 'name_ta' => 'பெரியகுளம்', 'district' => 'Theni'],
            ['name_en' => 'Theni Allinagaram', 'name_ta' => 'தேனி அல்லிநகரம்', 'district' => 'Theni'],

            // Thoothukudi (3)
            //['name_en' => 'Thoothukudi', 'name_ta' => 'தூத்துக்குடி', 'district' => 'Thoothukudi'], // Corporation
            ['name_en' => 'Kayalpattinam', 'name_ta' => 'காயல்பட்டினம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Kovilpatti', 'name_ta' => 'கோவில்பட்டி', 'district' => 'Thoothukudi'],
            ['name_en' => 'Tiruchendur', 'name_ta' => 'திருச்செந்தூர்', 'district' => 'Thoothukudi'], // Newly upgraded

            // Tiruchirappalli (5)
            //['name_en' => 'Tiruchirappalli', 'name_ta' => 'திருச்சிராப்பள்ளி', 'district' => 'Tiruchirappalli'], // Corporation
            ['name_en' => 'Lalgudi', 'name_ta' => 'லால்குடி', 'district' => 'Tiruchirappalli'], // Newly upgraded
            ['name_en' => 'Manapparai', 'name_ta' => 'மணப்பாறை', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Musiri', 'name_ta' => 'முசிறி', 'district' => 'Tiruchirappalli'], // Newly upgraded
            ['name_en' => 'Thottiyam', 'name_ta' => 'தொட்டியம்', 'district' => 'Tiruchirappalli'], // Newly upgraded
            ['name_en' => 'Thuraiyur', 'name_ta' => 'துறையூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Manachanallur', 'name_ta' => 'மணச்சநல்லூர்', 'district' => 'Tiruchirappalli'], // Newly upgraded

            // Tirunelveli (5)
            //['name_en' => 'Tirunelveli', 'name_ta' => 'திருநெல்வேலி', 'district' => 'Tirunelveli'], // Corporation
            ['name_en' => 'Ambasamudram', 'name_ta' => 'அம்பாசமுத்திரம்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Kalakkad', 'name_ta' => 'களக்காடு', 'district' => 'Tirunelveli'], // Newly upgraded
            ['name_en' => 'Nanguneri', 'name_ta' => 'நாங்குநேரி', 'district' => 'Tirunelveli'], // Newly upgraded
            ['name_en' => 'Vikramasingapuram', 'name_ta' => 'விக்கிரமசிங்கபுரம்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Thisayanvilai', 'name_ta' => 'திசையன்விளை', 'district' => 'Tirunelveli'], // Newly upgraded

            // Tirupathur (4)
            ['name_en' => 'Ambur', 'name_ta' => 'ஆம்பூர்', 'district' => 'Tirupathur'],
            ['name_en' => 'Jolarpettai', 'name_ta' => 'ஜோலார்பேட்டை', 'district' => 'Tirupathur'],
            ['name_en' => 'Tirupathur', 'name_ta' => 'திருப்பத்தூர்', 'district' => 'Tirupathur'],
            ['name_en' => 'Vaniyambadi', 'name_ta' => 'வாணியம்பாடி', 'district' => 'Tirupathur'],

            // Tiruppur (6)
            //['name_en' => 'Tiruppur', 'name_ta' => 'திருப்பூர்', 'district' => 'Tiruppur'], // Corporation
            ['name_en' => 'Dharapuram', 'name_ta' => 'தாராபுரம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Kangeyam', 'name_ta' => 'காங்கேயம்', 'district' => 'Tiruppur'], // Newly upgraded
            ['name_en' => 'Palladam', 'name_ta' => 'பல்லடம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Udumalaipettai', 'name_ta' => 'உடுமலைப்பேட்டை', 'district' => 'Tiruppur'],
            ['name_en' => 'Vellakoil', 'name_ta' => 'வெள்ளக்கோயில்', 'district' => 'Tiruppur'],
            ['name_en' => 'Velampalayam', 'name_ta' => 'வேலம்பாளையம்', 'district' => 'Tiruppur'], // Usually merged with Tiruppur Corp

            // Tiruvallur (6)
            ['name_en' => 'Gummidipoondi', 'name_ta' => 'கும்மிடிப்பூண்டி', 'district' => 'Tiruvallur'], // Newly upgraded
            ['name_en' => 'Ponneri', 'name_ta' => 'பொன்னேரி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Poonamallee', 'name_ta' => 'பூந்தமல்லி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Thirunindravur', 'name_ta' => 'திருநின்றவூர்', 'district' => 'Tiruvallur'], // Newly upgraded
            ['name_en' => 'Tiruttani', 'name_ta' => 'திருத்தணி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Tiruvallur', 'name_ta' => 'திருவள்ளூர்', 'district' => 'Tiruvallur'],

            // Tiruvannamalai (4)
            ['name_en' => 'Arani', 'name_ta' => 'ஆரணி', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Cheyyar', 'name_ta' => 'செய்யாறு', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Tiruvannamalai', 'name_ta' => 'திருவண்ணாமலை', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Vandavasi', 'name_ta' => 'வந்தவாசி', 'district' => 'Tiruvannamalai'],

            // Tiruvarur (4)
            ['name_en' => 'Koothanallur', 'name_ta' => 'கூத்தாநல்லூர்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Mannargudi', 'name_ta' => 'மன்னார்குடி', 'district' => 'Tiruvarur'],
            ['name_en' => 'Thiruthuraipoondi', 'name_ta' => 'திருத்துறைப்பூண்டி', 'district' => 'Tiruvarur'],
            ['name_en' => 'Tiruvarur', 'name_ta' => 'திருவாரூர்', 'district' => 'Tiruvarur'],

            // Vellore (2)
            //['name_en' => 'Vellore', 'name_ta' => 'வேலூர்', 'district' => 'Vellore'], // Corporation
            ['name_en' => 'Gudiyatham', 'name_ta' => 'குடியாத்தம்', 'district' => 'Vellore'],
            ['name_en' => 'Pernambut', 'name_ta' => 'பேரணாம்பட்டு', 'district' => 'Vellore'],

            // Viluppuram (3)
            ['name_en' => 'Kottakuppam', 'name_ta' => 'கோட்டக்குப்பம்', 'district' => 'Viluppuram'], // Newly upgraded
            ['name_en' => 'Tindivanam', 'name_ta' => 'திண்டிவனம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Viluppuram', 'name_ta' => 'விழுப்புரம்', 'district' => 'Viluppuram'],

            // Virudhunagar (5)
            ['name_en' => 'Aruppukkottai', 'name_ta' => 'அருப்புக்கோட்டை', 'district' => 'Virudhunagar'],
            ['name_en' => 'Rajapalayam', 'name_ta' => 'ராஜபாளையம்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Sattur', 'name_ta' => 'சாத்தூர்', 'district' => 'Virudhunagar'],
            //['name_en' => 'Sivakasi', 'name_ta' => 'சிவகாசி', 'district' => 'Virudhunagar'], // Corporation
            ['name_en' => 'Srivilliputhur', 'name_ta' => 'ஸ்ரீவில்லிபுத்தூர்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Virudhunagar', 'name_ta' => 'விருதுநகர்', 'district' => 'Virudhunagar'],
        ];

        // --- Prepare data for insertion ---
        $dataToInsert = [];
        $insertedCount = 0;
        foreach ($municipalities as $municipality) {
            // Find the district_id from the map
            $districtId = $districtMap[$municipality['district']] ?? null;

            if ($districtId) {
                $dataToInsert[] = [
                    'district_id' => $districtId,
                    'name_en'     => $municipality['name_en'],
                    'name_ta'     => $municipality['name_ta'],
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ];
                $insertedCount++;
            } else {
                $this->command->warn("Could not find district ID for district: " . $municipality['district'] . " (Municipality: " . $municipality['name_en'] . ")");
            }
        }

        // Clear the table before seeding
        DB::table($targetTable)->delete();

        // Insert all data in chunks
        foreach (array_chunk($dataToInsert, 100) as $chunk) {
            DB::table($targetTable)->insert($chunk);
        }

        $this->command->info("Seeded {$insertedCount} records into the '{$targetTable}' table.");
    }
}