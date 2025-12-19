<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BlockSeeder extends Seeder
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
        // This dynamically fetches your district IDs, so you don't need to hardcode them.
        // It assumes your 'districts' table is already seeded.
        
        $districtMap = DB::table('districts')->pluck('id', 'name_en')->all();

        // Failsafe in case districts table is empty
        if (empty($districtMap)) {
            $this->command->error('Districts table is empty. Please run DistrictSeeder first.');
            return;
        }

        $blocks = [
            // Ariyalur (6)
            ['name_en' => 'Andimadam', 'name_ta' => 'ஆண்டிமடம்', 'district' => 'Ariyalur'],
            ['name_en' => 'Ariyalur', 'name_ta' => 'அரியலூர்', 'district' => 'Ariyalur'],
            ['name_en' => 'Jayankondam', 'name_ta' => 'ஜெயங்கொண்டம்', 'district' => 'Ariyalur'],
            ['name_en' => 'Sendurai', 'name_ta' => 'செந்துறை', 'district' => 'Ariyalur'],
            ['name_en' => 'T.Palur', 'name_ta' => 'தா.பழூர்', 'district' => 'Ariyalur'],
            ['name_en' => 'Thirumanur', 'name_ta' => 'திருமானூர்', 'district' => 'Ariyalur'],

            // Chengalpattu (8)
            ['name_en' => 'Acharapakkam', 'name_ta' => 'அச்சிறுப்பாக்கம்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Chithamur', 'name_ta' => 'சித்தாமூர்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Kattankulathur', 'name_ta' => 'காட்டாங்கொளத்தூர்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Lathur', 'name_ta' => 'லத்தூர்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Madurantakam', 'name_ta' => 'மதுராந்தகம்', 'district' => 'Chengalpattu'],
            ['name_en' => 'St.Thomas Mount', 'name_ta' => 'பரங்கிமலை', 'district' => 'Chengalpattu'],
            ['name_en' => 'Thirukalukundram', 'name_ta' => 'திருக்கழுக்குன்றம்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Thiruporur', 'name_ta' => 'திருப்போரூர்', 'district' => 'Chengalpattu'],

            // Chennai (0) - No rural blocks

            // Coimbatore (12)
            ['name_en' => 'Anamalai', 'name_ta' => 'ஆனைமலை', 'district' => 'Coimbatore'],
            ['name_en' => 'Annur', 'name_ta' => 'அன்னூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Karamadai', 'name_ta' => 'காரமடை', 'district' => 'Coimbatore'],
            ['name_en' => 'Kinathukadavu', 'name_ta' => 'கிணத்துக்கடவு', 'district' => 'Coimbatore'],
            ['name_en' => 'Madukkarai', 'name_ta' => 'மதுக்கரை', 'district' => 'Coimbatore'],
            ['name_en' => 'Periyanaickenpalayam', 'name_ta' => 'பெரியநாயக்கன்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Pollachi (North)', 'name_ta' => 'பொள்ளாச்சி (வடக்கு)', 'district' => 'Coimbatore'],
            ['name_en' => 'Pollachi (South)', 'name_ta' => 'பொள்ளாச்சி (தெற்கு)', 'district' => 'Coimbatore'],
            ['name_en' => 'Sarkarsamakulam', 'name_ta' => 'சர்க்கார்சாமக்குளம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Sulthanpettai', 'name_ta' => 'சுல்தான்பேட்டை', 'district' => 'Coimbatore'],
            ['name_en' => 'Sulur', 'name_ta' => 'சூலூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Thondamuthur', 'name_ta' => 'தொண்டாமுத்தூர்', 'district' => 'Coimbatore'],

            // Cuddalore (14)
            ['name_en' => 'Annagramam', 'name_ta' => 'அண்ணாகிராமம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Bhuvanagiri', 'name_ta' => 'புவனகிரி', 'district' => 'Cuddalore'],
            ['name_en' => 'Cuddalore', 'name_ta' => 'கடலூர்', 'district' => 'Cuddalore'],
            ['name_en' => 'Kammapuram', 'name_ta' => 'கம்மாபுரம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Kattumannarkoil', 'name_ta' => 'காட்டுமன்னார்கோயில்', 'district' => 'Cuddalore'],
            ['name_en' => 'Keerapalayam', 'name_ta' => 'கீரப்பாளையம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Komaratchi', 'name_ta' => 'கொமராட்சி', 'district' => 'Cuddalore'],
            ['name_en' => 'Kurinjipadi', 'name_ta' => 'குறிஞ்சிப்பாடி', 'district' => 'Cuddalore'],
            ['name_en' => 'Mangalur', 'name_ta' => 'மங்களூர்', 'district' => 'Cuddalore'],
            ['name_en' => 'Melbhuvanagiri', 'name_ta' => 'மேல்புவனகிரி', 'district' => 'Cuddalore'],
            ['name_en' => 'Nallur', 'name_ta' => 'நல்லூர்', 'district' => 'Cuddalore'],
            ['name_en' => 'Panruti', 'name_ta' => 'பண்ருட்டி', 'district' => 'Cuddalore'],
            ['name_en' => 'Parangipettai', 'name_ta' => 'பரங்கிப்பேட்டை', 'district' => 'Cuddalore'],
            ['name_en' => 'Virudhachalam', 'name_ta' => 'விருத்தாசலம்', 'district' => 'Cuddalore'],

            // Dharmapuri (10)
            ['name_en' => 'Dharmapuri', 'name_ta' => 'தருமபுரி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Eriyur', 'name_ta' => 'எரியூர்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Harur', 'name_ta' => 'அரூர்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Kadathur', 'name_ta' => 'கடத்தூர்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Karimangalam', 'name_ta' => 'காரிமங்கலம்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Morappur', 'name_ta' => 'மொரப்பூர்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Nallampalli', 'name_ta' => 'நல்லம்பள்ளி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Palacode', 'name_ta' => 'பாலக்கோடு', 'district' => 'Dharmapuri'],
            ['name_en' => 'Pappireddipatti', 'name_ta' => 'பாப்பிரெட்டிப்பட்டி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Pennagaram', 'name_ta' => 'பென்னாகரம்', 'district' => 'Dharmapuri'],

            // Dindigul (14)
            ['name_en' => 'Athoor', 'name_ta' => 'ஆத்தூர்', 'district' => 'Dindigul'],
            ['name_en' => 'Batlagundu', 'name_ta' => 'வத்தலகுண்டு', 'district' => 'Dindigul'],
            ['name_en' => 'Dindigul', 'name_ta' => 'திண்டுக்கல்', 'district' => 'Dindigul'],
            ['name_en' => 'Guziliamparai', 'name_ta' => 'குஜிலியம்பாறை', 'district' => 'Dindigul'],
            ['name_en' => 'Kodaikanal', 'name_ta' => 'கொடைக்கானல்', 'district' => 'Dindigul'],
            ['name_en' => 'Natham', 'name_ta' => 'நத்தம்', 'district' => 'Dindigul'],
            ['name_en' => 'Nilakottai', 'name_ta' => 'நிலக்கோட்டை', 'district' => 'Dindigul'],
            ['name_en' => 'Oddanchatram', 'name_ta' => 'ஒட்டன்சத்திரம்', 'district' => 'Dindigul'],
            ['name_en' => 'Palani', 'name_ta' => 'பழனி', 'district' => 'Dindigul'],
            ['name_en' => 'Reddiarchatram', 'name_ta' => 'ரெட்டியார்சத்திரம்', 'district' => 'Dindigul'],
            ['name_en' => 'Sanarpatti', 'name_ta' => 'சாணார்பட்டி', 'district' => 'Dindigul'],
            ['name_en' => 'Thoppampatti', 'name_ta' => 'தொப்பம்பட்டி', 'district' => 'Dindigul'],
            ['name_en' => 'Vadamadurai', 'name_ta' => 'வடமதுரை', 'district' => 'Dindigul'],
            ['name_en' => 'Vedasandur', 'name_ta' => 'வேடசந்தூர்', 'district' => 'Dindigul'],

            // Erode (14)
            ['name_en' => 'Ammapet', 'name_ta' => ' அம்மாபேட்டை', 'district' => 'Erode'],
            ['name_en' => 'Anthiyur', 'name_ta' => 'அந்தியூர்', 'district' => 'Erode'],
            ['name_en' => 'Bhavani', 'name_ta' => 'பவானி', 'district' => 'Erode'],
            ['name_en' => 'Bhavanisagar', 'name_ta' => 'பவானிசாகர்', 'district' => 'Erode'],
            ['name_en' => 'Chennimalai', 'name_ta' => 'சென்னிமலை', 'district' => 'Erode'],
            ['name_en' => 'Erode', 'name_ta' => 'ஈரோடு', 'district' => 'Erode'],
            ['name_en' => 'Gobichettipalayam', 'name_ta' => 'கோபிசெட்டிபாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Kodumudi', 'name_ta' => 'கொடுமுடி', 'district' => 'Erode'],
            ['name_en' => 'Modakurichi', 'name_ta' => 'மொடக்குறிச்சி', 'district' => 'Erode'],
            ['name_en' => 'Nambiyur', 'name_ta' => 'நம்பியூர்', 'district' => 'Erode'],
            ['name_en' => 'Perundurai', 'name_ta' => 'பெருந்துறை', 'district' => 'Erode'],
            ['name_en' => 'Sathyamangalam', 'name_ta' => 'சத்தியமங்கலம்', 'district' => 'Erode'],
            ['name_en' => 'T.N.Palayam', 'name_ta' => 'டி.என்.பாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Thalavady', 'name_ta' => 'தளவாடி', 'district' => 'Erode'],

            // Kallakurichi (9)
            ['name_en' => 'Chinnasalem', 'name_ta' => 'சின்னசேலம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Kallakurichi', 'name_ta' => 'கள்ளக்குறிச்சி', 'district' => 'Kallakurichi'],
            ['name_en' => 'Kalrayan Hills', 'name_ta' => 'கல்வராயன்மலை', 'district' => 'Kallakurichi'],
            ['name_en' => 'Rishivandiyam', 'name_ta' => 'ரிஷிவந்தியம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Sankarapuram', 'name_ta' => 'சங்கராபுரம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Thirukoilur', 'name_ta' => 'திருக்கோயிலூர்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Thirunavalur', 'name_ta' => 'திருநாவலூர்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Thyagadurgam', 'name_ta' => 'தியாகதுர்கம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Ulundurpettai', 'name_ta' => 'உளுந்தூர்பேட்டை', 'district' => 'Kallakurichi'],

            // Kancheepuram (5)
            ['name_en' => 'Kancheepuram', 'name_ta' => 'காஞ்சிபுரம்', 'district' => 'Kancheepuram'],
            ['name_en' => 'Kundrathur', 'name_ta' => 'குன்றத்தூர்', 'district' => 'Kancheepuram'],
            ['name_en' => 'Sriperumbudur', 'name_ta' => 'ஸ்ரீபெரும்புதூர்', 'district' => 'Kancheepuram'],
            ['name_en' => 'Uthiramerur', 'name_ta' => 'உத்திரமேரூர்', 'district' => 'Kancheepuram'],
            ['name_en' => 'Walajabad', 'name_ta' => 'வாலாஜாபாத்', 'district' => 'Kancheepuram'],

            // Kanyakumari (9)
            ['name_en' => 'Agasteeswaram', 'name_ta' => 'அகஸ்தீஸ்வரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Killiyoor', 'name_ta' => 'கிள்ளியூர்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kurunthancode', 'name_ta' => 'குருந்தங்கோடு', 'district' => 'Kanyakumari'],
            ['name_en' => 'Melpuram', 'name_ta' => 'மேல்புறம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Munchirai', 'name_ta' => 'முஞ்சிறை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Rajakkamangalam', 'name_ta' => 'இராஜக்கமங்கலம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Thackalay', 'name_ta' => 'தக்கலை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Thiruvattar', 'name_ta' => 'திருவட்டார்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Thovalai', 'name_ta' => 'தோவாளை', 'district' => 'Kanyakumari'],

            // Karur (8)
            ['name_en' => 'Aravakurichi', 'name_ta' => 'அரவக்குறிச்சி', 'district' => 'Karur'],
            ['name_en' => 'K.Paramathy', 'name_ta' => 'க.பரமத்தி', 'district' => 'Karur'],
            ['name_en' => 'Kadavur', 'name_ta' => 'கடவூர்', 'district' => 'Karur'],
            ['name_en' => 'Karur', 'name_ta' => 'கரூர்', 'district' => 'Karur'],
            ['name_en' => 'Krishnarayapuram', 'name_ta' => 'கிருஷ்ணராயபுரம்', 'district' => 'Karur'],
            ['name_en' => 'Kulithalai', 'name_ta' => 'குளித்தலை', 'district' => 'Karur'],
            ['name_en' => 'Thanthoni', 'name_ta' => 'தாந்தோணி', 'district' => 'Karur'],
            ['name_en' => 'Thogamalai', 'name_ta' => 'தொகைமலை', 'district' => 'Karur'],

            // Krishnagiri (10)
            ['name_en' => 'Bargur', 'name_ta' => 'பர்கூர்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Hosur', 'name_ta' => 'ஓசூர்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Kaveripattinam', 'name_ta' => 'காவேரிப்பட்டணம்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Kelamangalam', 'name_ta' => 'கெலமங்கலம்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Krishnagiri', 'name_ta' => 'கிருஷ்ணகிரி', 'district' => 'Krishnagiri'],
            ['name_en' => 'Mathur', 'name_ta' => 'மத்தூர்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Shoolagiri', 'name_ta' => 'சூளகிரி', 'district' => 'Krishnagiri'],
            ['name_en' => 'Thally', 'name_ta' => 'தளி', 'district' => 'Krishnagiri'],
            ['name_en' => 'Uthangarai', 'name_ta' => 'ஊத்தங்கரை', 'district' => 'Krishnagiri'],
            ['name_en' => 'Veppanapalli', 'name_ta' => 'வேப்பனபள்ளி', 'district' => 'Krishnagiri'],

            // Madurai (13)
            ['name_en' => 'Alanganallur', 'name_ta' => 'அலங்காநல்லூர்', 'district' => 'Madurai'],
            ['name_en' => 'Chellampatti', 'name_ta' => 'செல்லம்பட்டி', 'district' => 'Madurai'],
            ['name_en' => 'Kalligudi', 'name_ta' => 'கள்ளிகுடி', 'district' => 'Madurai'],
            ['name_en' => 'Kottampatti', 'name_ta' => 'கொட்டாம்பட்டி', 'district' => 'Madurai'],
            ['name_en' => 'Madurai East', 'name_ta' => 'மதுரை கிழக்கு', 'district' => 'Madurai'],
            ['name_en' => 'Madurai West', 'name_ta' => 'மதுரை மேற்கு', 'district' => 'Madurai'],
            ['name_en' => 'Melur', 'name_ta' => 'மேலூர்', 'district' => 'Madurai'],
            ['name_en' => 'Sedapatti', 'name_ta' => 'சேடபட்டி', 'district' => 'Madurai'],
            ['name_en' => 'Sholavandan', 'name_ta' => 'சோழவந்தான்', 'district' => 'Madurai'],
            ['name_en' => 'T.Kallupatti', 'name_ta' => 'டி.கல்லுப்பட்டி', 'district' => 'Madurai'],
            ['name_en' => 'Thirumangalam', 'name_ta' => 'திருமங்கலம்', 'district' => 'Madurai'],
            ['name_en' => 'Thirupparankundram', 'name_ta' => 'திருப்பரங்குன்றம்', 'district' => 'Madurai'],
            ['name_en' => 'Usilampatti', 'name_ta' => 'உசிலம்பட்டி', 'district' => 'Madurai'],
            ['name_en' => 'Vadipatti', 'name_ta' => 'வாடிப்பட்டி', 'district' => 'Madurai'],

            // Mayiladuthurai (5)
            ['name_en' => 'Kollidam', 'name_ta' => 'கொள்ளிடம்', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Kuthalam', 'name_ta' => 'குத்தாலம்', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Mayiladuthurai', 'name_ta' => 'மயிலாடுதுறை', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Sembanarkoil', 'name_ta' => 'செம்பனார்கோயில்', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Sirkali', 'name_ta' => 'சீர்காழி', 'district' => 'Mayiladuthurai'],

            // Nagapattinam (6)
            ['name_en' => 'Keelaiyur', 'name_ta' => 'கீழையூர்', 'district' => 'Nagapattinam'],
            ['name_en' => 'Kilvelur', 'name_ta' => 'கீழ்வேளூர்', 'district' => 'Nagapattinam'],
            ['name_en' => 'Nagapattinam', 'name_ta' => 'நாகப்பட்டினம்', 'district' => 'Nagapattinam'],
            ['name_en' => 'Thalainayar', 'name_ta' => 'தலைஞாயிறு', 'district' => 'Nagapattinam'],
            ['name_en' => 'Thirumarugal', 'name_ta' => 'திருமருகல்', 'district' => 'Nagapattinam'],
            ['name_en' => 'Vedaranyam', 'name_ta' => 'வேதாரண்யம்', 'district' => 'Nagapattinam'],

            // Namakkal (15)
            ['name_en' => 'Elachipalayam', 'name_ta' => 'எலச்சிபாளையம்', 'district' => 'Namakkal'],
            ['name_en' => 'Erumapatti', 'name_ta' => 'எருமைப்பட்டி', 'district' => 'Namakkal'],
            ['name_en' => 'Kabilarmalai', 'name_ta' => 'கபிலர்மலை', 'district' => 'Namakkal'],
            ['name_en' => 'Kolli Hills', 'name_ta' => 'கொல்லிமலை', 'district' => 'Namakkal'],
            ['name_en' => 'Mallasamudram', 'name_ta' => 'மல்லசமுத்திரம்', 'district' => 'Namakkal'],
            ['name_en' => 'Mohanur', 'name_ta' => 'மோகனூர்', 'district' => 'Namakkal'],
            ['name_en' => 'Namagiripettai', 'name_ta' => 'நாமகிரிப்பேட்டை', 'district' => 'Namakkal'],
            ['name_en' => 'Namakkal', 'name_ta' => 'நாமக்கல்', 'district' => 'Namakkal'],
            ['name_en' => 'Pallipalayam', 'name_ta' => 'பள்ளிபாளையம்', 'district' => 'Namakkal'],
            ['name_en' => 'Paramathi', 'name_ta' => 'பரமத்தி', 'district' => 'Namakkal'],
            ['name_en' => 'Puduchatram', 'name_ta' => 'புதுசத்திரம்', 'district' => 'Namakkal'],
            ['name_en' => 'Rasipuram', 'name_ta' => 'இராசிபுரம்', 'district' => 'Namakkal'],
            ['name_en' => 'Sendamangalam', 'name_ta' => 'சேந்தமங்கலம்', 'district' => 'Namakkal'],
            ['name_en' => 'Tiruchengode', 'name_ta' => 'திருச்செங்கோடு', 'district' => 'Namakkal'],
            ['name_en' => 'Vennandur', 'name_ta' => 'வெண்ணந்தூர்', 'district' => 'Namakkal'],

            // Nilgiris (4)
            ['name_en' => 'Coonoor', 'name_ta' => 'குன்னூர்', 'district' => 'Nilgiris'],
            ['name_en' => 'Gudalur', 'name_ta' => 'கூடலூர்', 'district' => 'Nilgiris'],
            ['name_en' => 'Kotagiri', 'name_ta' => 'கோத்தகிரி', 'district' => 'Nilgiris'],
            ['name_en' => 'Udhagamandalam', 'name_ta' => 'உதகமண்டலம்', 'district' => 'Nilgiris'],

            // Perambalur (4)
            ['name_en' => 'Alathur', 'name_ta' => 'ஆலத்தூர்', 'district' => 'Perambalur'],
            ['name_en' => 'Perambalur', 'name_ta' => 'பெரம்பலூர்', 'district' => 'Perambalur'],
            ['name_en' => 'Veppanthattai', 'name_ta' => 'வேப்பந்தட்டை', 'district' => 'Perambalur'],
            ['name_en' => 'Veppur', 'name_ta' => 'வேப்பூர்', 'district' => 'Perambalur'],

            // Pudukkottai (13)
            ['name_en' => 'Annavasal', 'name_ta' => 'அன்னவாசல்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Aranthangi', 'name_ta' => 'அறந்தாங்கி', 'district' => 'Pudukkottai'],
            ['name_en' => 'Arimalam', 'name_ta' => 'அரிமளம்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Avudaiyarkoil', 'name_ta' => 'ஆவுடையார்கோயில்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Gandarvakottai', 'name_ta' => 'கந்தர்வக்கோட்டை', 'district' => 'Pudukkottai'],
            ['name_en' => 'Karambakkudi', 'name_ta' => 'கரம்பக்குடி', 'district' => 'Pudukkottai'],
            ['name_en' => 'Kunnandarkoil', 'name_ta' => 'குன்றாண்டார்கோயில்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Manamelkudi', 'name_ta' => 'மணமேல்குடி', 'district' => 'Pudukkottai'],
            ['name_en' => 'Ponnamaravathi', 'name_ta' => 'பொன்னமராவதி', 'district' => 'Pudukkottai'],
            ['name_en' => 'Pudukkottai', 'name_ta' => 'புதுக்கோட்டை', 'district' => 'Pudukkottai'],
            ['name_en' => 'Thiruvarankulam', 'name_ta' => 'திருவரங்குளம்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Thirumayam', 'name_ta' => 'திருமயம்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Viralimalai', 'name_ta' => 'விராலிமலை', 'district' => 'Pudukkottai'],

            // Ramanathapuram (11)
            ['name_en' => 'Bogalur', 'name_ta' => 'போகலூர்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Kadaladi', 'name_ta' => 'கடலாடி', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Kamuthi', 'name_ta' => 'கமுதி', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Mandapam', 'name_ta' => 'மண்டபம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Mudukulathur', 'name_ta' => 'முதுகுளத்தூர்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Nainarkoil', 'name_ta' => 'நயினார்கோயில்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Paramakudi', 'name_ta' => 'பரமக்குடி', 'district' => 'Ramanathapuram'],
            ['name_en' => 'R.S.Mangalam', 'name_ta' => 'ஆர்.எஸ்.மங்கலம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Ramanathapuram', 'name_ta' => 'இராமநாதபுரம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Thiruppullani', 'name_ta' => 'திருப்புல்லாணி', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Tiruvadanai', 'name_ta' => 'திருவாடானை', 'district' => 'Ramanathapuram'],

            // Ranipet (8)
            ['name_en' => 'Arakkonam', 'name_ta' => 'அரக்கோணம்', 'district' => 'Ranipet'],
            ['name_en' => 'Arcot', 'name_ta' => 'ஆற்காடு', 'district' => 'Ranipet'],
            ['name_en' => 'Kaveripakkam', 'name_ta' => 'காவேரிப்பாக்கம்', 'district' => 'Ranipet'],
            ['name_en' => 'Nemili', 'name_ta' => 'நெமிலி', 'district' => 'Ranipet'],
            ['name_en' => 'Sholinghur', 'name_ta' => 'சோளிங்கர்', 'district' => 'Ranipet'],
            ['name_en' => 'Thimiri', 'name_ta' => 'திமிரி', 'district' => 'Ranipet'],
            ['name_en' => 'Walajah', 'name_ta' => 'வாலாஜா', 'district' => 'Ranipet'],
            ['name_en' => 'Kalavai', 'name_ta' => 'கலவை', 'district' => 'Ranipet'],

            // Salem (20)
            ['name_en' => 'Attur', 'name_ta' => 'ஆத்தூர்', 'district' => 'Salem'],
            ['name_en' => 'Ayothiapattinam', 'name_ta' => 'அயோத்தியாபட்டணம்', 'district' => 'Salem'],
            ['name_en' => 'Edappadi', 'name_ta' => 'எடப்பாடி', 'district' => 'Salem'],
            ['name_en' => 'Gangavalli', 'name_ta' => 'கெங்கவல்லி', 'district' => 'Salem'],
            ['name_en' => 'Kadayampatti', 'name_ta' => 'காடையாம்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Kolathur', 'name_ta' => 'கொளத்தூர்', 'district' => 'Salem'],
            ['name_en' => 'Konganapuram', 'name_ta' => 'கொங்கணாபுரம்', 'district' => 'Salem'],
            ['name_en' => 'Mac.Donald Choultry', 'name_ta' => 'மகுடஞ்சாவடி', 'district' => 'Salem'],
            ['name_en' => 'Mettur', 'name_ta' => 'மேட்டூர்', 'district' => 'Salem'],
            ['name_en' => 'Nangavalli', 'name_ta' => 'நங்கவள்ளி', 'district' => 'Salem'],
            ['name_en' => 'Omalur', 'name_ta' => 'ஓமலூர்', 'district' => 'Salem'],
            ['name_en' => 'Panamarathupatti', 'name_ta' => 'பனமரத்துப்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Pethanaickenpalayam', 'name_ta' => 'பெத்தநாயக்கன்பாளையம்', 'district' => 'Salem'],
            ['name_en' => 'Salem', 'name_ta' => 'சேலம்', 'district' => 'Salem'],
            ['name_en' => 'Sankari', 'name_ta' => 'சங்ககிரி', 'district' => 'Salem'],
            ['name_en' => 'Thalaivasal', 'name_ta' => 'தலைவாசல்', 'district' => 'Salem'],
            ['name_en' => 'Tharamangalam', 'name_ta' => 'தாரமங்கலம்', 'district' => 'Salem'],
            ['name_en' => 'Valapady', 'name_ta' => 'வாழப்பாடி', 'district' => 'Salem'],
            ['name_en' => 'Veerapandi', 'name_ta' => 'வீரபாண்டி', 'district' => 'Salem'],
            ['name_en' => 'Yercaud', 'name_ta' => 'ஏற்காடு', 'district' => 'Salem'],

            // Sivaganga (12)
            ['name_en' => 'Devakottai', 'name_ta' => 'தேவகோட்டை', 'district' => 'Sivaganga'],
            ['name_en' => 'Ilayangudi', 'name_ta' => 'இளையான்குடி', 'district' => 'Sivaganga'],
            ['name_en' => 'Kalaiyarkoil', 'name_ta' => 'காளையார்கோயில்', 'district' => 'Sivaganga'],
            ['name_en' => 'Kallal', 'name_ta' => 'கல்லல்', 'district' => 'Sivaganga'],
            ['name_en' => 'Manamadurai', 'name_ta' => 'மானாமதுரை', 'district' => 'Sivaganga'],
            ['name_en' => 'S.Pudur', 'name_ta' => 'எஸ்.புதூர்', 'district' => 'Sivaganga'],
            ['name_en' => 'Sakottai', 'name_ta' => 'சாக்கோட்டை', 'district' => 'Sivaganga'],
            ['name_en' => 'Singampunari', 'name_ta' => 'சிங்கம்புணரி', 'district' => 'Sivaganga'],
            ['name_en' => 'Sivaganga', 'name_ta' => 'சிவகங்கை', 'district' => 'Sivaganga'],
            ['name_en' => 'Thiruppathur', 'name_ta' => 'திருப்பத்தூர்', 'district' => 'Sivaganga'],
            ['name_en' => 'Tiruppuvanam', 'name_ta' => 'திருப்புவனம்', 'district' => 'Sivaganga'],

            // Tenkasi (10)
            ['name_en' => 'Alangulam', 'name_ta' => 'ஆலங்குளம்', 'district' => 'Tenkasi'],
            ['name_en' => 'Kadayanallur', 'name_ta' => 'கடையநல்லூர்', 'district' => 'Tenkasi'],
            ['name_en' => 'Kadayam', 'name_ta' => 'கடையம்', 'district' => 'Tenkasi'],
            ['name_en' => 'Keelapavoor', 'name_ta' => 'கீழப்பாவூர்', 'district' => 'Tenkasi'],
            ['name_en' => 'Kuruvikulam', 'name_ta' => 'குருவிகுளம்', 'district' => 'Tenkasi'],
            ['name_en' => 'Melaneelithanallur', 'name_ta' => 'மேலநீலிதநல்லூர்', 'district' => 'Tenkasi'],
            ['name_en' => 'Sankarankoil', 'name_ta' => 'சங்கரன்கோவில்', 'district' => 'Tenkasi'],
            ['name_en' => 'Shenkottai', 'name_ta' => 'செங்கோட்டை', 'district' => 'Tenkasi'],
            ['name_en' => 'Tenkasi', 'name_ta' => 'தென்காசி', 'district' => 'Tenkasi'],
            ['name_en' => 'Vasudevanallur', 'name_ta' => 'வாசுதேவநல்லூர்', 'district' => 'Tenkasi'],

            // Thanjavur (14)
            ['name_en' => 'Ammapettai', 'name_ta' => 'அம்மாபேட்டை', 'district' => 'Thanjavur'],
            ['name_en' => 'Budalur', 'name_ta' => 'பூதலூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Kumbakonam', 'name_ta' => 'கும்பகோணம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Madukkur', 'name_ta' => 'மதுக்கூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Orathanadu', 'name_ta' => 'ஒரத்தநாடு', 'district' => 'Thanjavur'],
            ['name_en' => 'Papanasam', 'name_ta' => 'பாபநாசம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Pattukkottai', 'name_ta' => 'பட்டுக்கோட்டை', 'district' => 'Thanjavur'],
            ['name_en' => 'Peravurani', 'name_ta' => 'பேராவூரணி', 'district' => 'Thanjavur'],
            ['name_en' => 'Sethubhavachatram', 'name_ta' => 'சேதுபாவாசத்திரம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Thanjavur', 'name_ta' => 'தஞ்சாவூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Thiruppanandal', 'name_ta' => 'திருப்பனந்தாள்', 'district' => 'Thanjavur'],
            ['name_en' => 'Thiruvaiyaru', 'name_ta' => 'திருவையாறு', 'district' => 'Thanjavur'],
            ['name_en' => 'Thiruvidaimarudur', 'name_ta' => 'திருவிடைமருதூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Thiruvonam', 'name_ta' => 'திருவோணம்', 'district' => 'Thanjavur'],

            // Theni (8)
            ['name_en' => 'Andipatti', 'name_ta' => 'ஆண்டிபட்டி', 'district' => 'Theni'],
            ['name_en' => 'Bodinayakanur', 'name_ta' => 'போடிநாயக்கனூர்', 'district' => 'Theni'],
            ['name_en' => 'Chinnamanur', 'name_ta' => 'சின்னமனூர்', 'district' => 'Theni'],
            ['name_en' => 'Cumbum', 'name_ta' => 'கம்பம்', 'district' => 'Theni'],
            ['name_en' => 'Kadamalaigundu-Myladumparai', 'name_ta' => 'கடமலைக்குண்டு-மயிலாடும்பாறை', 'district' => 'Theni'],
            ['name_en' => 'Periyakulam', 'name_ta' => 'பெரியகுளம்', 'district' => 'Theni'],
            ['name_en' => 'Theni', 'name_ta' => 'தேனி', 'district' => 'Theni'],
            ['name_en' => 'Uthamapalayam', 'name_ta' => 'உத்தமபாளையம்', 'district' => 'Theni'],

            // Thoothukudi (12)
            ['name_en' => 'Alwarthirunagari', 'name_ta' => 'ஆழ்வார்திருநகரி', 'district' => 'Thoothukudi'],
            ['name_en' => 'Ettayapuram', 'name_ta' => 'எட்டயபுரம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Karunkulam', 'name_ta' => 'கருங்குளம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Kayathar', 'name_ta' => 'கயத்தாறு', 'district' => 'Thoothukudi'],
            ['name_en' => 'Kovilpatti', 'name_ta' => 'கோவில்பட்டி', 'district' => 'Thoothukudi'],
            ['name_en' => 'Ottapidaram', 'name_ta' => 'ஓட்டப்பிடாரம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Pudur', 'name_ta' => 'புதூர்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Sattankulam', 'name_ta' => 'சாத்தான்குளம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Srivaikuntam', 'name_ta' => 'ஸ்ரீவைகுண்டம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Thoothukudi', 'name_ta' => 'தூத்துக்குடி', 'district' => 'Thoothukudi'],
            ['name_en' => 'Tiruchendur', 'name_ta' => 'திருச்செந்தூர்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Vilathikulam', 'name_ta' => 'விளாத்திகுளம்', 'district' => 'Thoothukudi'],

            // Tiruchirappalli (14)
            ['name_en' => 'Andanallur', 'name_ta' => 'அந்தநல்லூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Lalgudi', 'name_ta' => 'லால்குடி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Manachanallur', 'name_ta' => 'மணச்சநல்லூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Manapparai', 'name_ta' => 'மணப்பாறை', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Manikandam', 'name_ta' => 'மணிகண்டம்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Marungapuri', 'name_ta' => 'மருங்காபுரி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Musiri', 'name_ta' => 'முசிறி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Pullambadi', 'name_ta' => 'புள்ளம்பாடி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Tattayyangarpettai', 'name_ta' => 'தாத்தையங்கார்பேட்டை', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Thiruverumbur', 'name_ta' => 'திருவெறும்பூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Thottiyam', 'name_ta' => 'தொட்டியம்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Thuraiyur', 'name_ta' => 'துறையூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Uppiliyapuram', 'name_ta' => 'உப்பிலியாபுரம்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Vaiyampatti', 'name_ta' => 'வையம்பட்டி', 'district' => 'Tiruchirappalli'],

            // Tirunelveli (9)
            ['name_en' => 'Ambasamudram', 'name_ta' => 'அம்பாசமுத்திரம்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Cheranmahadevi', 'name_ta' => 'சேரன்மகாதேவி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Kalakad', 'name_ta' => 'களக்காடு', 'district' => 'Tirunelveli'],
            ['name_en' => 'Manur', 'name_ta' => 'மானூர்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Nanguneri', 'name_ta' => 'நாங்குநேரி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Palayamkottai', 'name_ta' => 'பாளையங்கோட்டை', 'district' => 'Tirunelveli'],
            ['name_en' => 'Pappakudi', 'name_ta' => 'பாப்பாகுடி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Radhapuram', 'name_ta' => 'இராதாபுரம்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Valliyur', 'name_ta' => 'வள்ளியூர்', 'district' => 'Tirunelveli'],

            // Tirupathur (6)
            ['name_en' => 'Alangayam', 'name_ta' => 'ஆலங்காயம்', 'district' => 'Tirupathur'],
            ['name_en' => 'Jolarpettai', 'name_ta' => 'ஜோலார்பேட்டை', 'district' => 'Tirupathur'],
            ['name_en' => 'Kandhili', 'name_ta' => 'கந்திலி', 'district' => 'Tirupathur'],
            ['name_en' => 'Madhanur', 'name_ta' => 'மாதனூர்', 'district' => 'Tirupathur'],
            ['name_en' => 'Natrampalli', 'name_ta' => 'நாட்றம்பள்ளி', 'district' => 'Tirupathur'],
            ['name_en' => 'Tirupathur', 'name_ta' => 'திருப்பத்தூர்', 'district' => 'Tirupathur'],

            // Tiruppur (13)
            ['name_en' => 'Avanashi', 'name_ta' => 'அவினாசி', 'district' => 'Tiruppur'],
            ['name_en' => 'Dharapuram', 'name_ta' => 'தாராபுரம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Gudimangalam', 'name_ta' => 'குடிமங்கலம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Kangayam', 'name_ta' => 'காங்கேயம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Kundadam', 'name_ta' => 'குண்டடம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Madathukulam', 'name_ta' => 'மடத்துக்குளம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Mulanur', 'name_ta' => 'மூலனூர்', 'district' => 'Tiruppur'],
            ['name_en' => 'Palladam', 'name_ta' => 'பல்லடம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Pongalur', 'name_ta' => 'பொங்கலூர்', 'district' => 'Tiruppur'],
            ['name_en' => 'Tiruppur', 'name_ta' => 'திருப்பூர்', 'district' => 'Tiruppur'],
            ['name_en' => 'Udumalaipettai', 'name_ta' => 'உடுமலைப்பேட்டை', 'district' => 'Tiruppur'],
            ['name_en' => 'Uthukuli', 'name_ta' => 'ஊத்துக்குளி', 'district' => 'Tiruppur'],
            ['name_en' => 'Vellakoil', 'name_ta' => 'வெள்ளக்கோயில்', 'district' => 'Tiruppur'],

            // Tiruvallur (14)
            ['name_en' => 'Ellapuram', 'name_ta' => 'எல்லாபுரம்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Gummidipoondi', 'name_ta' => 'கும்மிடிப்பூண்டி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Kadambathur', 'name_ta' => 'கடம்பத்தூர்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Minjur', 'name_ta' => 'மீஞ்சூர்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Pallipattu', 'name_ta' => 'பள்ளிப்பட்டு', 'district' => 'Tiruvallur'],
            ['name_en' => 'Poonamallee', 'name_ta' => 'பூந்தமல்லி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Poondi', 'name_ta' => 'பூண்டி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Puzhal', 'name_ta' => 'புழல்', 'district' => 'Tiruvallur'],
            ['name_en' => 'R.K.Pet', 'name_ta' => 'ஆர்.கே.பேட்டை', 'district' => 'Tiruvallur'],
            ['name_en' => 'Sholavaram', 'name_ta' => 'சோழவரம்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Tiruttani', 'name_ta' => 'திருத்தணி', 'district' => 'Tiruvallur'],
            ['name_en' => 'Tiruvallur', 'name_ta' => 'திருவள்ளூர்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Tiruvalangadu', 'name_ta' => 'திருவாலங்காடு', 'district' => 'Tiruvallur'],
            ['name_en' => 'Villivakkam', 'name_ta' => 'வில்லிவாக்கம்', 'district' => 'Tiruvallur'],

            // Tiruvannamalai (18)
            ['name_en' => 'Anakkavur', 'name_ta' => 'அனக்காவூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Arani', 'name_ta' => 'ஆரணி', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Chengam', 'name_ta' => 'செங்கம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Chetpet', 'name_ta' => 'செட்பேட்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Cheyyar', 'name_ta' => 'செய்யாறு', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Jamunamarathur', 'name_ta' => 'ஜவ்வாது மலை', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Kalasapakkam', 'name_ta' => 'கலசப்பாக்கம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Keelpennathur', 'name_ta' => 'கீழ்பென்னாத்தூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Peranamallur', 'name_ta' => 'பெரணமல்லூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Polur', 'name_ta' => 'போளூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Pudupalayam', 'name_ta' => 'புதுப்பாளையம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Thandarampattu', 'name_ta' => 'தண்டராம்பட்டு', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Thellar', 'name_ta' => 'தெள்ளார்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Tiruvannamalai', 'name_ta' => 'திருவண்ணாமலை', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Thurinjapuram', 'name_ta' => 'துரிஞ்சாபுரம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Vandavasi', 'name_ta' => 'வந்தவாசி', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Vembakkam', 'name_ta' => 'வெம்பாக்கம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'West Arani', 'name_ta' => 'மேற்கு ஆரணி', 'district' => 'Tiruvannamalai'],

            // Tiruvarur (10)
            ['name_en' => 'Kodavasal', 'name_ta' => 'கொரடாச்சேரி', 'district' => 'Tiruvarur'],
            ['name_en' => 'Koothanallur', 'name_ta' => 'கூத்தாநல்லூர்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Kottur', 'name_ta' => 'கொட்டூர்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Mannargudi', 'name_ta' => 'மன்னார்குடி', 'district' => 'Tiruvarur'],
            ['name_en' => 'Muthupet', 'name_ta' => 'முத்துப்பேட்டை', 'district' => 'Tiruvarur'],
            ['name_en' => 'Nannilam', 'name_ta' => 'நன்னிலம்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Needamangalam', 'name_ta' => 'நீடாமங்கலம்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Thiruthuraipoondi', 'name_ta' => 'திருத்துறைப்பூண்டி', 'district' => 'Tiruvarur'],
            ['name_en' => 'Tiruvarur', 'name_ta' => 'திருவாரூர்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Valangaiman', 'name_ta' => 'வலங்கைமான்', 'district' => 'Tiruvarur'],

            // Vellore (6)
            ['name_en' => 'Anaicut', 'name_ta' => 'அணைக்கட்டு', 'district' => 'Vellore'],
            ['name_en' => 'Gudiyatham', 'name_ta' => 'குடியாத்தம்', 'district' => 'Vellore'],
            ['name_en' => 'K.V.Kuppam', 'name_ta' => 'கே.வி.குப்பம்', 'district' => 'Vellore'],
            ['name_en' => 'Katpadi', 'name_ta' => 'காட்பாடி', 'district' => 'Vellore'],
            ['name_en' => 'Pernambut', 'name_ta' => 'பேரணாம்பட்டு', 'district' => 'Vellore'],
            ['name_en' => 'Vellore', 'name_ta' => 'வேலூர்', 'district' => 'Vellore'],

            // Viluppuram (13)
            ['name_en' => 'Gingee', 'name_ta' => 'செஞ்சி', 'district' => 'Viluppuram'],
            ['name_en' => 'Kandamangalam', 'name_ta' => 'கண்டமங்கலம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Kanai', 'name_ta' => 'கானை', 'district' => 'Viluppuram'],
            ['name_en' => 'Koliyanur', 'name_ta' => 'கோலியனூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Marakkanam', 'name_ta' => 'மக்காணம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Melmalayanur', 'name_ta' => 'மேல்மலையனூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Mugaiyur', 'name_ta' => 'முகையூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Olakkur', 'name_ta' => 'ஒலக்கூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Tindivanam', 'name_ta' => 'திண்டிவனம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Tirukoilur', 'name_ta' => 'திருக்கோயிலூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Thiruvennainallur', 'name_ta' => 'திருவெண்ணெய்நல்லூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Vallam', 'name_ta' => 'வல்லம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Vanur', 'name_ta' => 'வானூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Vikravandi', 'name_ta' => 'விக்கிரவாண்டி', 'district' => 'Viluppuram'],

            // Virudhunagar (11)
            ['name_en' => 'Aruppukkottai', 'name_ta' => 'அருப்புக்கோட்டை', 'district' => 'Virudhunagar'],
            ['name_en' => 'Kariapatti', 'name_ta' => 'காரியாபட்டி', 'district' => 'Virudhunagar'],
            ['name_en' => 'Narikudi', 'name_ta' => 'நரிக்குடி', 'district' => 'Virudhunagar'],
            ['name_en' => 'Rajapalayam', 'name_ta' => 'ராஜபாளையம்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Sattur', 'name_ta' => 'சாத்தூர்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Sivakasi', 'name_ta' => 'சிவகாசி', 'district' => 'Virudhunagar'],
            ['name_en' => 'Srivilliputhur', 'name_ta' => 'ஸ்ரீவில்லிபுத்தூர்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Tiruchuli', 'name_ta' => 'திருச்சுழி', 'district' => 'Virudhunagar'],
            ['name_en' => 'Vembakottai', 'name_ta' => 'வெம்பக்கோட்டை', 'district' => 'Virudhunagar'],
            ['name_en' => 'Virudhunagar', 'name_ta' => 'விருதுநகர்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Watrap', 'name_ta' => 'வத்திராயிருப்பு', 'district' => 'Virudhunagar'],
        ];

        // --- Prepare data for insertion ---
        $dataToInsert = [];
        foreach ($blocks as $block) {
            // Find the district_id from the map
            $districtId = $districtMap[$block['district']] ?? null;

            // Only add if district_id was found
            if ($districtId) {
                $dataToInsert[] = [
                    'district_id' => $districtId,
                    'name_en'     => $block['name_en'],
                    'name_ta'     => $block['name_ta'],
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ];
            } else {
                // Notify user if a district name was misspelled or missing
                $this->command->warn("Could not find district ID for district: " . $block['district']);
            }
        }
        
        // Clear the table before seeding
        DB::table('blocks')->delete();

        // Insert all data in chunks for better performance
        foreach (array_chunk($dataToInsert, 100) as $chunk) {
            DB::table('blocks')->insert($chunk);
        }
    }
}