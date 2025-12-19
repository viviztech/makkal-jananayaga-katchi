<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Member;
use App\Models\Book;
use App\Models\Application;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\State;
use App\Models\District;
use App\Models\Assembly;
use App\Models\Block;
use App\Models\City;
use App\Models\Corporation;
use App\Models\Perur;
use App\Models\Paguthi;
use App\Models\Vattam;
use App\Models\Postingstage;
use App\Models\Subbody;
use App\Models\Post;
use App\Models\Bearer;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\JoinRequest;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\DonationRequest;
use App\Mail\ContactMail;
use App\Services\Fast2SMSService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PageController extends Controller
{
    // public function home()
    // {
    //     return view('pages.index');
    // }

    public function home()
    {
        // Cache the home page data for 5 minutes to reduce database load
        $cacheKey = 'home_page_data_' . app()->getLocale();
        
        $data = cache()->remember($cacheKey, 300, function () {
            // Optimize queries: select only needed columns and eager load relationships
            $selectFields = ['id', 'category_id', 'title_ta', 'title_en', 'slug', 'content_ta', 'content_en', 'featured_image', 'event_date', 'video_link'];
            
            $latest_news = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 3)
                ->take(6)
                ->get();
            
            $press_releases = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 1)
                ->take(6)
                ->get();
            
            $events = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 2)
                ->take(6)
                ->get();
            
            $pressMeetGallery = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 10)
                ->take(5)
                ->get();
            
            $kalathiGallery = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 7)
                ->take(9)
                ->get();
            
            $velichamTvGallery = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 9)
                ->take(5)
                ->get();
            
            $lives = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 8)
                ->take(9)
                ->get();
            
            $videoGallery = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 6)
                ->take(5)
                ->get();
            
            $gallery = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 5)
                ->take(6)
                ->get();
            
            // Fetch latest 10 posts for "LATEST EVENTS" section
            $latestEvents = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->take(10)
                ->get();

            // Fetch latest Party News
            $partyNews = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->whereHas('category', function ($q) {
                    $q->where('name_en', 'Latest News');
                })
                ->take(8)
                ->get();

            // Fetch Exclusive Interviews (category_id 4) - first one featured, rest in sidebar
            $exclusiveInterviews = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 4)
                ->whereNotNull('video_link')
                ->take(5)
                ->get();

            // Fetch Quotes (category_id 12) - last 5 quotes
            $quotes = Media::select($selectFields)
                ->with('category:id,name_ta,name_en')
                ->orderBy('event_date', 'desc')
                ->where('category_id', 12)
                ->take(5)
                ->get();

            return compact('latest_news', 'press_releases', 'events', 'pressMeetGallery', 'kalathiGallery', 'velichamTvGallery', 'lives', 'videoGallery', 'gallery', 'latestEvents', 'partyNews', 'exclusiveInterviews', 'quotes');
        });

        return view('pages.home', $data);
    }

    public function ideology()
    {
        return view('pages.ideology'); // Create this similarly
    }

    public function history()
    {
        return view('pages.history');
    }

    public function showMedia($media)
    {
        $mediaItem = Media::where('slug', $media)->firstOrFail();
        
        // Sidebar data
        $latestNews = Media::orderBy('event_date', 'desc')
            ->where('category_id', 3)
            ->where('id', '!=', $mediaItem->id)
            ->take(5)
            ->get();
        
        $latestEvents = Media::orderBy('event_date', 'desc')
            ->where('category_id', 2)
            ->where('id', '!=', $mediaItem->id)
            ->take(5)
            ->get();
        
        $latestVideos = Media::orderBy('event_date', 'desc')
            ->where('category_id', 6)
            ->where('id', '!=', $mediaItem->id)
            ->take(5)
            ->get();
        
        $pressReleases = Media::orderBy('event_date', 'desc')
            ->where('category_id', 1)
            ->where('id', '!=', $mediaItem->id)
            ->take(5)
            ->get();
        
        return view('pages.media', compact('mediaItem', 'latestNews', 'latestEvents', 'latestVideos', 'pressReleases'));
    }

    public function latest_news()
    {
        $latest_news = Media::orderBy('event_date', 'desc')->where('category_id', 3)->paginate(12);
        
        // Sidebar data
        $latestEvents = Media::orderBy('event_date', 'desc')
            ->where('category_id', 2)
            ->take(5)
            ->get();
        
        $latestVideos = Media::orderBy('event_date', 'desc')
            ->where('category_id', 6)
            ->take(5)
            ->get();
        
        $pressReleases = Media::orderBy('event_date', 'desc')
            ->where('category_id', 1)
            ->take(5)
            ->get();
        
        $gallery = Media::orderBy('event_date', 'desc')
            ->where('category_id', 5)
            ->take(5)
            ->get();
        
        return view('pages.latest-news', compact('latest_news', 'latestEvents', 'latestVideos', 'pressReleases', 'gallery'));
    }

    public function pressReleases()
    {
        $press_releases = Media::orderBy('event_date', 'desc')->where('category_id', 1)->paginate(12);
        
        // Sidebar data
        $latestNews = Media::orderBy('event_date', 'desc')
            ->where('category_id', 3)
            ->take(5)
            ->get();
        
        $latestEvents = Media::orderBy('event_date', 'desc')
            ->where('category_id', 2)
            ->take(5)
            ->get();
        
        $latestVideos = Media::orderBy('event_date', 'desc')
            ->where('category_id', 6)
            ->take(5)
            ->get();
        
        $gallery = Media::orderBy('event_date', 'desc')
            ->where('category_id', 5)
            ->take(5)
            ->get();
        
        return view('pages.press-releases', compact('press_releases', 'latestNews', 'latestEvents', 'latestVideos', 'gallery'));
    }

    public function events()
    {
        $events = Media::orderBy('event_date', 'desc')->where('category_id', 2)->paginate(12);
        
        // Sidebar data
        $latestNews = Media::orderBy('event_date', 'desc')
            ->where('category_id', 3)
            ->take(5)
            ->get();
        
        $latestVideos = Media::orderBy('event_date', 'desc')
            ->where('category_id', 6)
            ->take(5)
            ->get();
        
        $pressReleases = Media::orderBy('event_date', 'desc')
            ->where('category_id', 1)
            ->take(5)
            ->get();
        
        $gallery = Media::orderBy('event_date', 'desc')
            ->where('category_id', 5)
            ->take(5)
            ->get();
        
        return view('pages.events', compact('events', 'latestNews', 'latestVideos', 'pressReleases', 'gallery'));
    }

    public function gallery()
    {
        $gallery = Media::orderBy('event_date', 'desc')->where('category_id', 5)->paginate(12);
        
        // Sidebar data
        $latestNews = Media::orderBy('event_date', 'desc')
            ->where('category_id', 3)
            ->take(5)
            ->get();
        
        $latestEvents = Media::orderBy('event_date', 'desc')
            ->where('category_id', 2)
            ->take(5)
            ->get();
        
        $latestVideos = Media::orderBy('event_date', 'desc')
            ->where('category_id', 6)
            ->take(5)
            ->get();
        
        $pressReleases = Media::orderBy('event_date', 'desc')
            ->where('category_id', 1)
            ->take(5)
            ->get();
        
        return view('pages.gallery', compact('gallery', 'latestNews', 'latestEvents', 'latestVideos', 'pressReleases'));
    }

    public function videos()
    {
        $videos = Media::orderBy('event_date', 'desc')->where('category_id', 6)->paginate(12);
        
        // Sidebar data
        $latestNews = Media::orderBy('event_date', 'desc')
            ->where('category_id', 3)
            ->take(5)
            ->get();
        
        $latestEvents = Media::orderBy('event_date', 'desc')
            ->where('category_id', 2)
            ->take(5)
            ->get();
        
        $pressReleases = Media::orderBy('event_date', 'desc')
            ->where('category_id', 1)
            ->take(5)
            ->get();
        
        $gallery = Media::orderBy('event_date', 'desc')
            ->where('category_id', 5)
            ->take(5)
            ->get();
        
        return view('pages.videos', compact('videos', 'latestNews', 'latestEvents', 'pressReleases', 'gallery'));
    }

    public function interviews()
    {
        $interviews = Media::orderBy('event_date', 'desc')->where('category_id', 4)->paginate(12);
        
        // Sidebar data
        $latestNews = Media::orderBy('event_date', 'desc')
            ->where('category_id', 3)
            ->take(5)
            ->get();
        
        $latestEvents = Media::orderBy('event_date', 'desc')
            ->where('category_id', 2)
            ->take(5)
            ->get();
        
        $latestVideos = Media::orderBy('event_date', 'desc')
            ->where('category_id', 6)
            ->take(5)
            ->get();
        
        $pressReleases = Media::orderBy('event_date', 'desc')
            ->where('category_id', 1)
            ->take(5)
            ->get();
        
        return view('pages.interviews', compact('interviews', 'latestNews', 'latestEvents', 'latestVideos', 'pressReleases'));
    }

    public function kalaththilSiruthaigal()
    {
        $kalams = Media::orderBy('event_date', 'desc')->where('category_id', 7)->paginate(12);
        
        // Sidebar data
        $latestNews = Media::orderBy('event_date', 'desc')
            ->where('category_id', 3)
            ->take(5)
            ->get();
        
        $latestEvents = Media::orderBy('event_date', 'desc')
            ->where('category_id', 2)
            ->take(5)
            ->get();
        
        $latestVideos = Media::orderBy('event_date', 'desc')
            ->where('category_id', 6)
            ->take(5)
            ->get();
        
        $pressReleases = Media::orderBy('event_date', 'desc')
            ->where('category_id', 1)
            ->take(5)
            ->get();
        
        return view('pages.kalaththil-siruthaigal', compact('kalams', 'latestNews', 'latestEvents', 'latestVideos', 'pressReleases'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactStore(ContactRequest $request)
    {
        $validated = $request->validated();

        try {
            // Save contact to database
            Contact::create($validated);

            // Send email to info@viduthalaichiruthaigal.com
            Mail::to('info@viduthalaichiruthaigal.com')->send(new ContactMail($validated));

            return redirect()->back()->with('success', __('site.contact.message_sent'));
        } catch (\Exception $e) {
            // Log the error and show user-friendly message
            \Log::error('Contact form email failed: ' . $e->getMessage());

            return redirect()->back()->with('error', __('site.contact.message_failed'))->withInput();
        }
    }

    public function leadership()
    {
        // Fetch bearers for specific leadership positions:
        // General Secretary (1), Deputy General Secretary (7), Headquarters Secretary (3)
        $leadershipPosts = [1, 3, 7];
        
        $bearers = Bearer::with(['post', 'assembly'])
            ->whereIn('post_id', $leadershipPosts)
            ->orderByRaw('FIELD(post_id, 1, 7, 3)') // Order: General Secretary (1), Deputy General Secretary (7), Headquarters Secretary (3)
            ->get();

        // Group bearers by post_id for organized display
        $bearersByPost = $bearers->groupBy('post_id');

        return view('pages.leadership', compact('bearers', 'bearersByPost'));
    }

    public function electedMembers()
    {
        return view('pages.elected-members');
    }

    public function officeBearers()
    {
        // Fetch all bearers with their post and assembly relationships
        // Exclude post_ids 1 (General Secretary), 3 (Headquarters Secretary), and 7 (Deputy General Secretary)
        $excludedPosts = [1, 3, 7];
        
        $bearers = Bearer::with(['post', 'assembly'])
            ->whereNotIn('post_id', $excludedPosts)
            ->orderBy('post_id')
            ->get();

        // Group bearers by post_id
        $bearersByPost = $bearers->groupBy('post_id');

        // Get all posts that have bearers for display, excluding district-level posts (postingstage_id = 2) and excluded posts
        $posts = Post::whereHas('bearers')
            ->where('postingstage_id', '!=', 2) // Exclude district-level posts
            ->whereNotIn('id', $excludedPosts) // Exclude General Secretary, Headquarters Secretary, Deputy General Secretary
            ->with('bearers')
            ->orderBy('name_en')
            ->get();

        return view('pages.office-bearers', compact('bearersByPost', 'posts'));
    }

    public function partyRepresentatives()
    {
        // Fetch bearers with post_id = 15 (Party Representatives)
        $representatives = Bearer::with(['post', 'assembly'])
            ->where('post_id', 15)
            ->get();

        // Get the post information for the title
        $post = Post::find(15);

        // District Representatives data
        $districtRepresentatives = [
            ['district' => 'வடசென்னை கிழக்கு', 'name' => 'சி.சவுந்தர்'],
            ['district' => 'வடசென்னை மேற்கு', 'name' => 'உஷாராணி'],
            ['district' => 'வடசென்னை வடக்கு', 'name' => 'இளங்கோவன்'],
            ['district' => 'வடசென்னை தெற்கு', 'name' => 'அப்புன்'],
            ['district' => 'மையசென்னை கிழக்கு', 'name' => 'சாரநாத்'],
            ['district' => 'மையசென்னை மேற்கு', 'name' => 'வேலுமணி'],
            ['district' => 'மையசென்னை வடக்கு', 'name' => 'சேத்துப்பட்டு இளங்கோ'],
            ['district' => 'தென்சென்னை மையம்', 'name' => 'சைதை ஜேக்கப்'],
            ['district' => 'தென்சென்னை வடக்கு', 'name' => 'கரிகால் வளவன்'],
            ['district' => 'தென்சென்னை தெற்கு', 'name' => 'இளையா'],
            ['district' => 'மேற்கு சென்னை', 'name' => 'ஞான முதல்வன்'],
            ['district' => 'திருவள்ளூர் கிழக்கு', 'name' => 'நீலமேகம்'],
            ['district' => 'திருவள்ளூர் மேற்கு', 'name' => 'தளபதி சுந்தர்'],
            ['district' => 'திருவள்ளூர் மையம்', 'name' => 'அருண் கவுதம்'],
            ['district' => 'வேலுர் கிழக்கு', 'name' => 'கோவேந்தன்'],
            ['district' => 'வேலூர் மாநகர்', 'name' => 'பிலிப்'],
            ['district' => 'வேலுர் மேற்கு', 'name' => 'சுதாகர்'],
            ['district' => 'திருப்பத்தூர்', 'name' => 'வெற்றி கொண்டான்'],
            ['district' => 'திருப்பத்தூர் வடக்கு', 'name' => 'ஓம்பிரகாசம்'],
            ['district' => 'செங்கல்பட்டு மையம்', 'name' => 'கானல் விழி'],
            ['district' => 'செங்கல்பட்டு மேற்கு', 'name' => 'பொன்னிவளவன்'],
            ['district' => 'செங்கல்பட்டு வடக்கு', 'name' => 'தென்னவன்'],
            ['district' => 'செங்கல்பட்டு தெற்கு', 'name' => 'தமிழினி'],
            ['district' => 'ஆவடி மாநகர்', 'name' => 'ஆதவன்'],
            ['district' => 'காஞ்சிபுரம் மாநகர்', 'name' => 'மதி ஆதவன்'],
            ['district' => 'ஓசூர் மாநகர்', 'name' => 'ராமச்சந்திரன்'],
            ['district' => 'கடலூர் மாநகர்', 'name' => 'செந்தில்'],
            ['district' => 'கும்பகோணம் மாநகர்', 'name' => 'ராஜ் குமார்'],
            ['district' => 'தஞ்சாவூர் மாநகர்', 'name' => 'இடிமுரசு இலக்கண்ணன்'],
            ['district' => 'கரூர் மாநகர்', 'name' => 'இளங்கோ'],
            ['district' => 'திண்டுக்கல் மாநகர்', 'name' => 'மைதீன் பாவா'],
            ['district' => 'சிவகாசி மாநகர்', 'name' => 'செல்வன் ஜேசுதாஸ்'],
            ['district' => 'நெல்லை மாநகர்', 'name' => 'முத்துவளவன்'],
            ['district' => 'நாகர்கோவில் மாநகர்', 'name' => 'அப்துல் காலித்'],
            ['district' => 'சேலம் கிழக்கு', 'name' => 'கருப்பையா'],
            ['district' => 'சேலம் மேற்கு', 'name' => 'மேட்டூர் மெய்யழகன்'],
            ['district' => 'சேலம் வடக்கு', 'name' => 'தெய்வானை'],
            ['district' => 'சேலம் மையம்', 'name' => 'காஜமேயிதீண்'],
            ['district' => 'சேலம் தெற்கு', 'name' => 'விந தமிழன்பன்'],
            ['district' => 'ஈரோடு மையம்', 'name' => 'சாதிக்'],
            ['district' => 'ஈரோடு மேற்கு', 'name' => 'தங்கவேல்'],
            ['district' => 'ஈரோடு தெற்கு', 'name' => 'கமலநாதன்'],
            ['district' => 'ஈரோடு வடக்கு', 'name' => 'அந்தியூர் ஈஸ்வரன்'],
            ['district' => 'நாமக்கல் கிழக்கு', 'name' => 'மும்பை அர்ஜூன்'],
            ['district' => 'நாமக்கல் மேற்கு', 'name' => 'முகிலன்'],
            ['district' => 'நாமக்கல் மையம்', 'name' => 'நீலவானத்து நிலவன்'],
            ['district' => 'கோவை கிழக்கு', 'name' => 'ஸ்டீபன்'],
            ['district' => 'கோவை மாநகர் வடக்கு', 'name' => 'குரு'],
            ['district' => 'கோவை மாநகர் தெற்கு', 'name' => 'குமணன்'],
            ['district' => 'கோவை வடக்கு', 'name' => 'குடி மைந்தன்'],
            ['district' => 'கோவை தெற்கு', 'name' => 'அசோக்குமார்'],
            ['district' => 'திருச்சி கிழக்கு', 'name' => 'அன்புசெல்வன்'],
            ['district' => 'திருச்சி தெற்கு', 'name' => 'ஆற்றலரசு'],
            ['district' => 'திருச்சி வடக்கு', 'name' => 'கலைச்செல்வன்'],
            ['district' => 'தஞ்சாவூர் மையம்', 'name' => 'ஜெய்சங்கர்'],
            ['district' => 'தஞ்சாவூர் மேற்கு', 'name' => 'ஜான்பீட்டர்'],
            ['district' => 'தஞ்சாவூர் தெற்கு', 'name' => 'அரவிந்த்குமார்'],
            ['district' => 'தஞ்சாவூர் வடக்கு', 'name' => 'முல்லைவளவன்'],
            ['district' => 'திருப்பூர் மாநகர்', 'name' => 'மூர்த்தி'],
            ['district' => 'திருப்பூர் கிழக்கு', 'name' => 'ஓவியர் மின்னல்'],
            ['district' => 'திருப்பூர் தெற்கு', 'name' => 'சதிஷ்குமார்'],
            ['district' => 'திருப்பூர் வடக்கு', 'name' => 'சண்முகம்'],
            ['district' => 'மதுரை கிழக்கு', 'name' => 'முத்துப் பாண்டியன்'],
            ['district' => 'மதுரை மேற்கு', 'name' => 'சிந்தனைவளவன்'],
            ['district' => 'மதுரை தெற்கு', 'name' => 'காளிமுத்து'],
            ['district' => 'மதுரை மாநகர் தெற்கு', 'name' => 'ரவிக்குமார்'],
            ['district' => 'மதுரை மாநகர் வடக்கு', 'name' => 'சுடர்மொழி'],
            ['district' => 'தேனி கிழக்கு', 'name' => 'ரபிக் முகமது'],
            ['district' => 'தேனி மேற்கு', 'name' => 'போடி மதன்'],
            ['district' => 'திண்டுக்கல் மையம்', 'name' => 'தமிழரசன்'],
            ['district' => 'திண்டுக்கல் மேற்கு', 'name' => 'கணபதி'],
            ['district' => 'திண்டுக்கல் கிழக்கு', 'name' => 'தமிழ்முகம்'],
            ['district' => 'தூத்துக்குடி தெற்கு', 'name' => 'டிலைட்டா'],
            ['district' => 'தூத்துக்குடி மையம்', 'name' => 'கணேசன்'],
            ['district' => 'தூத்துக் குடி வடக்கு', 'name' => 'முருகன்'],
            ['district' => 'நெல்லை தெற்கு', 'name' => 'அருட் செல்வன்'],
            ['district' => 'நெல்லை மேற்கு', 'name' => 'எப்.சி.சேகர்'],
            ['district' => 'கன்னியாகுமரி மையம்', 'name' => 'மேசியா'],
            ['district' => 'கன்னியாகுமரி மேற்கு', 'name' => 'தேவகி'],
            ['district' => 'கன்னியாகுமரி கிழக்கு', 'name' => 'பேரறிவாளன்'],
            ['district' => 'தாம்பரம் மாநகர் வடக்கு', 'name' => 'திருநீர்மலை தமிழ ரசன்'],
            ['district' => 'தாம்பரம் மாநகர் தெற்கு', 'name' => 'சாமுவேல்'],
            ['district' => 'சேலம் மாநகர் வடக்கு', 'name' => 'காஜா மைதீன்'],
            ['district' => 'சேலம் மாநகர் தெற்கு', 'name' => 'மொழியரசு'],
            ['district' => 'திருச்சி மாநகர் மேற்கு', 'name' => 'புல்லட் லாரன்ஸ்'],
            ['district' => 'திருச்சி மாநகர் கிழக்கு', 'name' => 'கனியமுதன்'],
            ['district' => 'சிவகங்கை தெற்கு', 'name' => 'பாலையா'],
            ['district' => 'ராமநாதபுரம் கிழக்கு', 'name' => 'அற்புதகுமார்'],
            ['district' => 'ராமநாதபுரம் மேற்கு', 'name' => 'பிரபாகர்'],
            ['district' => 'விருதுநகர் கிழக்கு', 'name' => 'இனியவன்'],
            ['district' => 'விருதுநகர் மேற்கு', 'name' => 'பிரியதர்ஷினி'],
            ['district' => 'விருதுநகர் மையம்', 'name' => 'சாத்தூர் சந்திரன்'],
            ['district' => 'காஞ்சிபுரம் வடக்கு', 'name' => 'மேனகா தேவி கோமகன்'],
            ['district' => 'காஞ்சிபுரம் தெற்கு', 'name' => 'எழிலரசு'],
            ['district' => 'மயிலாடுதுறை வடக்கு', 'name' => 'இனியவன்'],
            ['district' => 'மயிலாடுதுறை தெற்கு', 'name' => 'மோகன்குமார்'],
            ['district' => 'நாகப்பட்டினம் வடக்கு', 'name' => 'அருட் செல்வன்'],
            ['district' => 'நாகப்பட்டினம் தெற்கு', 'name' => 'செல்வராஜ்'],
            ['district' => 'கடலூர் மாநகர் மாவட்ட செயலாளர்', 'name' => 'மு.செந்தில்'],
            ['district' => 'கடலூர் வடக்கு', 'name' => 'அறிவுடை நம்பி'],
            ['district' => 'கடலூர் மையம்', 'name' => 'நீதிவள்ளல்'],
            ['district' => 'கடலூர் மேற்கு', 'name' => 'திராவிடமணி'],
            ['district' => 'கடலூர் தெற்கு', 'name' => 'மணவாளன்'],
            ['district' => 'கடலூர் கிழக்கு', 'name' => 'அரங்க-தமிழ் ஒளி'],
            ['district' => 'பெரம்பலூர் மேற்கு', 'name' => 'ரத்தின வேல்'],
            ['district' => 'பெரம்பலூர் கிழக்கு', 'name' => 'கலையரசன்'],
            ['district' => 'தென்காசி தெற்கு', 'name' => 'பன்புலி செல்வம்'],
            ['district' => 'தென்காசி வடக்கு', 'name' => 'John Thamos'],
            ['district' => 'ராணிபேட்டை', 'name' => 'Ramesh Karna'],
            ['district' => 'ஆற்காடு', 'name' => 'Prabu'],
            ['district' => 'கள்ளகுறிச்சி( சங்கராபுரம்)', 'name' => 'வேல் பழனி அம்மா'],
            ['district' => 'மூணார்', 'name' => 'ஜெயபால்'],
        ];

        return view('pages.party-representatives', compact('representatives', 'post', 'districtRepresentatives'));
    }

    public function partyWings()
    {
        // Fetch all subbodies (party wings) with their postingstage
        $locale = app()->getLocale();
        $nameField = $locale === 'ta' ? 'name_ta' : 'name_en';
        
        $partyWings = Subbody::with('postingstage')
            ->orderBy($nameField, 'asc')
            ->get();

        return view('pages.party-wings', compact('partyWings'));
    }

    public function join()
    {
        $postingstages = Postingstage::orderBy('name_en')->get();
        return view('pages.join', compact('postingstages'));
    }

    public function joinStore(JoinRequest $request)
    {
        // Security Check 1: Honeypot validation - if filled, it's a bot
        if ($request->filled('website')) {
            \Log::warning('Bot submission detected on join form', ['ip' => $request->ip()]);
            abort(422, 'Invalid submission');
        }

        // Security Check 2: Timestamp validation - form should take at least 5 seconds to fill
        $formTimestamp = $request->input('form_timestamp');
        if ($formTimestamp && (time() - $formTimestamp) < 5) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please take your time to fill the form properly.');
        }

        // Security Check 3: Check duplicate email submissions (if email provided)
        if ($request->filled('email_id')) {
            $recentSubmission = Member::where('email_id', $request->email_id)
                ->where('created_at', '>=', now()->subHours(24))
                ->exists();

            if ($recentSubmission) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'A membership with this email was already submitted in the last 24 hours.');
            }
        }

        // Security Check 4: Check duplicate phone submissions
        if ($request->filled('phone_no')) {
            $recentPhoneSubmission = Member::where('phone_no', $request->phone_no)
                ->where('created_at', '>=', now()->subHours(24))
                ->exists();

            if ($recentPhoneSubmission) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'A membership with this phone number was already submitted in the last 24 hours.');
            }
        }

        $validatedData = $request->validated();

        $member = new Member();

        // Assign required and always-present fields
        $member->name = $validatedData['name'];
        $member->phone_no = $validatedData['phone_no'];
        $member->email_id = $validatedData['email_id'];

        // Assign optional fields that are always in the request
        $member->father_name = $validatedData['father_name'] ?? null;
        $member->address = $validatedData['address'] ?? null;
        $member->pincode = $validatedData['pincode'] ?? null;
        $member->dob = $validatedData['dob'] ?? null;
        $member->gender = $validatedData['gender'] ?? null;
        $member->blood_group = $validatedData['blood_group'] ?? null;
        $member->voterid = $validatedData['voterid'] ?? null;
        $member->aadhar_no = $validatedData['aadhar_no'] ?? null;

        // Assign location foreign keys that are not dynamic
        $member->state_id = $validatedData['state_id'] ?? null;
        $member->district_id = $validatedData['district_id'] ?? null;
        $member->assembly_id = $validatedData['assembly_id'] ?? null;
        $member->place_type = $validatedData['place_type'] ?? null;

        // Explicitly handle the dynamic, nullable foreign keys
        if (!empty($validatedData['block_id'])) {
            $member->block_id = $validatedData['block_id'];
        }
        if (!empty($validatedData['city_id'])) {
            $member->city_id = $validatedData['city_id'];
        }
        if (!empty($validatedData['perur_id'])) {
            $member->perur_id = $validatedData['perur_id'];
        }
        if (!empty($validatedData['corporation_id'])) {
            $member->corporation_id = $validatedData['corporation_id'];
        }

        // Generate deterministic membership id using state code + VCK + 5-digit sequence
        $member->member_no = \App\Models\Member::generateMembershipId($member->state_id);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('members/photos', 'public');
            $member->photo = $photoPath;
        }

        $member->save();

        return redirect()->back()->with('success', __('site.join.success_message'));
    }

    public function donation()
    {
        return view('pages.donation');
    }

    public function donationStore(DonationRequest $request)
    {
        try {
            // Create donation record with pending status
            $donation = Donation::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'member_id' => $request->member_id,
                'district_id' => $request->district_id,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'pan_number' => $request->pan_number ? strtoupper($request->pan_number) : null,
                'amount' => $request->amount,
                'payment_status' => 'pending',
            ]);

            // Initialize Razorpay
            $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Create order
            $order = $api->order->create([
                'receipt' => 'donation_' . $donation->id . '_' . time(),
                'amount' => $request->amount * 100, // Razorpay expects amount in paisa
                'currency' => 'INR',
                'notes' => [
                    'donation_id' => $donation->id,
                    'member_id' => $request->member_id ?? '',
                ]
            ]);

            // Update donation with Razorpay order ID
            $donation->update(['razorpay_order_id' => $order->id]);

            return response()->json([
                'order_id' => $order->id,
                'amount' => $order->amount,
                'currency' => $order->currency,
                'donation_id' => $donation->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create donation order: ' . $e->getMessage()
            ], 500);
        }
    }

    public function donationVerify(Request $request)
    {
        try {
            $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Verify signature
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Find donation by order ID and update
            $donation = Donation::where('razorpay_order_id', $request->razorpay_order_id)->first();

            if ($donation) {
                $donation->update([
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature' => $request->razorpay_signature,
                    'payment_status' => 'success',
                ]);

                return response()->json([
                    'success' => true,
                    'donation_id' => $donation->id,
                    'message' => 'Payment verified successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Donation not found'
            ], 404);

        } catch (\Exception $e) {
            // Mark payment as failed
            if (isset($request->razorpay_order_id)) {
                $donation = Donation::where('razorpay_order_id', $request->razorpay_order_id)->first();
                if ($donation) {
                    $donation->update(['payment_status' => 'failed']);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed: ' . $e->getMessage()
            ], 400);
        }
    }

    public function donationSuccess(Request $request)
    {
        $donationId = $request->query('donation_id');
        $donation = Donation::with('district')->findOrFail($donationId);

        if ($donation->payment_status !== 'success') {
            return redirect()->route('donation')->with('error', 'Payment not completed');
        }

        return view('pages.donation-success', compact('donation'));
    }

    public function books()
    {
        $books = Book::active()
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();
        
        // Sidebar data
        $latestNews = Media::orderBy('event_date', 'desc')
            ->where('category_id', 3)
            ->take(5)
            ->get();
        
        $latestEvents = Media::orderBy('event_date', 'desc')
            ->where('category_id', 2)
            ->take(5)
            ->get();
        
        $latestVideos = Media::orderBy('event_date', 'desc')
            ->where('category_id', 6)
            ->take(5)
            ->get();
        
        $pressReleases = Media::orderBy('event_date', 'desc')
            ->where('category_id', 1)
            ->take(5)
            ->get();

        return view('pages.books', compact('books', 'latestNews', 'latestEvents', 'latestVideos', 'pressReleases'));
    }

    public function bookOrder($bookSlug)
    {
        $book = Book::active()->where('slug', $bookSlug)->firstOrFail();
        
        if (!$book->is_available || $book->stock <= 0) {
            return redirect()->route('books')->with('error', 'This book is currently out of stock.');
        }
        
        return view('pages.book-order', compact('book'));
    }

    public function applications()
    {
        return view('pages.applications');
    }

    public function applicationsStore(ApplicationRequest $request)
    {
        // Security Check 1: Honeypot validation - if filled, it's a bot
        if ($request->filled('website')) {
            \Log::warning('Bot submission detected', ['ip' => $request->ip()]);
            abort(422, 'Invalid submission');
        }

        // Security Check 2: Timestamp validation - form should take at least 5 seconds to fill
        $formTimestamp = $request->input('form_timestamp');
        if ($formTimestamp && (time() - $formTimestamp) < 5) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please take your time to fill the form properly.');
        }

        // Security Check 3: Check duplicate application for the same post
        // Allow same person to apply for different posts, but prevent duplicate applications for the same post
        if ($request->filled('post_id')) {
            $duplicateQuery = Application::where('post_id', $request->post_id);

            // Check by email if provided
            if ($request->filled('email_id')) {
                $duplicateByEmail = (clone $duplicateQuery)->where('email_id', $request->email_id)->exists();
                if ($duplicateByEmail) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'You have already applied for this post with this email address.');
                }
            }

            // Check by mobile if provided
            if ($request->filled('mobile_number')) {
                $duplicateByMobile = (clone $duplicateQuery)->where('mobile_number', $request->mobile_number)->exists();
                if ($duplicateByMobile) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'You have already applied for this post with this mobile number.');
                }
            }

            // Check by Aadhar if provided
            if ($request->filled('aadhar_no')) {
                $duplicateByAadhar = (clone $duplicateQuery)->where('aadhar_no', $request->aadhar_no)->exists();
                if ($duplicateByAadhar) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'You have already applied for this post with this Aadhar number.');
                }
            }

            // Check by Voter ID if provided
            if ($request->filled('voterid_no')) {
                $duplicateByVoterId = (clone $duplicateQuery)->where('voterid_no', $request->voterid_no)->exists();
                if ($duplicateByVoterId) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'You have already applied for this post with this Voter ID.');
                }
            }
        }

        $validatedData = $request->validated();

        $application = new Application();

        // Assign all fields
        $application->name = $validatedData['name'];
        $application->father_name = $validatedData['father_name'] ?? null;
        $application->mother_name = $validatedData['mother_name'] ?? null;
        $application->spouse_name = $validatedData['spouse_name'] ?? null;
        $application->dob = $validatedData['dob'] ?? null;
        $application->gender = $validatedData['gender'] ?? null;
        $application->education = $validatedData['education'] ?? null;
        $application->occupation = $validatedData['occupation'] ?? null;
        $application->marital_status = $validatedData['marital_status'] ?? null;
        $application->social_category = $validatedData['social_category'] ?? null;
        $application->joining_date = $validatedData['joining_date'] ?? null;
        $application->current_post = $validatedData['current_post'] ?? null;
        $application->address = $validatedData['address'] ?? null;
        $application->mobile_number = $validatedData['mobile_number'] ?? null;
        $application->email_id = $validatedData['email_id'] ?? null;
        // New identification fields
        $application->membership_id = $validatedData['membership_id'] ?? null;
        $application->aadhar_no = $validatedData['aadhar_no'] ?? null;
        $application->voterid_no = $validatedData['voterid_no'] ?? null;

        // Location foreign keys
        $application->state_id = $validatedData['state_id'] ?? null;
        $application->district_id = $validatedData['district_id'] ?? null;
        $application->assembly_id = $validatedData['assembly_id'] ?? null;
        $application->postingstage_id = $validatedData['postingstage_id'];
        $application->subbody_id = $validatedData['subbody_id'] ?? null;
        $application->post_id = $validatedData['post_id'] ?? null;

        // Conditional location fields based on posting stage
        $application->block_id = $validatedData['block_id'] ?? null;
        $application->city_id = $validatedData['city_id'] ?? null;
        $application->perur_id = $validatedData['perur_id'] ?? null;
        $application->paguthi_id = $validatedData['paguthi_id'] ?? null;
        $application->vattam_id = $validatedData['vattam_id'] ?? null;
        $application->corporation_id = $validatedData['corporation_id'] ?? null;

        // Store selected names for reference
        if ($application->postingstage_id) {
            $postingstage = Postingstage::find($application->postingstage_id);
            $application->selected_postingstage = $postingstage ? $postingstage->name_en : null;
        }

        if ($application->subbody_id) {
            $subbody = Subbody::find($application->subbody_id);
            $application->selected_subbody = $subbody ? $subbody->name_en : null;
        }

        if ($application->post_id) {
            $post = Post::find($application->post_id);
            $application->selected_post = $post ? $post->name_en : null;
        }

        // Set default status as Pending and workflow status as draft
        $application->status = 'Pending';
        $application->workflow_status = 'draft';
        $application->application_fee = 500.00; // Default application fee

        // Handle document upload
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('applications/documents', 'public');
            $application->document = $documentPath;
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('applications/photos', 'public');
            $application->photo = $photoPath;
        }

        $application->save();

        // Redirect to preview page instead of showing success message
        return redirect()->route('applications.preview', $application->id);
    }

    public function applicationsPreview($id)
    {
        $application = Application::with([
            'state',
            'district',
            'assembly',
            'postingstage',
            'subbody',
            'post',
            'block',
            'city',
            'perur',
            'paguthi',
            'vattam',
            'corporation'
        ])->findOrFail($id);

        return view('pages.applications-preview', compact('application'));
    }

    public function applicationsEdit($id)
    {
        $application = Application::findOrFail($id);

        // Only allow editing if not yet completed
        if ($application->workflow_status === 'completed') {
            return redirect()->route('applications.success', $id)
                ->with('error', 'This application has already been completed and cannot be edited.');
        }

        return view('pages.applications-edit', compact('application'));
    }

    public function applicationsUpdate(ApplicationRequest $request, $id)
    {
        $application = Application::findOrFail($id);

        // Only allow updating if not yet completed
        if ($application->workflow_status === 'completed') {
            return redirect()->route('applications.success', $id)
                ->with('error', 'This application has already been completed and cannot be edited.');
        }

        $validatedData = $request->validated();

        // Update all fields
        $application->name = $validatedData['name'];
        $application->father_name = $validatedData['father_name'] ?? null;
        $application->mother_name = $validatedData['mother_name'] ?? null;
        $application->spouse_name = $validatedData['spouse_name'] ?? null;
        $application->dob = $validatedData['dob'] ?? null;
        $application->gender = $validatedData['gender'] ?? null;
        $application->education = $validatedData['education'] ?? null;
        $application->occupation = $validatedData['occupation'] ?? null;
        $application->marital_status = $validatedData['marital_status'] ?? null;
        $application->social_category = $validatedData['social_category'] ?? null;
        $application->joining_date = $validatedData['joining_date'] ?? null;
        $application->current_post = $validatedData['current_post'] ?? null;
        $application->address = $validatedData['address'] ?? null;
        $application->mobile_number = $validatedData['mobile_number'] ?? null;
        $application->email_id = $validatedData['email_id'] ?? null;
        $application->membership_id = $validatedData['membership_id'] ?? null;
        $application->aadhar_no = $validatedData['aadhar_no'] ?? null;
        $application->voterid_no = $validatedData['voterid_no'] ?? null;

        // Location foreign keys
        $application->state_id = $validatedData['state_id'] ?? null;
        $application->district_id = $validatedData['district_id'] ?? null;
        $application->assembly_id = $validatedData['assembly_id'] ?? null;
        $application->postingstage_id = $validatedData['postingstage_id'];
        $application->subbody_id = $validatedData['subbody_id'] ?? null;
        $application->post_id = $validatedData['post_id'] ?? null;

        // Conditional location fields
        $application->block_id = $validatedData['block_id'] ?? null;
        $application->city_id = $validatedData['city_id'] ?? null;
        $application->perur_id = $validatedData['perur_id'] ?? null;
        $application->paguthi_id = $validatedData['paguthi_id'] ?? null;
        $application->vattam_id = $validatedData['vattam_id'] ?? null;
        $application->corporation_id = $validatedData['corporation_id'] ?? null;

        // Store selected names for reference
        if ($application->postingstage_id) {
            $postingstage = Postingstage::find($application->postingstage_id);
            $application->selected_postingstage = $postingstage ? $postingstage->name_en : null;
        }

        if ($application->subbody_id) {
            $subbody = Subbody::find($application->subbody_id);
            $application->selected_subbody = $subbody ? $subbody->name_en : null;
        }

        if ($application->post_id) {
            $post = Post::find($application->post_id);
            $application->selected_post = $post ? $post->name_en : null;
        }

        // Handle document upload
        if ($request->hasFile('document')) {
            // Delete old document if exists
            if ($application->document) {
                Storage::disk('public')->delete($application->document);
            }
            $documentPath = $request->file('document')->store('applications/documents', 'public');
            $application->document = $documentPath;
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($application->photo) {
                Storage::disk('public')->delete($application->photo);
            }
            $photoPath = $request->file('photo')->store('applications/photos', 'public');
            $application->photo = $photoPath;
        }

        $application->save();

        return redirect()->route('applications.preview', $application->id)
            ->with('success', 'Application updated successfully!');
    }

    public function applicationsConfirm($id)
    {
        $application = Application::findOrFail($id);

        // Update workflow status to preview
        $application->workflow_status = 'preview';
        $application->save();

        // Redirect to payment page
        return redirect()->route('applications.payment', $application->id);
    }

    public function applicationsPayment($id)
    {
        $application = Application::with([
            'state',
            'district',
            'assembly',
            'postingstage',
            'post'
        ])->findOrFail($id);

        // Update workflow status to payment_pending
        if ($application->workflow_status !== 'completed') {
            $application->workflow_status = 'payment_pending';
            $application->save();
        }

        return view('pages.applications-payment', compact('application'));
    }

    public function applicationsProcessPayment(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $request->validate([
            'payment_method' => 'required|in:online,offline,upi',
            'payment_transaction_id' => 'nullable|string|max:255',
            'razorpay_signature' => 'nullable|string',
            'razorpay_order_id' => 'nullable|string',
        ]);

        // Verify Razorpay payment if online payment
        if ($request->payment_method === 'online' && $request->payment_transaction_id) {
            try {
                $api = new \Razorpay\Api\Api(config('razorpay.key'), config('razorpay.secret'));

                // Fetch payment details from Razorpay
                $payment = $api->payment->fetch($request->payment_transaction_id);

                // Verify payment status
                if ($payment->status !== 'captured' && $payment->status !== 'authorized') {
                    return redirect()->back()->with('error', 'Payment verification failed. Please try again.');
                }

                // Verify payment amount
                $expectedAmount = $application->application_fee * 100; // Convert to paise
                if ($payment->amount != $expectedAmount) {
                    return redirect()->back()->with('error', 'Payment amount mismatch. Please contact support.');
                }

            } catch (\Exception $e) {
                \Log::error('Razorpay Payment Verification Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Payment verification failed: ' . $e->getMessage());
            }
        }

        // Update payment information
        $application->payment_method = $request->payment_method;
        $application->payment_transaction_id = $request->payment_transaction_id;
        $application->payment_status = 'completed';
        $application->payment_completed_at = now();
        $application->workflow_status = 'completed';
        $application->save();

        return redirect()->route('applications.success', $application->id);
    }

    public function applicationsSuccess($id)
    {
        $application = Application::with([
            'state',
            'district',
            'assembly',
            'postingstage',
            'subbody',
            'post',
            'block',
            'city',
            'perur',
            'paguthi',
            'vattam',
            'corporation'
        ])->findOrFail($id);

        return view('pages.applications-success', compact('application'));
    }

    // API methods for dynamic dropdowns
    public function getDistricts($stateId)
    {
        $districts = District::where('state_id', $stateId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($districts);
    }

    public function getAssemblies($districtId)
    {
        $assemblies = Assembly::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($assemblies);
    }

    public function getBlocks($assemblyId)
    {
        return Block::where('assembly_id', $assemblyId)->selectRaw('id, name_en as name')->orderBy('name_en')->get();
    }

    public function getCities($districtId)
    {
        $cities = City::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($cities);
    }

    public function getPerurs($cityId)
    {
        $perurs = Perur::where('city_id', $cityId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($perurs);
    }

    public function getBlocksByDistrict($districtId)
    {
        $blocks = Block::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($blocks);
    }

    public function getPerursByDistrict($districtId)
    {
        $perurs = Perur::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($perurs);
    }

    public function getCitiesByDistrict($districtId)
    {
        $cities = City::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($cities);
    }

    public function getCorporationsByDistrict($districtId)
    {
        $corporations = Corporation::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($corporations);
    }

    public function getPaguthis($perurId)
    {
        $paguthis = Paguthi::where('perur_id', $perurId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($paguthis);
    }

    public function getVattams($paguthiId)
    {
        $vattams = Vattam::where('paguthi_id', $paguthiId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($vattams);
    }

    public function getPaguthisByDistrict($districtId)
    {
        $paguthis = Paguthi::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($paguthis);
    }

    public function getVattamsByDistrict($districtId)
    {
        $vattams = Vattam::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($vattams);
    }

    public function getSubbodiesByPostingstage($postingstageId)
    {
        $subbodies = Subbody::where('postingstage_id', $postingstageId)->select('id', 'name_en', 'name_ta')->orderBy('name_en')->get();
        return response()->json($subbodies);
    }

    public function getPostsByPostingstage($postingstageId)
    {
        $posts = Post::where('postingstage_id', $postingstageId)->select('id', 'name_en', 'name_ta')->orderBy('name_en')->get();
        return response()->json($posts);
    }

    /**
     * Send OTP to phone number
     */
    public function sendOTP(Request $request)
    {
        $request->validate([
            'phone_number' => [
                'required',
                'string',
                'regex:/^[6-9][0-9]{9}$/',
            ],
        ]);

        $fast2sms = new Fast2SMSService();
        $result = $fast2sms->sendOTP($request->phone_number, $request->ip());

        return response()->json($result, $result['success'] ? 200 : 422);
    }

    /**
     * Verify OTP code
     */
    public function verifyOTP(Request $request)
    {
        $request->validate([
            'phone_number' => [
                'required',
                'string',
                'regex:/^[6-9][0-9]{9}$/',
            ],
            'otp_code' => 'required|string|size:6',
        ]);

        $fast2sms = new Fast2SMSService();
        $result = $fast2sms->verifyOTP($request->phone_number, $request->otp_code);

        return response()->json($result, $result['success'] ? 200 : 422);
    }

}