<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AssemblySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        // --- District Name to ID Mapping ---
        // This map assumes your 'districts' table has IDs matching this alphabetical order.
        // It fetches them from the DB to be robust, even if IDs are not sequential (e.g., 1, 2, 5, 7...)
        
        $districtMap = DB::table('districts')->pluck('id', 'name_en')->all();
        
        // Failsafe in case districts table is empty
        if (empty($districtMap)) {
            $this->command->error('Districts table is empty. Please run DistrictSeeder first.');
            // As a fallback, use an assumed map.
            $districtMap = [
                'Ariyalur' => 1, 'Chengalpattu' => 2, 'Chennai' => 3, 'Coimbatore' => 4,
                'Cuddalore' => 5, 'Dharmapuri' => 6, 'Dindigul' => 7, 'Erode' => 8,
                'Kallakurichi' => 9, 'Kancheepuram' => 10, 'Kanyakumari' => 11, 'Karur' => 12,
                'Krishnagiri' => 13, 'Madurai' => 14, 'Mayiladuthurai' => 15, 'Nagapattinam' => 16,
                'Namakkal' => 17, 'Nilgiris' => 18, 'Perambalur' => 19, 'Pudukkottai' => 20,
                'Ramanathapuram' => 21, 'Ranipet' => 22, 'Salem' => 23, 'Sivaganga' => 24,
                'Tenkasi' => 25, 'Thanjavur' => 26, 'Theni' => 27, 'Thoothukudi' => 28,
                'Tiruchirappalli' => 29, 'Tirunelveli' => 30, 'Tirupathur' => 31, 'Tiruppur' => 32,
                'Tiruvallur' => 33, 'Tiruvannamalai' => 34, 'Tiruvarur' => 35, 'Vellore' => 36,
                'Viluppuram' => 37, 'Virudhunagar' => 38,
            ];
        }

        $assemblies = [
            // Tiruvallur
            ['name_en' => 'Gummidipoondi', 'name_ta' => 'கும்மிடிப்பூண்டி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Ponneri (SC)', 'name_ta' => 'பொன்னேரி (தனி)', 'district' => 'Tiruvallur'],
            ['name_en' => 'Tiruttani', 'name_ta' => 'திருத்தணி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Tiruvallur', 'name_ta' => 'திருவள்ளூர்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Poonamallee (SC)', 'name_ta' => 'பூந்தமல்லி (தனி)', 'district' => 'Tiruvallur'],
            ['name_en' => 'Avadi', 'name_ta' => 'ஆவடி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Maduravoyal', 'name_ta' => 'மதுரவாயல்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Ambattur', 'name_ta' => 'அம்பத்தூர்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Madavaram', 'name_ta' => 'மாதவரம்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Thiruvottiyur', 'name_ta' => 'திருவொற்றியூர்', 'district' => 'Tiruvallur'],

            // Chennai
            ['name_en' => 'Dr. Radhakrishnan Nagar', 'name_ta' => 'டாக்டர் ராதாகிருஷ்ணன் நகர்', 'district' => 'Chennai'],
            ['name_en' => 'Perambur', 'name_ta' => 'பெரம்பூர்', 'district' => 'Chennai'],
            ['name_en' => 'Kolathur', 'name_ta' => 'கொளத்தூர்', 'district' => 'Chennai'],
            ['name_en' => 'Villivakkam', 'name_ta' => 'வில்லிவாக்கம்', 'district' => 'Chennai'],
            ['name_en' => 'Thiru-Vi-Ka-Nagar (SC)', 'name_ta' => 'திரு. வி. க. நகர் (தனி)', 'district' => 'Chennai'],
            ['name_en' => 'Egmore (SC)', 'name_ta' => 'எழும்பூர் (தனி)', 'district' => 'Chennai'],
            ['name_en' => 'Royapuram', 'name_ta' => 'இராயபுரம்', 'district' => 'Chennai'],
            ['name_en' => 'Harbour', 'name_ta' => 'துறைமுகம்', 'district' => 'Chennai'],
            ['name_en' => 'Chepauk-Thiruvallikeni', 'name_ta' => 'சேப்பாக்கம்-திருவல்லிக்கேணி', 'district' => 'Chennai'],
            ['name_en' => 'Thousand Lights', 'name_ta' => 'ஆயிரம் விளக்கு', 'district' => 'Chennai'],
            ['name_en' => 'Anna Nagar', 'name_ta' => 'அண்ணா நகர்', 'district' => 'Chennai'],
            ['name_en' => 'Virugambakkam', 'name_ta' => 'விருகம்பாக்கம்', 'district' => 'Chennai'],
            ['name_en' => 'Saidapet', 'name_ta' => 'சைதாப்பேட்டை', 'district' => 'Chennai'],
            ['name_en' => 'Thiyagaraya Nagar', 'name_ta' => 'தியாகராய நகர்', 'district' => 'Chennai'],
            ['name_en' => 'Mylapore', 'name_ta' => 'மயிலாப்பூர்', 'district' => 'Chennai'],
            ['name_en' => 'Velachery', 'name_ta' => 'வேளச்சேரி', 'district' => 'Chennai'],
            ['name_en' => 'Sholinganallur', 'name_ta' => 'சோழிங்கநல்லூர்', 'district' => 'Chennai'],
            ['name_en' => 'Alandur', 'name_ta' => 'ஆலந்தூர்', 'district' => 'Chennai'],

            // Kancheepuram
            ['name_en' => 'Sriperumbudur (SC)', 'name_ta' => 'ஸ்ரீபெரும்புதூர் (தனி)', 'district' => 'Kancheepuram'],
            ['name_en' => 'Uthiramerur', 'name_ta' => 'உத்திரமேரூர்', 'district' => 'Kancheepuram'],
            ['name_en' => 'Kancheepuram', 'name_ta' => 'காஞ்சிபுரம்', 'district' => 'Kancheepuram'],

            // Chengalpattu
            ['name_en' => 'Pallavaram', 'name_ta' => 'பல்லாவரம்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Tambaram', 'name_ta' => 'தாம்பரம்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Chengalpattu', 'name_ta' => 'செங்கல்பட்டு', 'district' => 'Chengalpattu'],
            ['name_en' => 'Thiruporur', 'name_ta' => 'திருப்போரூர்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Cheyyur (SC)', 'name_ta' => 'செய்யூர் (தனி)', 'district' => 'Chengalpattu'],
            ['name_en' => 'Madurantakam (SC)', 'name_ta' => 'மதுராந்தகம் (தனி)', 'district' => 'Chengalpattu'],

            // Ranipet
            ['name_en' => 'Arakkonam (SC)', 'name_ta' => 'அரக்கோணம் (தனி)', 'district' => 'Ranipet'],
            ['name_en' => 'Sholinghur', 'name_ta' => 'சோளிங்கர்', 'district' => 'Ranipet'],
            ['name_en' => 'Ranipet', 'name_ta' => 'ராணிப்பேட்டை', 'district' => 'Ranipet'],
            ['name_en' => 'Arcot', 'name_ta' => 'ஆற்காடு', 'district' => 'Ranipet'],

            // Vellore
            ['name_en' => 'Katpadi', 'name_ta' => 'காட்பாடி', 'district' => 'Vellore'],
            ['name_en' => 'Vellore', 'name_ta' => 'வேலூர்', 'district' => 'Vellore'],
            ['name_en' => 'Anaikattu', 'name_ta' => 'அணைக்கட்டு', 'district' => 'Vellore'],
            ['name_en' => 'Kilvaithinankuppam (SC)', 'name_ta' => 'கீழ்வைத்தியனாங்குப்பம் (தனி)', 'district' => 'Vellore'],
            ['name_en' => 'Gudiyattam (SC)', 'name_ta' => 'குடியாத்தம் (தனி)', 'district' => 'Vellore'],

            // Tirupathur
            ['name_en' => 'Vaniyambadi', 'name_ta' => 'வாணியம்பாடி', 'district' => 'Tirupathur'],
            ['name_en' => 'Ambur', 'name_ta' => 'ஆம்பூர்', 'district' => 'Tirupathur'],
            ['name_en' => 'Jolarpet', 'name_ta' => 'ஜோலார்பேட்டை', 'district' => 'Tirupathur'],
            ['name_en' => 'Tirupattur', 'name_ta' => 'திருப்பத்தூர்', 'district' => 'Tirupathur'],

            // Krishnagiri
            ['name_en' => 'Uthangarai (SC)', 'name_ta' => 'ஊத்தங்கரை (தனி)', 'district' => 'Krishnagiri'],
            ['name_en' => 'Bargur', 'name_ta' => 'பர்கூர்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Krishnagiri', 'name_ta' => 'கிருஷ்ணகிரி', 'district' => 'Krishnagiri'],
            ['name_en' => 'Veppanahalli', 'name_ta' => 'வேப்பனஹள்ளி', 'district' => 'Krishnagiri'],
            ['name_en' => 'Hosur', 'name_ta' => 'ஓசூர்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Thalli', 'name_ta' => 'தளி', 'district' => 'Krishnagiri'],

            // Dharmapuri
            ['name_en' => 'Palacode', 'name_ta' => 'பாலக்கோடு', 'district' => 'Dharmapuri'],
            ['name_en' => 'Pennagaram', 'name_ta' => 'பென்னாகரம்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Dharmapuri', 'name_ta' => 'தருமபுரி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Pappireddipatti', 'name_ta' => 'பாப்பிரெட்டிப்பட்டி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Harur (SC)', 'name_ta' => 'அரூர் (தனி)', 'district' => 'Dharmapuri'],

            // Tiruvannamalai
            ['name_en' => 'Chengam (SC)', 'name_ta' => 'செங்கம் (தனி)', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Tiruvannamalai', 'name_ta' => 'திருவண்ணாமலை', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Kilpennathur', 'name_ta' => 'கீழ்பென்னாத்தூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Kalasapakkam', 'name_ta' => 'கலசப்பாக்கம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Polur', 'name_ta' => 'போளூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Arani', 'name_ta' => 'ஆரணி', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Cheyyar', 'name_ta' => 'செய்யாறு', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Vandavasi (SC)', 'name_ta' => 'வந்தவாசி (தனி)', 'district' => 'Tiruvannamalai'],

            // Viluppuram
            ['name_en' => 'Gingee', 'name_ta' => 'செஞ்சி', 'district' => 'Viluppuram'],
            ['name_en' => 'Mailam', 'name_ta' => 'மயிலம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Tindivanam (SC)', 'name_ta' => 'திண்டிவனம் (தனி)', 'district' => 'Viluppuram'],
            ['name_en' => 'Vanur (SC)', 'name_ta' => 'வானூர் (தனி)', 'district' => 'Viluppuram'],
            ['name_en' => 'Villupuram', 'name_ta' => 'விழுப்புரம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Vikravandi', 'name_ta' => 'விக்கிரவாண்டி', 'district' => 'Viluppuram'],
            ['name_en' => 'Tirukkoyilur', 'name_ta' => 'திருக்கோயிலூர்', 'district' => 'Viluppuram'],

            // Kallakurichi
            ['name_en' => 'Ulundurpettai', 'name_ta' => 'உளுந்தூர்பேட்டை', 'district' => 'Kallakurichi'],
            ['name_en' => 'Rishivandiyam', 'name_ta' => 'ரிஷிவந்தியம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Sankarapuram', 'name_ta' => 'சங்கராபுரம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Kallakurichi (SC)', 'name_ta' => 'கள்ளக்குறிச்சி (தனி)', 'district' => 'Kallakurichi'],

            // Salem
            ['name_en' => 'Gangavalli (SC)', 'name_ta' => 'கெங்கவல்லி (தனி)', 'district' => 'Salem'],
            ['name_en' => 'Attur (SC)', 'name_ta' => 'ஆத்தூர் (தனி)', 'district' => 'Salem'],
            ['name_en' => 'Yercaud (ST)', 'name_ta' => 'ஏற்காடு (பழங்குடி)', 'district' => 'Salem'],
            ['name_en' => 'Omalur', 'name_ta' => 'ஓமலூர்', 'district' => 'Salem'],
            ['name_en' => 'Mettur', 'name_ta' => 'மேட்டூர்', 'district' => 'Salem'],
            ['name_en' => 'Edappadi', 'name_ta' => 'எடப்பாடி', 'district' => 'Salem'],
            ['name_en' => 'Sankari', 'name_ta' => 'சங்ககிரி', 'district' => 'Salem'],
            ['name_en' => 'Salem (West)', 'name_ta' => 'சேலம் (மேற்கு)', 'district' => 'Salem'],
            ['name_en' => 'Salem (North)', 'name_ta' => 'சேலம் (வடக்கு)', 'district' => 'Salem'],
            ['name_en' => 'Salem (South)', 'name_ta' => 'சேலம் (தெற்கு)', 'district' => 'Salem'],
            ['name_en' => 'Veerapandi', 'name_ta' => 'வீரபாண்டி', 'district' => 'Salem'],

            // Namakkal
            ['name_en' => 'Rasipuram (SC)', 'name_ta' => 'ராசிபுரம் (தனி)', 'district' => 'Namakkal'],
            ['name_en' => 'Senthamangalam (ST)', 'name_ta' => 'சேந்தமங்கலம் (பழங்குடி)', 'district' => 'Namakkal'],
            ['name_en' => 'Namakkal', 'name_ta' => 'நாமக்கல்', 'district' => 'Namakkal'],
            ['name_en' => 'Paramathi-Velur', 'name_ta' => 'பரமத்தி-வேலூர்', 'district' => 'Namakkal'],
            ['name_en' => 'Tiruchengodu', 'name_ta' => 'திருச்செங்கோடு', 'district' => 'Namakkal'],
            ['name_en' => 'Kumarapalayam', 'name_ta' => 'குமாரபாளையம்', 'district' => 'Namakkal'],

            // Erode
            ['name_en' => 'Erode (East)', 'name_ta' => 'ஈரோடு (கிழக்கு)', 'district' => 'Erode'],
            ['name_en' => 'Erode (West)', 'name_ta' => 'ஈரோடு (மேற்கு)', 'district' => 'Erode'],
            ['name_en' => 'Modakkurichi', 'name_ta' => 'மொடக்குறிச்சி', 'district' => 'Erode'],
            ['name_en' => 'Perundurai', 'name_ta' => 'பெருந்துறை', 'district' => 'Erode'],
            ['name_en' => 'Bhavani', 'name_ta' => 'பவானி', 'district' => 'Erode'],
            ['name_en' => 'Anthiyur', 'name_ta' => 'அந்தியூர்', 'district' => 'Erode'],
            ['name_en' => 'Gobichettipalayam', 'name_ta' => 'கோபிசெட்டிபாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Bhavanisagar (SC)', 'name_ta' => 'பவானிசாகர் (தனி)', 'district' => 'Erode'],

            // Tiruppur
            ['name_en' => 'Dharapuram (SC)', 'name_ta' => 'தாராபுரம் (தனி)', 'district' => 'Tiruppur'],
            ['name_en' => 'Kangayam', 'name_ta' => 'காங்கேயம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Avanashi (SC)', 'name_ta' => 'அவினாசி (தனி)', 'district' => 'Tiruppur'],
            ['name_en' => 'Tiruppur (North)', 'name_ta' => 'திருப்பூர் (வடக்கு)', 'district' => 'Tiruppur'],
            ['name_en' => 'Tiruppur (South)', 'name_ta' => 'திருப்பூர் (தெற்கு)', 'district' => 'Tiruppur'],
            ['name_en' => 'Palladam', 'name_ta' => 'பல்லடம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Udumalaipettai', 'name_ta' => 'உடுமலைப்பேட்டை', 'district' => 'Tiruppur'],
            ['name_en' => 'Madathukulam', 'name_ta' => 'மடத்துக்குளம்', 'district' => 'Tiruppur'],

            // Nilgiris
            ['name_en' => 'Udhagamandalam', 'name_ta' => 'உதகமண்டலம்', 'district' => 'Nilgiris'],
            ['name_en' => 'Gudalur (SC)', 'name_ta' => 'குன்னூர்', 'district' => 'Nilgiris'],
            ['name_en' => 'Coonoor', 'name_ta' => 'கூடலூர் (தனி)', 'district' => 'Nilgiris'],

            // Coimbatore
            ['name_en' => 'Mettupalayam', 'name_ta' => 'மேட்டுப்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Sulur', 'name_ta' => 'சூலூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Kavundampalayam', 'name_ta' => 'கவுண்டம்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Coimbatore (North)', 'name_ta' => 'கோயம்புத்தூர் (வடக்கு)', 'district' => 'Coimbatore'],
            ['name_en' => 'Thondamuthur', 'name_ta' => 'தொண்டாமுத்தூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Coimbatore (South)', 'name_ta' => 'கோயம்புத்தூர் (தெற்கு)', 'district' => 'Coimbatore'],
            ['name_en' => 'Singanallur', 'name_ta' => 'சிங்காநல்லூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Kinathukadavu', 'name_ta' => 'கிணத்துக்கடவு', 'district' => 'Coimbatore'],
            ['name_en' => 'Pollachi', 'name_ta' => 'பொள்ளாச்சி', 'district' => 'Coimbatore'],
            ['name_en' => 'Valparai (SC)', 'name_ta' => 'வால்பாறை (தனி)', 'district' => 'Coimbatore'],

            // Dindigul
            ['name_en' => 'Palani', 'name_ta' => 'பழனி', 'district' => 'Dindigul'],
            ['name_en' => 'Oddanchatram', 'name_ta' => 'ஒட்டன்சத்திரம்', 'district' => 'Dindigul'],
            ['name_en' => 'Athoor', 'name_ta' => 'ஆத்தூர்', 'district' => 'Dindigul'],
            ['name_en' => 'Nilakottai (SC)', 'name_ta' => 'நிலக்கோட்டை (தனி)', 'district' => 'Dindigul'],
            ['name_en' => 'Natham', 'name_ta' => 'நத்தம்', 'district' => 'Dindigul'],
            ['name_en' => 'Dindigul', 'name_ta' => 'திண்டுக்கல்', 'district' => 'Dindigul'],
            ['name_en' => 'Vedasandur', 'name_ta' => 'வேடசந்தூர்', 'district' => 'Dindigul'],

            // Karur
            ['name_en' => 'Aravakurichi', 'name_ta' => 'அரவக்குறிச்சி', 'district' => 'Karur'],
            ['name_en' => 'Karur', 'name_ta' => 'கரூர்', 'district' => 'Karur'],
            ['name_en' => 'Krishnarayapuram (SC)', 'name_ta' => 'கிருஷ்ணராயபுரம் (தனி)', 'district' => 'Karur'],
            ['name_en' => 'Kulithalai', 'name_ta' => 'குளித்தலை', 'district' => 'Karur'],

            // Tiruchirappalli
            ['name_en' => 'Manapparai', 'name_ta' => 'மணப்பாறை', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Srirangam', 'name_ta' => 'ஸ்ரீரங்கம்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Tiruchirappalli (West)', 'name_ta' => 'திருச்சிராப்பள்ளி (மேற்கு)', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Tiruchirappalli (East)', 'name_ta' => 'திருச்சிராப்பள்ளி (கிழக்கு)', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Thiruverumbur', 'name_ta' => 'திருவெறும்பூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Lalgudi', 'name_ta' => 'லால்குடி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Manachanallur', 'name_ta' => 'மணச்சநல்லூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Musiri', 'name_ta' => 'முசிறி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Thuraiyur (SC)', 'name_ta' => 'துறையூர் (தனி)', 'district' => 'Tiruchirappalli'],

            // Perambalur
            ['name_en' => 'Perambalur (SC)', 'name_ta' => 'பெரம்பலூர் (தனி)', 'district' => 'Perambalur'],
            ['name_en' => 'Kunnam', 'name_ta' => 'குன்னம்', 'district' => 'Perambalur'],

            // Ariyalur
            ['name_en' => 'Ariyalur', 'name_ta' => 'அரியலூர்', 'district' => 'Ariyalur'],
            ['name_en' => 'Jayankondam', 'name_ta' => 'ஜெயங்கொண்டம்', 'district' => 'Ariyalur'],

            // Cuddalore
            ['name_en' => 'Tittakudi (SC)', 'name_ta' => 'திட்டக்குடி (தனி)', 'district' => 'Cuddalore'],
            ['name_en' => 'Vridhachalam', 'name_ta' => 'விருத்தாச்சலம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Neyveli', 'name_ta' => 'நெய்வேலி', 'district' => 'Cuddalore'],
            ['name_en' => 'Panruti', 'name_ta' => 'பண்ருட்டி', 'district' => 'Cuddalore'],
            ['name_en' => 'Cuddalore', 'name_ta' => 'கடலூர்', 'district' => 'Cuddalore'],
            ['name_en' => 'Kurinjipadi', 'name_ta' => 'குறிஞ்சிப்பாடி', 'district' => 'Cuddalore'],
            ['name_en' => 'Bhuvanagiri', 'name_ta' => 'புவனகிரி', 'district' => 'Cuddalore'],
            ['name_en' => 'Chidambaram', 'name_ta' => 'சிதம்பரம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Kattumannarkoil (SC)', 'name_ta' => 'காட்டுமன்னார்கோயில் (தனி)', 'district' => 'Cuddalore'],

            // Nagapattinam
            ['name_en' => 'Nagapattinam', 'name_ta' => 'நாகப்பட்டினம்', 'district' => 'Nagapattinam'],
            ['name_en' => 'Kilvelur (SC)', 'name_ta' => 'கீழ்வேளூர் (தனி)', 'district' => 'Nagapattinam'],
            ['name_en' => 'Vedaranyam', 'name_ta' => 'வேதாரண்யம்', 'district' => 'Nagapattinam'],

            // Mayiladuthurai
            ['name_en' => 'Sirkazhi (SC)', 'name_ta' => 'சீர்காழி (தனி)', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Mayiladuthurai', 'name_ta' => 'மயிலாடுதுறை', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Poompuhar', 'name_ta' => 'பூம்புகார்', 'district' => 'Mayiladuthurai'],

            // Tiruvarur
            ['name_en' => 'Thiruthuraipoondi (SC)', 'name_ta' => 'திருத்துறைப்பூண்டி (தனி)', 'district' => 'Tiruvarur'],
            ['name_en' => 'Mannargudi', 'name_ta' => 'மன்னார்குடி', 'district' => 'Tiruvarur'],
            ['name_en' => 'Tiruvarur', 'name_ta' => 'திருவாரூர்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Nannilam', 'name_ta' => 'நன்னிலம்', 'district' => 'Tiruvarur'],

            // Thanjavur
            ['name_en' => 'Thiruvidaimarudur (SC)', 'name_ta' => 'திருவிடைமருதூர் (தனி)', 'district' => 'Thanjavur'],
            ['name_en' => 'Kumbakonam', 'name_ta' => 'கும்பகோணம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Papanasam', 'name_ta' => 'பாபநாசம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Thiruvaiyaru', 'name_ta' => 'திருவையாறு', 'district' => 'Thanjavur'],
            ['name_en' => 'Thanjavur', 'name_ta' => 'தஞ்சாவூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Orathanadu', 'name_ta' => 'ஒரத்தநாடு', 'district' => 'Thanjavur'],
            ['name_en' => 'Pattukkottai', 'name_ta' => 'பட்டுக்கோட்டை', 'district' => 'Thanjavur'],
            ['name_en' => 'Peravurani', 'name_ta' => 'பேராவூரணி', 'district' => 'Thanjavur'],

            // Pudukkottai
            ['name_en' => 'Gandarvakottai (SC)', 'name_ta' => 'கந்தர்வக்கோட்டை (தனி)', 'district' => 'Pudukkottai'],
            ['name_en' => 'Viralimalai', 'name_ta' => 'விராலிமலை', 'district' => 'Pudukkottai'],
            ['name_en' => 'Pudukkottai', 'name_ta' => 'புதுக்கோட்டை', 'district' => 'Pudukkottai'],
            ['name_en' => 'Thirumayam', 'name_ta' => 'திருமயம்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Alangudi', 'name_ta' => 'ஆலங்குடி', 'district' => 'Pudukkottai'],
            ['name_en' => 'Aranthangi', 'name_ta' => 'அறந்தாங்கி', 'district' => 'Pudukkottai'],

            // Sivaganga
            ['name_en' => 'Karaikudi', 'name_ta' => 'காரைக்குடி', 'district' => 'Sivaganga'],
            ['name_en' => 'Tiruppattur', 'name_ta' => 'திருப்பத்தூர்', 'district' => 'Sivaganga'],
            ['name_en' => 'Sivaganga', 'name_ta' => 'சிவகங்கை', 'district' => 'Sivaganga'],
            ['name_en' => 'Manamadurai (SC)', 'name_ta' => 'மானாமதுரை (தனி)', 'district' => 'Sivaganga'],

            // Madurai
            ['name_en' => 'Melur', 'name_ta' => 'மேலூர்', 'district' => 'Madurai'],
            ['name_en' => 'Madurai (East)', 'name_ta' => 'மதுரை (கிழக்கு)', 'district' => 'Madurai'],
            ['name_en' => 'Sholavandan (SC)', 'name_ta' => 'சோழவந்தான் (தனி)', 'district' => 'Madurai'],
            ['name_en' => 'Madurai (North)', 'name_ta' => 'மதுரை (வடக்கு)', 'district' => 'Madurai'],
            ['name_en' => 'Madurai (South)', 'name_ta' => 'மதுரை (தெற்கு)', 'district' => 'Madurai'],
            ['name_en' => 'Madurai (Central)', 'name_ta' => 'மதுரை (மத்தி)', 'district' => 'Madurai'],
            ['name_en' => 'Madurai (West)', 'name_ta' => 'மதுரை (மேற்கு)', 'district' => 'Madurai'],
            ['name_en' => 'Thiruparankundram', 'name_ta' => 'திருப்பரங்குன்றம்', 'district' => 'Madurai'],
            ['name_en' => 'Tirumangalam', 'name_ta' => 'திருமங்கலம்', 'district' => 'Madurai'],
            ['name_en' => 'Usilampatti', 'name_ta' => 'உசிலம்பட்டி', 'district' => 'Madurai'],

            // Theni
            ['name_en' => 'Andipatti', 'name_ta' => 'ஆண்டிபட்டி', 'district' => 'Theni'],
            ['name_en' => 'Periyakulam (SC)', 'name_ta' => 'பெரியகுளம் (தனி)', 'district' => 'Theni'],
            ['name_en' => 'Bodinayakanur', 'name_ta' => 'போடிநாயக்கனூர்', 'district' => 'Theni'],
            ['name_en' => 'Cumbum', 'name_ta' => 'கம்பம்', 'district' => 'Theni'],

            // Virudhunagar
            ['name_en' => 'Rajapalayam', 'name_ta' => 'ராஜபாளையம்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Srivilliputhur (SC)', 'name_ta' => 'ஸ்ரீவில்லிபுத்தூர் (தனி)', 'district' => 'Virudhunagar'],
            ['name_en' => 'Sattur', 'name_ta' => 'சாத்தூர்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Sivakasi', 'name_ta' => 'சிவகாசி', 'district' => 'Virudhunagar'],
            ['name_en' => 'Virudhunagar', 'name_ta' => 'விருதுநகர்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Aruppukkottai', 'name_ta' => 'அருப்புக்கோட்டை', 'district' => 'Virudhunagar'],
            ['name_en' => 'Tiruchuli', 'name_ta' => 'திருச்சுழி', 'district' => 'Virudhunagar'],

            // Ramanathapuram
            ['name_en' => 'Paramakudi (SC)', 'name_ta' => 'பரமக்குடி (தனி)', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Tiruvadanai', 'name_ta' => 'திருவாடானை', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Ramanathapuram', 'name_ta' => 'இராமநாதபுரம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Mudhukulathur', 'name_ta' => 'முதுகுளத்தூர்', 'district' => 'Ramanathapuram'],

            // Thoothukudi
            ['name_en' => 'Vilathikulam', 'name_ta' => 'விளாத்திகுளம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Thoothukudi', 'name_ta' => 'தூத்துக்குடி', 'district' => 'Thoothukudi'],
            ['name_en' => 'Tiruchendur', 'name_ta' => 'திருச்செந்தூர்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Srivaikuntam', 'name_ta' => 'ஸ்ரீவைகுண்டம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Ottapidaram (SC)', 'name_ta' => 'ஓட்டப்பிடாரம் (தனி)', 'district' => 'Thoothukudi'],
            ['name_en' => 'Kovilpatti', 'name_ta' => 'கோவில்பட்டி', 'district' => 'Thoothukudi'],

            // Tenkasi
            ['name_en' => 'Sankarankovil (SC)', 'name_ta' => 'சங்கரன்கோவில் (தனி)', 'district' => 'Tenkasi'],
            ['name_en' => 'Vasudevanallur (SC)', 'name_ta' => 'வாசுதேவநல்லூர் (தனி)', 'district' => 'Tenkasi'],
            ['name_en' => 'Kadayanallur', 'name_ta' => 'கடையநல்லூர்', 'district' => 'Tenkasi'],
            ['name_en' => 'Tenkasi', 'name_ta' => 'தென்காசி', 'district' => 'Tenkasi'],
            ['name_en' => 'Alangulam', 'name_ta' => 'ஆலங்குளம்', 'district' => 'Tenkasi'],

            // Tirunelveli
            ['name_en' => 'Tirunelveli', 'name_ta' => 'திருநெல்வேலி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Ambasamudram', 'name_ta' => 'அம்பாசமுத்திரம்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Palayamkottai', 'name_ta' => 'பாளையங்கோட்டை', 'district' => 'Tirunelveli'],
            ['name_en' => 'Nanguneri', 'name_ta' => 'நாங்குநேரி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Radhapuram', 'name_ta' => 'ராதாபுரம்', 'district' => 'Tirunelveli'],

            // Kanyakumari
            ['name_en' => 'Kanyakumari', 'name_ta' => 'கன்னியாகுமரி', 'district' => 'Kanyakumari'],
            ['name_en' => 'Nagercoil', 'name_ta' => 'நாகர்கோவில்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Colachel', 'name_ta' => 'குளச்சல்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Padmanabhapuram', 'name_ta' => 'பத்மநாபபுரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Vilavancode', 'name_ta' => 'விளவங்கோடு', 'district' => 'Kanyakumari'],
            ['name_en' => 'Killiyoor', 'name_ta' => 'கிள்ளியூர்', 'district' => 'Kanyakumari'],
        ];

        // --- Prepare data for insertion ---
        $dataToInsert = [];
        foreach ($assemblies as $assembly) {
            // Find the district_id from the map
            $districtId = $districtMap[$assembly['district']] ?? null;

            // Only add if district_id was found
            if ($districtId) {
                $dataToInsert[] = [
                    'district_id' => $districtId,
                    'name_en'     => $assembly['name_en'],
                    'name_ta'     => $assembly['name_ta'],
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ];
            } else {
                // Notify user if a district name was misspelled or missing
                $this->command->warn("Could not find district ID for: " . $assembly['district']);
            }
        }

        // Insert all data in a single query
        DB::table('assemblies')->insert($dataToInsert);
    }
}