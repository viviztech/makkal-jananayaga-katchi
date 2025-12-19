<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubbodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the current time to use for timestamps
        $now = Carbon::now();

        // Clear the table first to avoid duplicate entries on re-seed
        DB::table('subbodies')->delete();

        DB::table('subbodies')->insert([
            [
                'id' => 1,
                'postingstage_id' => 3,
                'name_ta' => 'மகளிர் விடுதலை இயக்கம்',
                'name_en' => 'Women\'s Liberation Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 2,
                'postingstage_id' => 3,
                'name_ta' => 'இளஞ்சிறுத்தைகள் எழுச்சி பாசறை',
                'name_en' => 'Young Panthers Uprising Brigade',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 3,
                'postingstage_id' => 3,
                'name_ta' => 'சமூக ஊடகம்',
                'name_en' => 'Social Media',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 4,
                'postingstage_id' => 3,
                'name_ta' => 'முற்போக்கு மாணவர் கழகம்',
                'name_en' => 'Progressive Student Federation',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 5,
                'postingstage_id' => 3,
                'name_ta' => 'தொண்டர் அணி - பயிற்சி',
                'name_en' => 'Volunteer Wing - Training',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 6,
                'postingstage_id' => 3,
                'name_ta' => 'தொண்டர் அணி - பாதுகாப்பு',
                'name_en' => 'Volunteer Wing - Security',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 7,
                'postingstage_id' => 3,
                'name_ta' => 'தொழிலாளர் விடுதலை முன்னணி (அமைப்புசார்)',
                'name_en' => 'Labour Liberation Front (Organized)',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 8,
                'postingstage_id' => 3,
                'name_ta' => 'தொழிலாளர் விடுதலை முன்னணி (அமைப்புசாரா)',
                'name_en' => 'Labour Liberation Front (Unorganized)',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 9,
                'postingstage_id' => 3,
                'name_ta' => 'சமத்துவ வழக்கறிஞர்கள் சங்கம்',
                'name_en' => 'Equality Lawyers Association',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 10,
                'postingstage_id' => 3,
                'name_ta' => 'விவசாயத் தொழிலாளர் விடுதலை இயக்கம்',
                'name_en' => 'Agricultural Labourers Liberation Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 11,
                'postingstage_id' => 3,
                'name_ta' => 'விவசாயிகள் பாதுகாப்பு இயக்கம்',
                'name_en' => 'Farmers Protection Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 12,
                'postingstage_id' => 3,
                'name_ta' => 'கல்வி பொருளாதார விழிப்புணர்வு இயக்கம்',
                'name_en' => 'Education & Economic Awareness Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 13,
                'postingstage_id' => 3,
                'name_ta' => 'இஸ்லாமிய சனநாயக பேரவை',
                'name_en' => 'Islamic Democratic Forum',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 14,
                'postingstage_id' => 3,
                'name_ta' => 'கிருத்துவ சமூக நீதிப் பேரவை',
                'name_en' => 'Christian Social Justice Forum',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 15,
                'postingstage_id' => 3,
                'name_ta' => 'விடுதலை கலை இலக்கியப் பேரவை',
                'name_en' => 'Liberation Arts & Literature Forum',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 16,
                'postingstage_id' => 3,
                'name_ta' => 'சமூக நல்லிணக்க பேரவை',
                'name_en' => 'Social Harmony Forum',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 17,
                'postingstage_id' => 3,
                'name_ta' => 'பொறியாளர் அணி',
                'name_en' => 'Engineers Wing',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 18,
                'postingstage_id' => 3,
                'name_ta' => 'வணிகர் அணி',
                'name_en' => 'Traders Wing',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 19,
                'postingstage_id' => 3,
                'name_ta' => 'ஓவியர் அணி',
                'name_en' => 'Artists Wing',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 20,
                'postingstage_id' => 3,
                'name_ta' => 'நில உரிமை மீட்பு இயக்கம்',
                'name_en' => 'Land Rights Retrieval Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 21,
                'postingstage_id' => 3,
                'name_ta' => 'மருத்துவ தொண்டு மையம்',
                'name_en' => 'Medical Service Center',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 22,
                'postingstage_id' => 3,
                'name_ta' => 'பழங்குடியினர் விடுதலை இயக்கம்',
                'name_en' => 'Tribal Liberation Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 23,
                'postingstage_id' => 3,
                'name_ta' => 'ஆவண மையம்',
                'name_en' => 'Documentation Center',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 24,
                'postingstage_id' => 3,
                'name_ta' => 'அச்சு ஊடக மையம்',
                'name_en' => 'Print Media Center',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 25,
                'postingstage_id' => 3,
                'name_ta' => 'காட்சி ஊடக மையம்',
                'name_en' => 'Visual Media Center',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 26,
                'postingstage_id' => 3,
                'name_ta' => 'அரசு ஊழியர் ஐக்கிய பேரவை',
                'name_en' => 'Government Employees United Forum',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 27,
                'postingstage_id' => 3,
                'name_ta' => 'அனைத்து ஆசிரியர் கூட்டமைப்பு',
                'name_en' => 'All Teachers Federation',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 28,
                'postingstage_id' => 3,
                'name_ta' => 'மீனவர் மேம்பாட்டு பேராயம்',
                'name_en' => 'Fishermen Development Forum',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 29,
                'postingstage_id' => 3,
                'name_ta' => 'மது போதைப்பொருள் ஒழிப்பு விழிப்புணர்வு இயக்கம்',
                'name_en' => 'Alcohol & Drug Eradication Awareness Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 30,
                'postingstage_id' => 3,
                'name_ta' => 'தூய்மை பணியாளர் மேம்பாட்டு இயக்கம்',
                'name_en' => 'Sanitation Workers Development Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 31,
                'postingstage_id' => 3,
                'name_ta' => 'சுற்றுச்சூழல் பாதுகாப்பு இயக்கம்',
                'name_en' => 'Environmental Protection Movement',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 32,
                'postingstage_id' => 3,
                'name_ta' => 'விளையாட்டுத் திறன் மேம்பாட்டு மையம்',
                'name_en' => 'Sports Talent Development Center',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}