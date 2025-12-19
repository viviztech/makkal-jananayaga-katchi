<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PerurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $targetTable = 'perurs'; // <-- Changed table name

        // --- District Name to ID Mapping ---
        $districtMap = DB::table('districts')->pluck('id', 'name_en')->all();

        // Failsafe in case districts table is empty
        if (empty($districtMap)) {
            $this->command->error('Districts table is empty. Please run DistrictSeeder first.');
            return;
        }

        $perurs = [ // <-- Renamed variable for clarity
            // Ariyalur (2)
            ['name_en' => 'Udayarpalayam', 'name_ta' => 'உடையார்பாளையம்', 'district' => 'Ariyalur'],
            ['name_en' => 'Varadarajanpettai', 'name_ta' => 'வரதராஜன்பேட்டை', 'district' => 'Ariyalur'],

            // Chengalpattu (6)
            ['name_en' => 'Acharapakkam', 'name_ta' => 'அச்சரப்பாக்கம்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Edaikazhinadu', 'name_ta' => 'இடைக்கழிநாடு', 'district' => 'Chengalpattu'],
            ['name_en' => 'Karunguzhi', 'name_ta' => 'கருங்குழி', 'district' => 'Chengalpattu'],
            ['name_en' => 'Mamallapuram', 'name_ta' => 'மாமல்லபுரம்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Thiruporur', 'name_ta' => 'திருப்போரூர்', 'district' => 'Chengalpattu'],
            ['name_en' => 'Tirukalukundram', 'name_ta' => 'திருக்கழுகுன்றம்', 'district' => 'Chengalpattu'],

            // Chennai (0) - No Town Panchayats

            // Coimbatore (33)
            ['name_en' => 'Alanthurai', 'name_ta' => 'ஆலந்துறை', 'district' => 'Coimbatore'],
            ['name_en' => 'Anaimalai', 'name_ta' => 'ஆனைமலை', 'district' => 'Coimbatore'],
            ['name_en' => 'Annur', 'name_ta' => 'அன்னூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Ashokapuram', 'name_ta' => 'அசோகபுரம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Chettipalayam', 'name_ta' => 'செட்டிபாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Chinnampalayam', 'name_ta' => 'சின்னம்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Dhaliyur', 'name_ta' => 'தாளியூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Ettimadai', 'name_ta' => 'எட்டிமடை', 'district' => 'Coimbatore'],
            ['name_en' => 'Gudalur (Coimbatore)', 'name_ta' => 'கூடலூர் (கோயம்புத்தூர்)', 'district' => 'Coimbatore'],
            ['name_en' => 'Idikarai', 'name_ta' => 'இடிகரை', 'district' => 'Coimbatore'],
            ['name_en' => 'Irugur', 'name_ta' => 'இருக்கூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Jamnapudur', 'name_ta' => 'ஜமீன் ஊத்துக்குளி', 'district' => 'Coimbatore'],
            ['name_en' => 'Kaniyur', 'name_ta' => 'கனியூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Kannampalayam', 'name_ta' => 'கண்ணம்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Karamadai', 'name_ta' => 'காரமடை', 'district' => 'Coimbatore'],
            ['name_en' => 'Kottur', 'name_ta' => 'கோட்டூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Madukkarai', 'name_ta' => 'மதுக்கரை', 'district' => 'Coimbatore'],
            ['name_en' => 'Mopperipalayam', 'name_ta' => 'மோப்பேரிபாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Narasimhanaickenpalayam', 'name_ta' => 'நரசிம்மநாயக்கன்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Othakalmandapam', 'name_ta' => 'ஒத்தக்கால்மண்டபம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Pallapalayam', 'name_ta' => 'பள்ளபாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Periyanaickenpalayam', 'name_ta' => 'பெரியநாயக்கன்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Perur', 'name_ta' => 'பேரூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Pooluvapatti', 'name_ta' => 'பூலுவப்பட்டி', 'district' => 'Coimbatore'],
            ['name_en' => 'Sarcarsamakulam', 'name_ta' => 'சர்க்கார்சாமக்குளம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Sirumugai', 'name_ta' => 'சிறுமுகை', 'district' => 'Coimbatore'],
            ['name_en' => 'Sulur', 'name_ta' => 'சூலூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Thenkarai', 'name_ta' => 'தென்கரை', 'district' => 'Coimbatore'],
            ['name_en' => 'Thirumalayampalayam', 'name_ta' => 'திருமலையாம்பாளையம்', 'district' => 'Coimbatore'],
            ['name_en' => 'Vadavalli', 'name_ta' => 'வடவள்ளி', 'district' => 'Coimbatore'],
            ['name_en' => 'Vedapatti', 'name_ta' => 'வேடப்பட்டி', 'district' => 'Coimbatore'],
            ['name_en' => 'Vellalur', 'name_ta' => 'வெள்ளலூர்', 'district' => 'Coimbatore'],
            ['name_en' => 'Veerappandi (Coimbatore)', 'name_ta' => 'வீரபாண்டி (கோயம்புத்தூர்)', 'district' => 'Coimbatore'],

            // Cuddalore (16)
            ['name_en' => 'Annamalainagar', 'name_ta' => 'அண்ணாமலை நகர்', 'district' => 'Cuddalore'],
            ['name_en' => 'Bhuvanagiri', 'name_ta' => 'புவனகிரி', 'district' => 'Cuddalore'],
            ['name_en' => 'Gangaikondan', 'name_ta' => 'கங்கைகொண்டான்', 'district' => 'Cuddalore'],
            ['name_en' => 'Kattumannarkoil', 'name_ta' => 'காட்டுமன்னார்கோயில்', 'district' => 'Cuddalore'],
            ['name_en' => 'Killai', 'name_ta' => 'கிள்ளை', 'district' => 'Cuddalore'],
            ['name_en' => 'Kurinjipadi', 'name_ta' => 'குறிஞ்சிப்பாடி', 'district' => 'Cuddalore'],
            ['name_en' => 'Lalpet', 'name_ta' => 'லால்பேட்டை', 'district' => 'Cuddalore'],
            ['name_en' => 'Mangalampet', 'name_ta' => 'மங்களம்பேட்டை', 'district' => 'Cuddalore'],
            ['name_en' => 'Melpattampakkam', 'name_ta' => 'மேல்பட்டாம்பாக்கம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Parangipettai', 'name_ta' => 'பரங்கிப்பேட்டை', 'district' => 'Cuddalore'],
            ['name_en' => 'Pennadam', 'name_ta' => 'பெண்ணாடம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Sethiyathope', 'name_ta' => 'சேத்தியாத்தோப்பு', 'district' => 'Cuddalore'],
            ['name_en' => 'Srimushnam', 'name_ta' => 'ஸ்ரீமுஷ்ணம்', 'district' => 'Cuddalore'],
            ['name_en' => 'Thittagudi', 'name_ta' => 'திட்டக்குடி', 'district' => 'Cuddalore'],
            ['name_en' => 'Thorapadi', 'name_ta' => 'தொரப்பாடி', 'district' => 'Cuddalore'],
            ['name_en' => 'Vadalur', 'name_ta' => 'வடலூர்', 'district' => 'Cuddalore'],

            // Dharmapuri (10)
            ['name_en' => 'Arur', 'name_ta' => 'அரூர்', 'district' => 'Dharmapuri'],
            ['name_en' => 'B. Mallapuram', 'name_ta' => 'பி. மல்லாபுரம்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Kadathur', 'name_ta' => 'கடத்தூர்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Kambainallur', 'name_ta' => 'கம்பைநல்லூர்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Karimangalam', 'name_ta' => 'காரிமங்கலம்', 'district' => 'Dharmapuri'],
            ['name_en' => 'Marandahalli', 'name_ta' => 'மாரண்டஹள்ளி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Palakkodu', 'name_ta' => 'பாலக்கோடு', 'district' => 'Dharmapuri'],
            ['name_en' => 'Papparapatti', 'name_ta' => 'பாப்பாரப்பட்டி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Pappireddipatti', 'name_ta' => 'பாப்பிரெட்டிப்பட்டி', 'district' => 'Dharmapuri'],
            ['name_en' => 'Pennagaram', 'name_ta' => 'பென்னாகரம்', 'district' => 'Dharmapuri'],

             // Dindigul (23)
            ['name_en' => 'Agaram', 'name_ta' => 'அகரம்', 'district' => 'Dindigul'],
            ['name_en' => 'Ammainaickanur', 'name_ta' => 'அம்மையநாயக்கனூர்', 'district' => 'Dindigul'],
            ['name_en' => 'Ayakudi', 'name_ta' => 'ஆயக்குடி', 'district' => 'Dindigul'],
            ['name_en' => 'Ayyalur', 'name_ta' => 'அய்யலூர்', 'district' => 'Dindigul'],
            ['name_en' => 'Ayyampalayam', 'name_ta' => 'அய்யம்பாளையம்', 'district' => 'Dindigul'],
            ['name_en' => 'Balasamudram', 'name_ta' => 'பாலசமுத்திரம்', 'district' => 'Dindigul'],
            ['name_en' => 'Batlagundu', 'name_ta' => 'வத்தலகுண்டு', 'district' => 'Dindigul'],
            ['name_en' => 'Chinnalapatti', 'name_ta' => 'சின்னாளப்பட்டி', 'district' => 'Dindigul'],
            ['name_en' => 'Eriodu', 'name_ta' => 'எரியோடு', 'district' => 'Dindigul'],
            ['name_en' => 'Kannivadi (Dindigul)', 'name_ta' => 'கன்னிவாடி (திண்டுக்கல்)', 'district' => 'Dindigul'],
            ['name_en' => 'Keeranur (Dindigul)', 'name_ta' => 'கீரனூர் (திண்டுக்கல்)', 'district' => 'Dindigul'],
            ['name_en' => 'Natham', 'name_ta' => 'நத்தம்', 'district' => 'Dindigul'],
            ['name_en' => 'Neikkarapatti', 'name_ta' => 'நெய்க்காரப்பட்டி', 'district' => 'Dindigul'],
            ['name_en' => 'Nilakottai', 'name_ta' => 'நிலக்கோட்டை', 'district' => 'Dindigul'],
            ['name_en' => 'Palayam', 'name_ta' => 'பாளையம்', 'district' => 'Dindigul'],
            ['name_en' => 'Pannaikadu', 'name_ta' => 'பண்ணைக்காடு', 'district' => 'Dindigul'],
            ['name_en' => 'Pattiveeranpatti', 'name_ta' => 'பட்டிவீரன்பட்டி', 'district' => 'Dindigul'],
            ['name_en' => 'Sevugampatti', 'name_ta' => 'செவல்பட்டி', 'district' => 'Dindigul'],
            ['name_en' => 'Sithayankottai', 'name_ta' => 'சித்தையன்கோட்டை', 'district' => 'Dindigul'],
            ['name_en' => 'Sriramapuram', 'name_ta' => 'ஸ்ரீராமபுரம்', 'district' => 'Dindigul'],
            ['name_en' => 'Thadikombu', 'name_ta' => 'தாடிக்கொம்பு', 'district' => 'Dindigul'],
            ['name_en' => 'Vadamadurai', 'name_ta' => 'வடமதுரை', 'district' => 'Dindigul'],
            ['name_en' => 'Vedasandur', 'name_ta' => 'வேடசந்தூர்', 'district' => 'Dindigul'],

             // Erode (42)
            ['name_en' => 'Alampalayam (Erode)', 'name_ta' => 'ஆலம்பாளையம் (ஈரோடு)', 'district' => 'Erode'],
            ['name_en' => 'Anthiyur', 'name_ta' => 'அந்தியூர்', 'district' => 'Erode'],
            ['name_en' => 'Appakudal', 'name_ta' => 'ஆப்பக்கூடல்', 'district' => 'Erode'],
            ['name_en' => 'Arachalur', 'name_ta' => 'அரச்சலூர்', 'district' => 'Erode'],
            ['name_en' => 'Athani', 'name_ta' => 'ஆதணி', 'district' => 'Erode'],
            ['name_en' => 'Avalpoondurai', 'name_ta' => 'அவல்பூந்துறை', 'district' => 'Erode'],
            ['name_en' => 'Bhavani', 'name_ta' => 'பவானி', 'district' => 'Erode'],
            ['name_en' => 'Bhavanisagar', 'name_ta' => 'பவானிசாகர்', 'district' => 'Erode'],
            ['name_en' => 'Chennasamudram', 'name_ta' => 'சென்னசமுத்திரம்', 'district' => 'Erode'],
            ['name_en' => 'Chennimalai', 'name_ta' => 'சென்னிமலை', 'district' => 'Erode'],
            ['name_en' => 'Chithode', 'name_ta' => 'சித்தோடு', 'district' => 'Erode'],
            ['name_en' => 'Elathur', 'name_ta' => 'இளத்தூர்', 'district' => 'Erode'],
            ['name_en' => 'Jambai', 'name_ta' => 'ஜம்பை', 'district' => 'Erode'],
            ['name_en' => 'Kanjikoil', 'name_ta' => 'காஞ்சிக்கோயில்', 'district' => 'Erode'],
            ['name_en' => 'Karumandi Chellipalayam', 'name_ta' => 'கருமாண்டி செல்லிபாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Kasipalayam (Erode)', 'name_ta' => 'காசிபாளையம் (ஈரோடு)', 'district' => 'Erode'],
            ['name_en' => 'Kembainaickenpalayam', 'name_ta' => 'கெம்பநாயக்கன்பாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Kilampadi', 'name_ta' => 'கிளம்பாடி', 'district' => 'Erode'],
            ['name_en' => 'Kodumudi', 'name_ta' => 'கொடுமுடி', 'district' => 'Erode'],
            ['name_en' => 'Kolappalur', 'name_ta' => 'கொளப்பலூர்', 'district' => 'Erode'],
            ['name_en' => 'Kollankoil', 'name_ta' => 'கொள்ளாங்கோயில்', 'district' => 'Erode'],
            ['name_en' => 'Lakkampatti', 'name_ta' => 'லக்கம்பட்டி', 'district' => 'Erode'],
            ['name_en' => 'Modakurichi', 'name_ta' => 'மொடக்குறிச்சி', 'district' => 'Erode'],
            ['name_en' => 'Nallampatti', 'name_ta' => 'நல்லாம்பட்டி', 'district' => 'Erode'],
            ['name_en' => 'Nambiyur', 'name_ta' => 'நம்பியூர்', 'district' => 'Erode'],
            ['name_en' => 'Nasiyanur', 'name_ta' => 'நசியனூர்', 'district' => 'Erode'],
            ['name_en' => 'Nerinjipettai', 'name_ta' => 'நெருஞ்சிப்பேட்டை', 'district' => 'Erode'],
            ['name_en' => 'Olagaadam', 'name_ta' => 'ஒலகடம்', 'district' => 'Erode'],
            ['name_en' => 'P. Mettupalayam', 'name_ta' => 'பி. மேட்டுப்பாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Pallapalayam (Erode)', 'name_ta' => 'பள்ளபாளையம் (ஈரோடு)', 'district' => 'Erode'],
            ['name_en' => 'Pasur', 'name_ta' => 'பாசூர்', 'district' => 'Erode'],
            ['name_en' => 'Periyakodiveri', 'name_ta' => 'பெரியகொடிவேரி', 'district' => 'Erode'],
            ['name_en' => 'Perundurai', 'name_ta' => 'பெருந்துறை', 'district' => 'Erode'],
            ['name_en' => 'Pethampalayam', 'name_ta' => 'பெத்தம்பாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Salangapalayam', 'name_ta' => 'சலங்கபாளையம்', 'district' => 'Erode'],
            ['name_en' => 'Sathyamangalam', 'name_ta' => 'சத்தியமங்கலம்', 'district' => 'Erode'],
            ['name_en' => 'Sivagiri (Erode)', 'name_ta' => 'சிவகிரி (ஈரோடு)', 'district' => 'Erode'],
            ['name_en' => 'Unjalaur', 'name_ta' => 'ஊஞ்சலூர்', 'district' => 'Erode'],
            ['name_en' => 'Vadugapatti', 'name_ta' => 'வடுகப்பட்டி', 'district' => 'Erode'],
            ['name_en' => 'Vaniputhur', 'name_ta' => 'வாணிப்புதூர்', 'district' => 'Erode'],
            ['name_en' => 'Veerappanchatram', 'name_ta' => 'வீரப்பன்சத்திரம்', 'district' => 'Erode'],
            ['name_en' => 'Vellottamparappu', 'name_ta' => 'வெள்ளோட்டம்பரப்பு', 'district' => 'Erode'],

             // Kallakurichi (5)
            ['name_en' => 'Chinnasalem', 'name_ta' => 'சின்னசேலம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Manalurpet', 'name_ta' => 'மணலூர்ப்பேட்டை', 'district' => 'Kallakurichi'],
            ['name_en' => 'Sankarapuram', 'name_ta' => 'சங்கராபுரம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Thiagadurgam', 'name_ta' => 'தியாகதுர்கம்', 'district' => 'Kallakurichi'],
            ['name_en' => 'Vadakkanandal', 'name_ta' => 'வடக்காநந்தல்', 'district' => 'Kallakurichi'],
            //['name_en' => 'Ulundurpettai', 'name_ta' => 'உளுந்தூர்பேட்டை', 'district' => 'Kallakurichi'], // Upgraded to Municipality

             // Kancheepuram (2)
            ['name_en' => 'Uthiramerur', 'name_ta' => 'உத்திரமேரூர்', 'district' => 'Kancheepuram'],
            ['name_en' => 'Walajabad', 'name_ta' => 'வாலாஜாபாத்', 'district' => 'Kancheepuram'],

             // Kanyakumari (51)
            ['name_en' => 'Alagappapuram', 'name_ta' => 'அழகப்பபுரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Anjugramam', 'name_ta' => 'அஞ்சுகிராமம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Aralvaimozhi', 'name_ta' => 'ஆரல்வாய்மொழி', 'district' => 'Kanyakumari'],
            ['name_en' => 'Arumanai', 'name_ta' => 'அருமனை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Athur (Kanyakumari)', 'name_ta' => 'ஆத்தூர் (கன்னியாகுமரி)', 'district' => 'Kanyakumari'],
            ['name_en' => 'Azhagiapandipuram', 'name_ta' => 'அழகியபாண்டியபுரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Boothapandi', 'name_ta' => 'பூதப்பாண்டி', 'district' => 'Kanyakumari'],
            ['name_en' => 'Edaikodu', 'name_ta' => 'எடைக்கோடு', 'district' => 'Kanyakumari'],
            ['name_en' => 'Eraniel', 'name_ta' => 'இறணியல்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Ganapathipuram', 'name_ta' => 'கணபதிபுரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kadaiyal', 'name_ta' => 'கடையல்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kaliyakkavilai', 'name_ta' => 'களியக்காவிளை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kanyakumari', 'name_ta' => 'கன்னியாகுமரி', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kappiyarai', 'name_ta' => 'காப்பியாறை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Karungal', 'name_ta' => 'கருங்கல்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Killiyur', 'name_ta' => 'கிள்ளியூர்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kollankodu', 'name_ta' => 'கொள்ளங்கோடு', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kothanallur', 'name_ta' => 'கோதநல்லூர்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kottaram', 'name_ta' => 'கொட்டாரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kulasekaram', 'name_ta' => 'குலசேகரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Kumarapuram', 'name_ta' => 'குமாரபுரம்', 'district' => 'Kanyakumari'],
            //['name_en' => 'Kuzhithurai', 'name_ta' => 'குழித்துறை', 'district' => 'Kanyakumari'], // Upgraded to Municipality
            ['name_en' => 'Manavalakurichi', 'name_ta' => 'மணவாளக்குறிச்சி', 'district' => 'Kanyakumari'],
            ['name_en' => 'Mandaikadu', 'name_ta' => 'மண்டைக்காடு', 'district' => 'Kanyakumari'],
            ['name_en' => 'Mulagumudu', 'name_ta' => 'முளகுமூடு', 'district' => 'Kanyakumari'],
            ['name_en' => 'Myladi', 'name_ta' => 'மயிலாடி', 'district' => 'Kanyakumari'],
            ['name_en' => 'Nallur (Kanyakumari)', 'name_ta' => 'நல்லூர் (கன்னியாகுமரி)', 'district' => 'Kanyakumari'],
            ['name_en' => 'Neyyur', 'name_ta' => 'நெய்யூர்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Pacode', 'name_ta' => 'பாகோடு', 'district' => 'Kanyakumari'],
            //['name_en' => 'Padmanabhapuram', 'name_ta' => 'பத்மநாபபுரம்', 'district' => 'Kanyakumari'], // Upgraded to Municipality
            ['name_en' => 'Palappallam', 'name_ta' => 'பளப்பள்ளம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Palliyadi', 'name_ta' => 'பள்ளியாடி', 'district' => 'Kanyakumari'],
            ['name_en' => 'Ponmani', 'name_ta' => 'பொன்மனை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Pudukadai', 'name_ta' => 'புதுக்கடை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Puthalam', 'name_ta' => 'புதலம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Reethapuram', 'name_ta' => 'ரீத்தாபுரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Suchindram', 'name_ta' => 'சுசீந்திரம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Thakkalai', 'name_ta' => 'தக்கலை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Thengampudur', 'name_ta' => 'தெங்கம்புதூர்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Thenthamaraikulam', 'name_ta' => 'தென்தாமரைக்குளம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Therur', 'name_ta' => 'தேரூர்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Thiruparappu', 'name_ta' => 'திற்பரப்பு', 'district' => 'Kanyakumari'],
            ['name_en' => 'Thiruvattar', 'name_ta' => 'திருவட்டார்', 'district' => 'Kanyakumari'],
            //['name_en' => 'Thiruvananthapuram', 'name_ta' => 'திருவட்டாறு', 'district' => 'Kanyakumari'], // Duplicate of Thiruvattar
            ['name_en' => 'Tittuvilai', 'name_ta' => 'திட்டுவிளை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Unnamalaikadai', 'name_ta' => 'உண்ணாமலைக்கடை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Valvaithankoshtam', 'name_ta' => 'வாள்வைத்தான்கோஷ்டம்', 'district' => 'Kanyakumari'],
            ['name_en' => 'Vellimalai', 'name_ta' => 'வெள்ளிமலை', 'district' => 'Kanyakumari'],
            ['name_en' => 'Verkilambi', 'name_ta' => 'வேர்க்கிளம்பி', 'district' => 'Kanyakumari'],
            ['name_en' => 'Vilavur', 'name_ta' => 'விளவூர்', 'district' => 'Kanyakumari'],

             // Karur (8)
            ['name_en' => 'Aravakurichi', 'name_ta' => 'அரவக்குறிச்சி', 'district' => 'Karur'],
            ['name_en' => 'Krishnarayapuram', 'name_ta' => 'கிருஷ்ணராயபுரம்', 'district' => 'Karur'],
            ['name_en' => 'Marudur', 'name_ta' => 'மருதூர்', 'district' => 'Karur'],
            ['name_en' => 'Nangavaram', 'name_ta' => 'நங்கவரம்', 'district' => 'Karur'],
            ['name_en' => 'P. J. Cholapuram', 'name_ta' => 'பழைய ஜெயங்கொண்ட சோழபுரம்', 'district' => 'Karur'],
            ['name_en' => 'Puliyur', 'name_ta' => 'புலியூர்', 'district' => 'Karur'],
            ['name_en' => 'Punjai Thottakurichi', 'name_ta' => 'புஞ்சை தோட்டக்குறிச்சி', 'district' => 'Karur'],
            ['name_en' => 'Uppidamangalam', 'name_ta' => 'உப்பிடமங்கலம்', 'district' => 'Karur'],

             // Krishnagiri (6)
            ['name_en' => 'Bargur', 'name_ta' => 'பர்கூர்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Denkanikottai', 'name_ta' => 'தேன்கனிக்கோட்டை', 'district' => 'Krishnagiri'],
            ['name_en' => 'Kaveripattinam', 'name_ta' => 'காவேரிப்பட்டணம்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Kelamangalam', 'name_ta' => 'கெலமங்கலம்', 'district' => 'Krishnagiri'],
            ['name_en' => 'Nagojanahalli', 'name_ta' => 'நாகோஜனஹள்ளி', 'district' => 'Krishnagiri'],
            ['name_en' => 'Uthangarai', 'name_ta' => 'ஊத்தங்கரை', 'district' => 'Krishnagiri'],

             // Madurai (9)
            ['name_en' => 'A. Vellalapatti', 'name_ta' => 'ஏ. வெள்ளாளப்பட்டி', 'district' => 'Madurai'],
            ['name_en' => 'Alanganallur', 'name_ta' => 'அலங்காநல்லூர்', 'district' => 'Madurai'],
            ['name_en' => 'Elumalai', 'name_ta' => 'எழுமலை', 'district' => 'Madurai'],
            ['name_en' => 'Palamedu', 'name_ta' => 'பாலமேடு', 'district' => 'Madurai'],
            ['name_en' => 'Paravai', 'name_ta' => 'பரவை', 'district' => 'Madurai'],
            ['name_en' => 'Peraiyur', 'name_ta' => 'பேரையூர்', 'district' => 'Madurai'],
            ['name_en' => 'Sholavandan', 'name_ta' => 'சோழவந்தான்', 'district' => 'Madurai'],
            ['name_en' => 'T. Kallupatti', 'name_ta' => 'டி. கல்லுப்பட்டி', 'district' => 'Madurai'],
            ['name_en' => 'Vadipatti', 'name_ta' => 'வாடிப்பட்டி', 'district' => 'Madurai'],

            // Mayiladuthurai (4)
            ['name_en' => 'Kuthalam', 'name_ta' => 'குத்தாலம்', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Manalmedu', 'name_ta' => 'மணல்மேடு', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Tharangambadi', 'name_ta' => 'தரங்கம்பாடி', 'district' => 'Mayiladuthurai'],
            ['name_en' => 'Vaitheeswarankoil', 'name_ta' => 'வைத்தீஸ்வரன்கோயில்', 'district' => 'Mayiladuthurai'],

            // Nagapattinam (4)
            ['name_en' => 'Kilvelur', 'name_ta' => 'கீழ்வேளூர்', 'district' => 'Nagapattinam'],
            ['name_en' => 'Thalainayar', 'name_ta' => 'தலைஞாயிறு', 'district' => 'Nagapattinam'],
            ['name_en' => 'Thittacheri', 'name_ta' => 'திட்டச்சேரி', 'district' => 'Nagapattinam'],
            ['name_en' => 'Velankanni', 'name_ta' => 'வேளாங்கண்ணி', 'district' => 'Nagapattinam'],

            // Namakkal (19)
            ['name_en' => 'Alampalayam (Namakkal)', 'name_ta' => 'ஆலம்பாளையம் (நாமக்கல்)', 'district' => 'Namakkal'],
            ['name_en' => 'Athanur', 'name_ta' => 'ஆத்தனுர்', 'district' => 'Namakkal'],
            ['name_en' => 'Erumaipatti', 'name_ta' => 'எருமப்பட்டி', 'district' => 'Namakkal'],
            ['name_en' => 'Kalappanaickenpatti', 'name_ta' => 'களப்பநாயக்கன்பட்டி', 'district' => 'Namakkal'],
            ['name_en' => 'Mallasamudram', 'name_ta' => 'மல்லசமுத்திரம்', 'district' => 'Namakkal'],
            ['name_en' => 'Mohanur', 'name_ta' => 'மோகனூர்', 'district' => 'Namakkal'],
            ['name_en' => 'Namagiripettai', 'name_ta' => 'நாமகிரிப்பேட்டை', 'district' => 'Namakkal'],
            ['name_en' => 'P. Velur', 'name_ta' => 'பரமத்திவேலூர்', 'district' => 'Namakkal'],
            ['name_en' => 'Padaiveedu', 'name_ta' => 'படைவீடு', 'district' => 'Namakkal'],
            ['name_en' => 'Pandamangalam', 'name_ta' => 'பாண்டமங்கலம்', 'district' => 'Namakkal'],
            ['name_en' => 'Paramathi', 'name_ta' => 'பரமத்தி', 'district' => 'Namakkal'],
            ['name_en' => 'Pattinam', 'name_ta' => 'பட்டிணம்', 'district' => 'Namakkal'],
            ['name_en' => 'Pillanallur', 'name_ta' => 'பிள்ளாநல்லூர்', 'district' => 'Namakkal'],
            ['name_en' => 'Pothanur', 'name_ta' => 'பொத்தனூர்', 'district' => 'Namakkal'],
            ['name_en' => 'R. Pudupatti', 'name_ta' => 'ஆர். புதுப்பட்டி', 'district' => 'Namakkal'],
            ['name_en' => 'Seerapalli', 'name_ta' => 'சீராப்பள்ளி', 'district' => 'Namakkal'],
            ['name_en' => 'Senthamangalam', 'name_ta' => 'சேந்தமங்கலம்', 'district' => 'Namakkal'],
            ['name_en' => 'Velur (Namakkal)', 'name_ta' => 'வேலூர் (நாமக்கல்)', 'district' => 'Namakkal'],
            ['name_en' => 'Venkarai', 'name_ta' => 'வெங்கரை', 'district' => 'Namakkal'],
            ['name_en' => 'Vennanthur', 'name_ta' => 'வெண்ணந்தூர்', 'district' => 'Namakkal'],

            // Nilgiris (11)
            ['name_en' => 'Adikaratti', 'name_ta' => 'அதிகரட்டி', 'district' => 'Nilgiris'],
            ['name_en' => 'Bikketti', 'name_ta' => 'பிக்கட்டி', 'district' => 'Nilgiris'],
            ['name_en' => 'Devarshola', 'name_ta' => 'தேவர்சோலை', 'district' => 'Nilgiris'],
            ['name_en' => 'Hubbathala', 'name_ta' => 'ஹுப்பத்தலை', 'district' => 'Nilgiris'],
            ['name_en' => 'Jagathala', 'name_ta' => 'ஜெகதலா', 'district' => 'Nilgiris'],
            ['name_en' => 'Kethi', 'name_ta' => 'கேத்தி', 'district' => 'Nilgiris'],
            ['name_en' => 'Kil Kotagiri', 'name_ta' => 'கீழ் கோத்தகிரி', 'district' => 'Nilgiris'],
            ['name_en' => 'Kotagiri', 'name_ta' => 'கோத்தகிரி', 'district' => 'Nilgiris'],
            ['name_en' => 'Naduvattam', 'name_ta' => 'நடுவட்டம்', 'district' => 'Nilgiris'],
            ['name_en' => 'O\' Valley', 'name_ta' => 'ஓ’ வேலி', 'district' => 'Nilgiris'],
            ['name_en' => 'Sholur', 'name_ta' => 'ஷோளூர்', 'district' => 'Nilgiris'],

            // Perambalur (4)
            ['name_en' => 'Arumbavur', 'name_ta' => 'அரும்பாவூர்', 'district' => 'Perambalur'],
            ['name_en' => 'Kurumbalur', 'name_ta' => 'குரும்பலூர்', 'district' => 'Perambalur'],
            ['name_en' => 'Labbaikudikadu', 'name_ta' => 'லப்பைக்குடிக்காடு', 'district' => 'Perambalur'],
            ['name_en' => 'Poolambadi', 'name_ta' => 'பூலாம்பாடி', 'district' => 'Perambalur'],

            // Pudukkottai (8)
            ['name_en' => 'Alangudi', 'name_ta' => 'ஆலங்குடி', 'district' => 'Pudukkottai'],
            ['name_en' => 'Annavasal', 'name_ta' => 'அன்னவாசல்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Arimalam', 'name_ta' => 'அரிமளம்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Iluppur', 'name_ta' => 'இலுப்பூர்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Karambakkudi', 'name_ta' => 'கரம்பக்குடி', 'district' => 'Pudukkottai'],
            ['name_en' => 'Keeramangalam', 'name_ta' => 'கீரமங்கலம்', 'district' => 'Pudukkottai'],
            ['name_en' => 'Keeranur (Pudukkottai)', 'name_ta' => 'கீரனூர் (புதுக்கோட்டை)', 'district' => 'Pudukkottai'],
            ['name_en' => 'Ponnamaravathi', 'name_ta' => 'பொன்னமராவதி', 'district' => 'Pudukkottai'],

            // Ramanathapuram (7)
            ['name_en' => 'Abiramam', 'name_ta' => 'அபிராமம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Kamuthi', 'name_ta' => 'கமுதி', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Mandapam', 'name_ta' => 'மண்டபம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'R.S.Mangalam', 'name_ta' => 'ஆர்.எஸ்.மங்கலம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Rameswaram', 'name_ta' => 'ராமேஸ்வரம்', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Sayalkudi', 'name_ta' => 'சாயல்குடி', 'district' => 'Ramanathapuram'],
            ['name_en' => 'Thondi', 'name_ta' => 'தொண்டி', 'district' => 'Ramanathapuram'],

            // Ranipet (8)
            ['name_en' => 'Ammoor', 'name_ta' => 'அம்மூர்', 'district' => 'Ranipet'],
            ['name_en' => 'Kalavai', 'name_ta' => 'கலவை', 'district' => 'Ranipet'],
            ['name_en' => 'Kaveripakkam', 'name_ta' => 'காவேரிப்பாக்கம்', 'district' => 'Ranipet'],
            ['name_en' => 'Nemili', 'name_ta' => 'நெமிலி', 'district' => 'Ranipet'],
            ['name_en' => 'Panapakkam', 'name_ta' => 'பனப்பாக்கம்', 'district' => 'Ranipet'],
            ['name_en' => 'Sholinghur', 'name_ta' => 'சோளிங்கர்', 'district' => 'Ranipet'], // Upgraded to Municipality
            ['name_en' => 'Thakkolam', 'name_ta' => 'தக்கோலம்', 'district' => 'Ranipet'],
            ['name_en' => 'Timiri', 'name_ta' => 'திமிரி', 'district' => 'Ranipet'],
            ['name_en' => 'Vilapakkam', 'name_ta' => 'விளப்பாக்கம்', 'district' => 'Ranipet'],

            // Salem (31)
            ['name_en' => 'Arasiramani', 'name_ta' => 'அரசிராமணி', 'district' => 'Salem'],
            ['name_en' => 'Attayampatti', 'name_ta' => 'ஆட்டையாம்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Ayothiapattinam', 'name_ta' => 'அயோத்தியாபட்டணம்', 'district' => 'Salem'],
            ['name_en' => 'Belur (Salem)', 'name_ta' => 'பேளூர் (சேலம்)', 'district' => 'Salem'],
            ['name_en' => 'Edaganasalai', 'name_ta' => 'இடங்கணசாலை', 'district' => 'Salem'],
            ['name_en' => 'Elampillai', 'name_ta' => 'இளம்பிள்ளை', 'district' => 'Salem'],
            ['name_en' => 'Ethapur', 'name_ta' => 'ஏத்தாப்பூர்', 'district' => 'Salem'],
            ['name_en' => 'Gangavalli', 'name_ta' => 'கெங்கவல்லி', 'district' => 'Salem'],
            ['name_en' => 'Jalakandapuram', 'name_ta' => 'ஜலகண்டாபுரம்', 'district' => 'Salem'],
            ['name_en' => 'Kadayampatti', 'name_ta' => 'காடையாம்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Kannankurichi', 'name_ta' => 'கன்னங்குறிச்சி', 'district' => 'Salem'],
            ['name_en' => 'Karuppur', 'name_ta' => 'கருப்பூர்', 'district' => 'Salem'],
            ['name_en' => 'Keeripatti', 'name_ta' => 'கீரிப்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Kolathur', 'name_ta' => 'கொளத்தூர்', 'district' => 'Salem'],
            ['name_en' => 'Konganapuram', 'name_ta' => 'கொங்கணாபுரம்', 'district' => 'Salem'],
            ['name_en' => 'Mallur', 'name_ta' => 'மல்லூர்', 'district' => 'Salem'],
            ['name_en' => 'Mecheri', 'name_ta' => 'மேச்சேரி', 'district' => 'Salem'],
            ['name_en' => 'Nangavalli', 'name_ta' => 'நங்கவள்ளி', 'district' => 'Salem'],
            ['name_en' => 'Omalur', 'name_ta' => 'ஓமலூர்', 'district' => 'Salem'],
            ['name_en' => 'P. N. Patti', 'name_ta' => 'பி.என்.பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Panamarathupatti', 'name_ta' => 'பனமரத்துப்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Pethanaickenpalayam', 'name_ta' => 'பெத்தநாயக்கன்பாளையம்', 'district' => 'Salem'],
            ['name_en' => 'Poolampatti', 'name_ta' => 'பூலாம்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Sentharapatti', 'name_ta' => 'செந்தாரப்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Thammampatti', 'name_ta' => 'தம்மம்பட்டி', 'district' => 'Salem'],
            ['name_en' => 'Tharamangalam', 'name_ta' => 'தாரமங்கலம்', 'district' => 'Salem'],
            ['name_en' => 'Thedavur', 'name_ta' => 'தேடாவூர்', 'district' => 'Salem'],
            ['name_en' => 'Thevur', 'name_ta' => 'தேவூர்', 'district' => 'Salem'],
            ['name_en' => 'Valapady', 'name_ta' => 'வாழப்பாடி', 'district' => 'Salem'],
            ['name_en' => 'Vanavasi', 'name_ta' => 'வனவாசி', 'district' => 'Salem'],
            ['name_en' => 'Veeraganur', 'name_ta' => 'வீரக்கனூர்', 'district' => 'Salem'],

            // Sivaganga (11)
            ['name_en' => 'Ilayangudi', 'name_ta' => 'இளையான்குடி', 'district' => 'Sivaganga'],
            ['name_en' => 'Kandanur', 'name_ta' => 'கண்டனூர்', 'district' => 'Sivaganga'],
            ['name_en' => 'Kanadukathan', 'name_ta' => 'கானாடுகாத்தான்', 'district' => 'Sivaganga'],
            ['name_en' => 'Kottaiyur', 'name_ta' => 'கோட்டையூர்', 'district' => 'Sivaganga'],
            ['name_en' => 'Madagupatti', 'name_ta' => 'மதகுபட்டி', 'district' => 'Sivaganga'],
            ['name_en' => 'Nattarasankottai', 'name_ta' => 'நாட்டரசன்கோட்டை', 'district' => 'Sivaganga'],
            ['name_en' => 'Nerkuppai', 'name_ta' => 'நெற்குப்பை', 'district' => 'Sivaganga'],
            ['name_en' => 'Paganeri', 'name_ta' => 'பாகனேரி', 'district' => 'Sivaganga'],
            ['name_en' => 'Pallathur', 'name_ta' => 'பள்ளத்தூர்', 'district' => 'Sivaganga'],
            ['name_en' => 'Singampunari', 'name_ta' => 'சிங்கம்புணரி', 'district' => 'Sivaganga'],
            ['name_en' => 'Thiruppuvanam', 'name_ta' => 'திருப்புவனம்', 'district' => 'Sivaganga'],
            //['name_en' => 'Thirupathur', 'name_ta' => 'திருப்பத்தூர்', 'district' => 'Sivaganga'], // Likely Municipality

            // Tenkasi (17)
            ['name_en' => 'Achampudur', 'name_ta' => 'அச்சம்புதூர்', 'district' => 'Tenkasi'],
            ['name_en' => 'Alangulam', 'name_ta' => 'ஆலங்குளம்', 'district' => 'Tenkasi'],
            ['name_en' => 'Alwarkurichi', 'name_ta' => 'ஆழ்வார்குறிச்சி', 'district' => 'Tenkasi'],
            ['name_en' => 'Aygudi', 'name_ta' => 'ஆய்குடி', 'district' => 'Tenkasi'],
            ['name_en' => 'Courtallam', 'name_ta' => 'குற்றாலம்', 'district' => 'Tenkasi'],
            ['name_en' => 'Ilanji', 'name_ta' => 'இலஞ்சி', 'district' => 'Tenkasi'],
            ['name_en' => 'Keezhapavur', 'name_ta' => 'கீழப்பாவூர்', 'district' => 'Tenkasi'],
            ['name_en' => 'Melagaram', 'name_ta' => 'மேலகரம்', 'district' => 'Tenkasi'],
            ['name_en' => 'Panboli', 'name_ta' => 'பண்பொழி', 'district' => 'Tenkasi'],
            ['name_en' => 'Pudur (S)', 'name_ta' => 'புதூர் (எஸ்)', 'district' => 'Tenkasi'],
            ['name_en' => 'Rayagiri', 'name_ta' => 'இராயகிரி', 'district' => 'Tenkasi'],
            ['name_en' => 'Sambavar Vadagarai', 'name_ta' => 'சாம்பவர் வடகரை', 'district' => 'Tenkasi'],
            ['name_en' => 'Sivagiri (Tenkasi)', 'name_ta' => 'சிவகிரி (தென்காசி)', 'district' => 'Tenkasi'],
            ['name_en' => 'Sundarapandiapuram', 'name_ta' => 'சுந்தரபாண்டியபுரம்', 'district' => 'Tenkasi'],
            ['name_en' => 'Surandai', 'name_ta' => 'சுரண்டை', 'district' => 'Tenkasi'],
            ['name_en' => 'Vadakarai Keezhpadugai', 'name_ta' => 'வடகரை கீழ்படுகை', 'district' => 'Tenkasi'],
            ['name_en' => 'Veerakeralampudur', 'name_ta' => 'வீரகேரளம்புதூர்', 'district' => 'Tenkasi'],

            // Thanjavur (20)
            ['name_en' => 'Adiramapattinam', 'name_ta' => 'அதிராம்பட்டினம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Ammapettai', 'name_ta' => 'அம்மாபேட்டை', 'district' => 'Thanjavur'],
            ['name_en' => 'Ayyampettai (Thanjavur)', 'name_ta' => 'அய்யம்பேட்டை (தஞ்சாவூர்)', 'district' => 'Thanjavur'],
            ['name_en' => 'Cholapuram', 'name_ta' => 'சோழபுரம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Madukkur', 'name_ta' => 'மதுக்கூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Melathiruppanthuruthi', 'name_ta' => 'மேலத்திருப்பந்துருத்தி', 'district' => 'Thanjavur'],
            ['name_en' => 'Melattur', 'name_ta' => 'மேலட்டூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Orathanadu (Mukthambalpuram)', 'name_ta' => 'ஒரத்தநாடு (முத்தம்பாள்புரம்)', 'district' => 'Thanjavur'],
            ['name_en' => 'Papanasam', 'name_ta' => 'பாபநாசம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Peravurani', 'name_ta' => 'பேராவூரணி', 'district' => 'Thanjavur'],
            ['name_en' => 'Perumagalur', 'name_ta' => 'பெருமாகலூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Swamimalai', 'name_ta' => 'சுவாமிமலை', 'district' => 'Thanjavur'],
            ['name_en' => 'Thirubuvanam', 'name_ta' => 'திருபுவனம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Thirukattupalli', 'name_ta' => 'திருக்காட்டுப்பள்ளி', 'district' => 'Thanjavur'],
            ['name_en' => 'Thirunageswaram', 'name_ta' => 'திருநாகேஸ்வரம்', 'district' => 'Thanjavur'],
            ['name_en' => 'Thiruppanandal', 'name_ta' => 'திருப்பனந்தாள்', 'district' => 'Thanjavur'],
            ['name_en' => 'Thiruvaiyaru', 'name_ta' => 'திருவையாறு', 'district' => 'Thanjavur'],
            ['name_en' => 'Thiruvidaimarudur', 'name_ta' => 'திருவிடைமருதூர்', 'district' => 'Thanjavur'],
            ['name_en' => 'Vallam (Thanjavur)', 'name_ta' => 'வல்லம் (தஞ்சாவூர்)', 'district' => 'Thanjavur'],
            ['name_en' => 'Veppathur', 'name_ta' => 'வேப்பத்தூர்', 'district' => 'Thanjavur'],

            // Theni (21)
            ['name_en' => 'Andipatti Jakkampatti', 'name_ta' => 'ஆண்டிபட்டி ஜக்கம்பட்டி', 'district' => 'Theni'],
            //['name_en' => 'Bodinayakkanur', 'name_ta' => 'போடிநாயக்கனூர்', 'district' => 'Theni'], // Upgraded to Municipality
            ['name_en' => 'Boothipuram', 'name_ta' => 'பூதிப்புரம்', 'district' => 'Theni'],
            ['name_en' => 'Devadanapatti', 'name_ta' => 'தேவதானப்பட்டி', 'district' => 'Theni'],
            ['name_en' => 'Ganguvarpatti', 'name_ta' => 'கங்குவார்பட்டி', 'district' => 'Theni'],
            ['name_en' => 'Gudalur (Theni)', 'name_ta' => 'கூடலூர் (தேனி)', 'district' => 'Theni'],
            ['name_en' => 'Hanumanthampatti', 'name_ta' => 'அனுமந்தன்பட்டி', 'district' => 'Theni'],
            ['name_en' => 'Highways', 'name_ta' => 'ஹைவேவிஸ்', 'district' => 'Theni'],
            ['name_en' => 'Kamayagoundanpatti', 'name_ta' => 'காமயக்கவுண்டன்பட்டி', 'district' => 'Theni'],
            ['name_en' => 'Kombai', 'name_ta' => 'கொம்பை', 'district' => 'Theni'],
            ['name_en' => 'Kottamangalam (Theni)', 'name_ta' => 'கோட்டமங்கலம் (தேனி)', 'district' => 'Theni'],
            ['name_en' => 'Markayankottai', 'name_ta' => 'மார்க்கையன்கோட்டை', 'district' => 'Theni'],
            ['name_en' => 'Melachokkanathapuram', 'name_ta' => 'மேலச்சொக்கநாதபுரம்', 'district' => 'Theni'],
            ['name_en' => 'Odaipatti', 'name_ta' => 'ஓடைப்பட்டி', 'district' => 'Theni'],
            ['name_en' => 'Palani Chettipatti', 'name_ta' => 'பழனிசெட்டிபட்டி', 'district' => 'Theni'],
            ['name_en' => 'Pannaipuram', 'name_ta' => 'பண்ணைப்புரம்', 'district' => 'Theni'],
            //['name_en' => 'Periyakulam', 'name_ta' => 'பெரியகுளம்', 'district' => 'Theni'], // Upgraded to Municipality
            ['name_en' => 'Uthamapalayam', 'name_ta' => 'உத்தமபாளையம்', 'district' => 'Theni'],
            ['name_en' => 'Vadugapatti (Theni)', 'name_ta' => 'வடுகப்பட்டி (தேனி)', 'district' => 'Theni'],
            ['name_en' => 'Veerapandi (Theni)', 'name_ta' => 'வீரபாண்டி (தேனி)', 'district' => 'Theni'],
            // Removed Meghamalai, Dombucheri, Kunnur as they seem less common/potentially incorrect based on DTP/LGD lists.

            // Thoothukudi (18)
            ['name_en' => 'Arumuganeri', 'name_ta' => 'ஆறுமுகநேரி', 'district' => 'Thoothukudi'],
            ['name_en' => 'Athur (Thoothukudi)', 'name_ta' => 'ஆத்தூர் (தூத்துக்குடி)', 'district' => 'Thoothukudi'],
            ['name_en' => 'Eral', 'name_ta' => 'ஏரல்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Ettayapuram', 'name_ta' => 'எட்டயபுரம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Kadambur', 'name_ta' => 'கடம்பூர்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Kalugumalai', 'name_ta' => 'கழுகுமலை', 'district' => 'Thoothukudi'],
            ['name_en' => 'Kanam', 'name_ta' => 'கானம்', 'district' => 'Thoothukudi'],
            //['name_en' => 'Kayalpattinam', 'name_ta' => 'காயல்பட்டினம்', 'district' => 'Thoothukudi'], // Upgraded to Municipality
            ['name_en' => 'Kayatharu', 'name_ta' => 'கயத்தாறு', 'district' => 'Thoothukudi'],
            ['name_en' => 'Nazerath', 'name_ta' => 'நாசரேத்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Perungulam', 'name_ta' => 'பெருங்குளம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Pudur (Thoothukudi)', 'name_ta' => 'புதூர் (தூத்துக்குடி)', 'district' => 'Thoothukudi'],
            ['name_en' => 'Sattankulam', 'name_ta' => 'சாத்தான்குளம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Sayapuram', 'name_ta' => 'சாயர்புரம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Srivaikuntam', 'name_ta' => 'ஸ்ரீவைகுண்டம்', 'district' => 'Thoothukudi'],
            ['name_en' => 'Thenthiruperai', 'name_ta' => 'தென்திருப்பேரை', 'district' => 'Thoothukudi'],
            //['name_en' => 'Tiruchendur', 'name_ta' => 'திருச்செந்தூர்', 'district' => 'Thoothukudi'], // Upgraded to Municipality
            ['name_en' => 'Udangudi', 'name_ta' => 'உடன்குடி', 'district' => 'Thoothukudi'],
            ['name_en' => 'V. Pudur', 'name_ta' => 'வி. புதூர்', 'district' => 'Thoothukudi'],
            //['name_en' => 'Vilathikulam', 'name_ta' => 'விளாத்திகுளம்', 'district' => 'Thoothukudi'], // Upgraded to Municipality

            // Tiruchirappalli (15)
            ['name_en' => 'Balakrishnampatti', 'name_ta' => 'பாலகிருஷ்ணம்பட்டி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Kallakudi', 'name_ta' => 'கல்லக்குடி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Kattuputhur', 'name_ta' => 'காட்டுப்புத்தூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Koothappar', 'name_ta' => 'கூத்தப்பார்', 'district' => 'Tiruchirappalli'],
            //['name_en' => 'Lalgudi', 'name_ta' => 'லால்குடி', 'district' => 'Tiruchirappalli'], // Upgraded to Municipality
            //['name_en' => 'Manachanallur', 'name_ta' => 'மணச்சநல்லூர்', 'district' => 'Tiruchirappalli'], // Upgraded to Municipality
            ['name_en' => 'Mettupalayam (Tiruchirappalli)', 'name_ta' => 'மேட்டுப்பாளையம் (திருச்சிராப்பள்ளி)', 'district' => 'Tiruchirappalli'],
            //['name_en' => 'Musiri', 'name_ta' => 'முசிறி', 'district' => 'Tiruchirappalli'], // Upgraded to Municipality
            ['name_en' => 'Poovalur', 'name_ta' => 'பூவாளூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Pullampadi', 'name_ta' => 'புள்ளம்பாடி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'S. Kannanur', 'name_ta' => 'ச. கண்ணனூர்', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Sirugamani', 'name_ta' => 'சிறுகமணி', 'district' => 'Tiruchirappalli'],
            ['name_en' => 'Thathaiyangarpet', 'name_ta' => 'தாத்தையங்கார்பேட்டை', 'district' => 'Tiruchirappalli'],
            //['name_en' => 'Thottiyam', 'name_ta' => 'தொட்டியம்', 'district' => 'Tiruchirappalli'], // Upgraded to Municipality
            ['name_en' => 'Uppiliapuram', 'name_ta' => 'உப்பிலியாபுரம்', 'district' => 'Tiruchirappalli'],
            //['name_en' => 'Thuraiyur', 'name_ta' => 'துறையூர்', 'district' => 'Tiruchirappalli'], // Upgraded to Municipality

            // Tirunelveli (18)
            ['name_en' => 'Cheranmahadevi', 'name_ta' => 'சேரன்மாதேவி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Eruvadi', 'name_ta' => 'ஏர்வாடி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Gopalasamudram', 'name_ta' => 'கோபாலசமுத்திரம்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Kalakkad', 'name_ta' => 'களக்காடு', 'district' => 'Tirunelveli'],
            ['name_en' => 'Kallidaikurichi', 'name_ta' => 'கல்லிடைக்குறிச்சி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Manimutharu', 'name_ta' => 'மணிமுத்தாறு', 'district' => 'Tirunelveli'],
            ['name_en' => 'Melacheval', 'name_ta' => 'மேலச்செவல்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Moolakaraipatti', 'name_ta' => 'மூலக்கரைப்பட்டி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Nanguneri', 'name_ta' => 'நாங்குநேரி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Naranammalpuram', 'name_ta' => 'நாரணம்மாள்புரம்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Panagudi', 'name_ta' => 'பனங்குடி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Pathamadai', 'name_ta' => 'பத்தமடை', 'district' => 'Tirunelveli'],
            ['name_en' => 'Sankar Nagar', 'name_ta' => 'சங்கர் நகர்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Thirukarungudi', 'name_ta' => 'திருக்குறுங்குடி', 'district' => 'Tirunelveli'],
            ['name_en' => 'Thisayanvilai', 'name_ta' => 'திசையன்விளை', 'district' => 'Tirunelveli'],
            ['name_en' => 'Vadakkuvalliyur', 'name_ta' => 'வடக்குவள்ளியூர்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Veeravanallur', 'name_ta' => 'வீரவநல்லூர்', 'district' => 'Tirunelveli'],
            ['name_en' => 'Vijayanarayanam', 'name_ta' => 'விஜயநாராயணம்', 'district' => 'Tirunelveli'],

            // Tirupathur (3)
            ['name_en' => 'Alangayam', 'name_ta' => 'ஆலங்காயம்', 'district' => 'Tirupathur'],
            ['name_en' => 'Natrampalli', 'name_ta' => 'நாற்றம்பள்ளி', 'district' => 'Tirupathur'],
            ['name_en' => 'Uthayendram', 'name_ta' => 'உதயேந்திரம்', 'district' => 'Tirupathur'],

            // Tiruppur (17)
            ['name_en' => 'Avanashi', 'name_ta' => 'அவினாசி', 'district' => 'Tiruppur'],
            ['name_en' => 'Chinnakkampalayam', 'name_ta' => 'சின்னக்கம்பாளையம்', 'district' => 'Tiruppur'],
            //['name_en' => 'Dharapuram', 'name_ta' => 'தாராபுரம்', 'district' => 'Tiruppur'], // Upgraded to Municipality
            ['name_en' => 'Gudimangalam', 'name_ta' => 'குடிமங்கலம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Kamanaicken Palayam', 'name_ta' => 'காமநாயக்கன்பாளையம்', 'district' => 'Tiruppur'],
            //['name_en' => 'Kangeyam', 'name_ta' => 'காங்கேயம்', 'district' => 'Tiruppur'], // Upgraded to Municipality
            ['name_en' => 'Kannivadi (Tiruppur)', 'name_ta' => 'கன்னிவாடி (திருப்பூர்)', 'district' => 'Tiruppur'],
            ['name_en' => 'Kolathupalayam', 'name_ta' => 'கொளத்துப்பாளையம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Komaralingam', 'name_ta' => 'குமரலிங்கம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Kunnathur', 'name_ta' => 'குன்னத்தூர்', 'district' => 'Tiruppur'],
            ['name_en' => 'Madathukulam', 'name_ta' => 'மடத்துக்குளம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Mulanur', 'name_ta' => 'மூலனூர்', 'district' => 'Tiruppur'],
            ['name_en' => 'Muthur', 'name_ta' => 'முத்தூர்', 'district' => 'Tiruppur'],
            ['name_en' => 'Rudravathi', 'name_ta' => 'ருத்திரவதி', 'district' => 'Tiruppur'],
            ['name_en' => 'Samalapuram', 'name_ta' => 'சாமளாபுரம்', 'district' => 'Tiruppur'],
            ['name_en' => 'Sankaramanallur', 'name_ta' => 'சங்கராமநல்லூர்', 'district' => 'Tiruppur'],
            ['name_en' => 'Uthukuli', 'name_ta' => 'ஊத்துக்குளி', 'district' => 'Tiruppur'],
            //['name_en' => 'Vellakoil', 'name_ta' => 'வெள்ளக்கோயில்', 'district' => 'Tiruppur'], // Upgraded to Municipality

            // Tiruvallur (8)
            ['name_en' => 'Arani (Tiruvallur)', 'name_ta' => 'ஆரணி (திருவள்ளூர்)', 'district' => 'Tiruvallur'],
            //['name_en' => 'Gummidipoondi', 'name_ta' => 'கும்மிடிப்பூண்டி', 'district' => 'Tiruvallur'], // Upgraded to Municipality
            ['name_en' => 'Minjur', 'name_ta' => 'மீஞ்சூர்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Naravarikuppam', 'name_ta' => 'நாரவாரிக்குப்பம்', 'district' => 'Tiruvallur'],
            ['name_en' => 'Pallipattu', 'name_ta' => 'பள்ளிப்பட்டு', 'district' => 'Tiruvallur'],
            ['name_en' => 'Pothatturpettai', 'name_ta' => 'பொதட்டூர்பேட்டை', 'district' => 'Tiruvallur'],
            //['name_en' => 'Tirunindravur', 'name_ta' => 'திருநின்றவூர்', 'district' => 'Tiruvallur'], // Upgraded to Municipality
            ['name_en' => 'Uthukkottai', 'name_ta' => 'ஊத்துக்கோட்டை', 'district' => 'Tiruvallur'],

            // Tiruvannamalai (10)
            ['name_en' => 'Chengam', 'name_ta' => 'செங்கம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Chetpet', 'name_ta' => 'செட்பேட்டை', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Desur', 'name_ta' => 'தேசூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Kalasapakkam', 'name_ta' => 'கலசப்பாக்கம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Kannamangalam', 'name_ta' => 'கண்ணமங்கலம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Kilpennathur', 'name_ta' => 'கீழ்பென்னாத்தூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Peranamallur', 'name_ta' => 'பெரணமல்லூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Polur', 'name_ta' => 'போளூர்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Pudupalayam', 'name_ta' => 'புதுப்பாளையம்', 'district' => 'Tiruvannamalai'],
            ['name_en' => 'Vettavalam', 'name_ta' => 'வேட்டவலம்', 'district' => 'Tiruvannamalai'],

            // Tiruvarur (7)
            ['name_en' => 'Koradacheri', 'name_ta' => 'கொரடாச்சேரி', 'district' => 'Tiruvarur'],
            ['name_en' => 'Kudavasal', 'name_ta' => 'குடவாசல்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Muthupet', 'name_ta' => 'முத்துப்பேட்டை', 'district' => 'Tiruvarur'],
            ['name_en' => 'Nannilam', 'name_ta' => 'நன்னிலம்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Needamangalam', 'name_ta' => 'நீடாமங்கலம்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Peralam', 'name_ta' => 'பேரளம்', 'district' => 'Tiruvarur'],
            ['name_en' => 'Valangaiman', 'name_ta' => 'வலங்கைமான்', 'district' => 'Tiruvarur'],

            // Vellore (4)
            ['name_en' => 'Odugathur', 'name_ta' => 'ஒடுகத்தூர்', 'district' => 'Vellore'],
            ['name_en' => 'Pallikonda', 'name_ta' => 'பள்ளிகொண்டா', 'district' => 'Vellore'],
            ['name_en' => 'Pennathur', 'name_ta' => 'பெண்ணாத்தூர்', 'district' => 'Vellore'],
            ['name_en' => 'Thiruvalam', 'name_ta' => 'திருவலம்', 'district' => 'Vellore'],

            // Viluppuram (7)
            ['name_en' => 'Ananthapuram', 'name_ta' => 'அனந்தபுரம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Arakandanallur', 'name_ta' => 'அரகண்டநல்லூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Gingee', 'name_ta' => 'செஞ்சி', 'district' => 'Viluppuram'],
            ['name_en' => 'Kottakuppam', 'name_ta' => 'கோட்டக்குப்பம்', 'district' => 'Viluppuram'], // Upgraded to Municipality
            ['name_en' => 'Marakkanam', 'name_ta' => 'மரக்காணம்', 'district' => 'Viluppuram'],
            ['name_en' => 'Thiruvennainallur', 'name_ta' => 'திருவெண்ணெய்நல்லூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Valavanur', 'name_ta' => 'வளவனூர்', 'district' => 'Viluppuram'],
            ['name_en' => 'Vikravandi', 'name_ta' => 'விக்கிரவாண்டி', 'district' => 'Viluppuram'],

            // Virudhunagar (9)
            ['name_en' => 'Chettiarpatti', 'name_ta' => 'செட்டியார்பட்டி', 'district' => 'Virudhunagar'],
            ['name_en' => 'Kariapatti', 'name_ta' => 'காரியாபட்டி', 'district' => 'Virudhunagar'],
            ['name_en' => 'Mallankinaru', 'name_ta' => 'மல்லாங்கிணறு', 'district' => 'Virudhunagar'],
            ['name_en' => 'Mamsapuram', 'name_ta' => 'மாம்சாபுரம்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Seithur', 'name_ta' => 'சேத்தூர்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Sundarapandiam', 'name_ta' => 'சுந்தரபாண்டியம்', 'district' => 'Virudhunagar'],
            ['name_en' => 'Tayilupatti', 'name_ta' => 'தாயில்பட்டி', 'district' => 'Virudhunagar'],
            ['name_en' => 'Vathirairuppu', 'name_ta' => 'வத்திராயிருப்பு', 'district' => 'Virudhunagar'],
            ['name_en' => 'V. Pudupatti', 'name_ta' => 'வே. புதுப்பட்டி', 'district' => 'Virudhunagar'],

        ];

        // --- Prepare data for insertion ---
        $dataToInsert = [];
        $insertedCount = 0;
        foreach ($perurs as $perur) {
            // Find the district_id from the map
            $districtId = $districtMap[$perur['district']] ?? null;

            // Only add if district_id was found
            if ($districtId) {
                $dataToInsert[] = [
                    'district_id' => $districtId,
                    'name_en'     => $perur['name_en'],
                    'name_ta'     => $perur['name_ta'],
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ];
                $insertedCount++;
            } else {
                // Notify user if a district name was misspelled or missing
                $this->command->warn("Could not find district ID for district: " . $perur['district'] . " (Peruratchi: " . $perur['name_en'] . ")");
            }
        }

        // Clear the table before seeding
        DB::table($targetTable)->delete();

        // Insert all data in chunks for better performance
        foreach (array_chunk($dataToInsert, 100) as $chunk) {
            DB::table($targetTable)->insert($chunk);
        }

        $this->command->info("Seeded {$insertedCount} records into the '{$targetTable}' table.");
    }
}