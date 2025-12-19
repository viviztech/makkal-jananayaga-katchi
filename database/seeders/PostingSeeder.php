<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostingSeeder extends Seeder
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
        DB::table('posts')->delete();

        DB::table('posts')->insert([
            [
                'id' => 1,
                'postingstage_id' => 1,
                'name_ta' => 'பொதுச் செயலாளர்',
                'name_en' => 'General Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 2,
                'postingstage_id' => 1,
                'name_ta' => 'முதன்மைச் செயலாளர்',
                'name_en' => 'Principal Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 3,
                'postingstage_id' => 1,
                'name_ta' => 'தலைமை நிலைய செயலாளர்',
                'name_en' => 'Headquarters Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 4,
                'postingstage_id' => 1,
                'name_ta' => 'செய்தி தொடர்பாளர்',
                'name_en' => 'Spokesperson',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 5,
                'postingstage_id' => 1,
                'name_ta' => 'கருத்தியல் பரப்புச் செயலாளர்',
                'name_en' => 'Ideological Propaganda Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 6,
                'postingstage_id' => 1,
                'name_ta' => 'அமைப்புச் செயலாளர்',
                'name_en' => 'Organizing Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 7,
                'postingstage_id' => 1,
                'name_ta' => 'துணைப் பொதுச் செயலாளர்',
                'name_en' => 'Deputy General Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 8,
                'postingstage_id' => 1,
                'name_ta' => 'அரசியல் குழுச் செயலாளர்',
                'name_en' => 'Political Committee Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 9,
                'postingstage_id' => 1,
                'name_ta' => 'ஒழுங்கு நடவடிக்கை குழுச் செயலாளர்',
                'name_en' => 'Disciplinary Committee Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 10,
                'postingstage_id' => 1,
                'name_ta' => 'தேர்தல் பணிக்குழுச் செயலாளர்',
                'name_en' => 'Election Working Committee Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 11,
                'postingstage_id' => 1,
                'name_ta' => 'கருத்தியல் பரப்பு துணைச் செயலாளர்',
                'name_en' => 'Deputy Ideological Propaganda Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 12,
                'postingstage_id' => 1,
                'name_ta' => 'ஒழுங்கு நடவடிக்கை துணைச் செயலாளர்',
                'name_en' => 'Deputy Disciplinary Committee Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 13,
                'postingstage_id' => 1,
                'name_ta' => 'மண்டல செயலாளர்',
                'name_en' => 'Zonal Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 14,
                'postingstage_id' => 1,
                'name_ta' => 'மண்டல துணைச் செயலாளர்',
                'name_en' => 'Zonal Deputy Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 15,
                'postingstage_id' => 2,
                'name_ta' => 'மாவட்டச் செயலாளர்',
                'name_en' => 'District Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 16,
                'postingstage_id' => 2,
                'name_ta' => 'மாவட்டப் பொருளாளர்',
                'name_en' => 'District Treasurer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 17,
                'postingstage_id' => 2,
                'name_ta' => 'மாவட்ட செய்தி தொடர்பாளர்',
                'name_en' => 'District Spokesperson',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 18,
                'postingstage_id' => 2,
                'name_ta' => 'மாவட்டத் துணைச் செயலாளர்',
                'name_en' => 'District Deputy Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 19,
                'postingstage_id' => 2,
                'name_ta' => 'மாவட்ட நிர்வாக குழு உறுப்பினர்',
                'name_en' => 'District Administrative Committee Member',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 20,
                'postingstage_id' => 3,
                'name_ta' => 'மாநிலச் செயலாளர்',
                'name_en' => 'State Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 21,
                'postingstage_id' => 3,
                'name_ta' => 'மாநிலத் துணைச் செயலாளர்',
                'name_en' => 'State Deputy Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 22,
                'postingstage_id' => 3,
                'name_ta' => 'மாவட்ட அமைப்பாளர்',
                'name_en' => 'District Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 23,
                'postingstage_id' => 3,
                'name_ta' => 'மாவட்ட துணை அமைப்பாளர்',
                'name_en' => 'District Deputy Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 24,
                'postingstage_id' => 3,
                'name_ta' => 'ஒன்றிய அமைப்பாளர்',
                'name_en' => 'Union Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 25,
                'postingstage_id' => 3,
                'name_ta' => 'ஒன்றிய துணை அமைப்பாளர்',
                'name_en' => 'Union Deputy Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 26,
                'postingstage_id' => 3,
                'name_ta' => 'நகர அமைப்பாளர்',
                'name_en' => 'City Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 27,
                'postingstage_id' => 3,
                'name_ta' => 'நகரத் துணை அமைப்பாளர்',
                'name_en' => 'City Deputy Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 28,
                'postingstage_id' => 3,
                'name_ta' => 'பேரூர் அமைப்பாளர்',
                'name_en' => 'Town Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 29,
                'postingstage_id' => 3,
                'name_ta' => 'பேரூர் துணை அமைப்பாளர்',
                'name_en' => 'Town Deputy Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 30,
                'postingstage_id' => 3,
                'name_ta' => 'பகுதி அமைப்பாளர்',
                'name_en' => 'Area Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 31,
                'postingstage_id' => 3,
                'name_ta' => 'பகுதி துணை அமைப்பாளர்',
                'name_en' => 'Area Deputy Organizer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 32,
                'postingstage_id' => 4,
                'name_ta' => 'ஒன்றிய செயலாளர்',
                'name_en' => 'Union Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 33,
                'postingstage_id' => 4,
                'name_ta' => 'ஒன்றிய பொருளாளர்',
                'name_en' => 'Union Treasurer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 34,
                'postingstage_id' => 4,
                'name_ta' => 'ஒன்றிய துணைச் செயலாளர்',
                'name_en' => 'Union Deputy Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 35,
                'postingstage_id' => 5,
                'name_ta' => 'நகரச் செயலாளர்',
                'name_en' => 'City Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 36,
                'postingstage_id' => 5,
                'name_ta' => 'நகரப் பொருளாளர்',
                'name_en' => 'City Treasurer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 37,
                'postingstage_id' => 5,
                'name_ta' => 'நகர துணைச் செயலாளர்',
                'name_en' => 'City Deputy Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 38,
                'postingstage_id' => 6,
                'name_ta' => 'பேரூர் செயலாளர்',
                'name_en' => 'Town Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 39,
                'postingstage_id' => 6,
                'name_ta' => 'பேரூர் பொருளாளர்',
                'name_en' => 'Town Treasurer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 40,
                'postingstage_id' => 6,
                'name_ta' => 'பேரூர் துணைச் செயலாளர்',
                'name_en' => 'Town Deputy Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 41,
                'postingstage_id' => 7,
                'name_ta' => 'பகுதிச் செயலாளர்',
                'name_en' => 'Area Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 42,
                'postingstage_id' => 7,
                'name_ta' => 'பகுதி பொருளாளர்',
                'name_en' => 'Area Treasurer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 43,
                'postingstage_id' => 7,
                'name_ta' => 'பகுதி துணைச் செயலாளர்',
                'name_en' => 'Area Deputy Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 44,
                'postingstage_id' => 8,
                'name_ta' => 'வட்டச் செயலாளர்',
                'name_en' => 'Circle Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 45,
                'postingstage_id' => 8,
                'name_ta' => 'வட்டப் பொருளாளர்',
                'name_en' => 'Circle Treasurer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 46,
                'postingstage_id' => 8,
                'name_ta' => 'வட்ட துணைச் செயலாளர்',
                'name_en' => 'Circle Deputy Secretary',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 47,
                'postingstage_id' => 1,
                'name_ta' => 'மாநிலப் பொருளாளர்',
                'name_en' => 'State Treasurer',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}