
@extends('layouts.app')

@section('content')
<!-- Hero Video Player Section -->
  <section class="bg-gradient-to-r from-purple-900 to-blue-900 py-8 px-4">
    <div class="container mx-auto max-w-4xl">
      <div class="relative rounded-lg overflow-hidden shadow-2xl bg-black">
        <!-- <div class="aspect-video relative">
          <img src="https://via.placeholder.com/1200x675?text=PM+Modi+LIVE+RSS+Centenary" alt="Live Video" class="w-full h-full object-cover" />
          <div class="absolute inset-0 flex items-center justify-center">
            <button class="bg-red-600 hover:bg-red-700 p-4 rounded-full text-white text-xl">
              <i class="fas fa-play"></i>
            </button>
          </div>
        </div> -->
        <!-- <div class="p-4 text-white">
          <h2 class="text-xl font-bold mb-2">
            PM Modi LIVE: RSS Centenary Celebrations | राष्ट्रीय स्वयंसेवक संघ शताब्दी समारोह | #RSS100Years
          </h2>
          <div class="flex items-center space-x-4 mt-4">
            <button class="bg-white text-black p-2 rounded-full text-sm"><i class="fab fa-facebook-f"></i></button>
            <button class="bg-white text-black p-2 rounded-full text-sm"><i class="fab fa-twitter"></i></button>
            <button class="bg-white text-black p-2 rounded-full text-sm"><i class="fas fa-share-alt"></i></button>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Tabs: Past Events / Leaders Video -->
  <div class="container mx-auto px-4 mt-10 mb-6">
    <div class="flex border-b border-gray-300">
      <button class="px-6 py-3 font-medium tab-active">Past Events</button>
      <!-- <button class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Leaders Video</button> -->
    </div>
  </div>

  <!-- Video Grid -->
  <section class="container mx-auto px-4 mb-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Video Card 1 -->
      <div class="bg-white rounded-lg shadow video-card transition-all duration-300">
        <div class="relative">
          <img src="https://via.placeholder.com/300x200?text=RSS+Centenary" alt="Video Thumbnail" class="w-full h-48 object-cover rounded-t-lg" />
          <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
            LIVE <i class="fas fa-play ml-1"></i>
          </div>
          <button class="absolute bottom-2 right-2 bg-white text-black p-1 rounded-full text-xs">
            <i class="fas fa-bookmark"></i>
          </button>
          <button class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
            <i class="fas fa-play text-white text-2xl"></i>
          </button>
        </div>
        <div class="p-4">
          <h3 class="font-medium text-gray-800 line-clamp-3">
            PM Modi LIVE: RSS Centenary Celebrations | राष्ट्रीय स्वयंसेवक संघ शताब्दी समारोह | #RSS100Years
          </h3>
          <div class="flex items-center text-xs text-gray-500 mt-2">
            <i class="far fa-clock mr-1"></i> 01-10-2025
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="flex space-x-2">
              <button class="bg-blue-600 text-white p-2 rounded-full text-xs"><i class="fab fa-facebook-f"></i></button>
              <button class="bg-blue-400 text-white p-2 rounded-full text-xs"><i class="fab fa-twitter"></i></button>
              <button class="bg-blue-500 text-white p-2 rounded-full text-xs"><i class="fas fa-share-alt"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card 2 -->
      <div class="bg-white rounded-lg shadow video-card transition-all duration-300">
        <div class="relative">
          <img src="https://via.placeholder.com/300x200?text=Delhi+Office" alt="Video Thumbnail" class="w-full h-48 object-cover rounded-t-lg" />
          <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
            LIVE <i class="fas fa-play ml-1"></i>
          </div>
          <button class="absolute bottom-2 right-2 bg-white text-black p-1 rounded-full text-xs">
            <i class="fas fa-bookmark"></i>
          </button>
          <button class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
            <i class="fas fa-play text-white text-2xl"></i>
          </button>
        </div>
        <div class="p-4">
          <h3 class="font-medium text-gray-800 line-clamp-3">
            Watch LIVE: Inauguration of the newly constructed Delhi BJP State Office | PM Modi | JP Nadda | Delhi
          </h3>
          <div class="flex items-center text-xs text-gray-500 mt-2">
            <i class="far fa-clock mr-1"></i> 29-09-2025
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="flex space-x-2">
              <button class="bg-blue-600 text-white p-2 rounded-full text-xs"><i class="fab fa-facebook-f"></i></button>
              <button class="bg-blue-400 text-white p-2 rounded-full text-xs"><i class="fab fa-twitter"></i></button>
              <button class="bg-blue-500 text-white p-2 rounded-full text-xs"><i class="fas fa-share-alt"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card 3 -->
      <div class="bg-white rounded-lg shadow video-card transition-all duration-300">
        <div class="relative">
          <img src="https://via.placeholder.com/300x200?text=Naxal+Mukt+Bharat" alt="Video Thumbnail" class="w-full h-48 object-cover rounded-t-lg" />
          <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
            LIVE <i class="fas fa-play ml-1"></i>
          </div>
          <button class="absolute bottom-2 right-2 bg-white text-black p-1 rounded-full text-xs">
            <i class="fas fa-bookmark"></i>
          </button>
          <button class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
            <i class="fas fa-play text-white text-2xl"></i>
          </button>
        </div>
        <div class="p-4">
          <h3 class="font-medium text-gray-800 line-clamp-3">
            LIVE: HM Amit Shah Address | NAXAL MUKT BHARAT: Ending Red Terror Under Modi's Leadership | Delhi
          </h3>
          <div class="flex items-center text-xs text-gray-500 mt-2">
            <i class="far fa-clock mr-1"></i> 28-09-2025
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="flex space-x-2">
              <button class="bg-blue-600 text-white p-2 rounded-full text-xs"><i class="fab fa-facebook-f"></i></button>
              <button class="bg-blue-400 text-white p-2 rounded-full text-xs"><i class="fab fa-twitter"></i></button>
              <button class="bg-blue-500 text-white p-2 rounded-full text-xs"><i class="fas fa-share-alt"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card 4 -->
      <div class="bg-white rounded-lg shadow video-card transition-all duration-300">
        <div class="relative">
          <img src="https://via.placeholder.com/300x200?text=Media+Briefing" alt="Video Thumbnail" class="w-full h-48 object-cover rounded-t-lg" />
          <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
            LIVE <i class="fas fa-play ml-1"></i>
          </div>
          <button class="absolute bottom-2 right-2 bg-white text-black p-1 rounded-full text-xs">
            <i class="fas fa-bookmark"></i>
          </button>
          <button class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
            <i class="fas fa-play text-white text-2xl"></i>
          </button>
        </div>
        <div class="p-4">
          <h3 class="font-medium text-gray-800 line-clamp-3">
            LIVE: Media briefing by BJP National Spokesperson Dr. Sudhanshu Trivedi at BJP headquarters, Delhi
          </h3>
          <div class="flex items-center text-xs text-gray-500 mt-2">
            <i class="far fa-clock mr-1"></i> 27-09-2025
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="flex space-x-2">
              <button class="bg-blue-600 text-white p-2 rounded-full text-xs"><i class="fab fa-facebook-f"></i></button>
              <button class="bg-blue-400 text-white p-2 rounded-full text-xs"><i class="fab fa-twitter"></i></button>
              <button class="bg-blue-500 text-white p-2 rounded-full text-xs"><i class="fas fa-share-alt"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card 5 -->
      <div class="bg-white rounded-lg shadow video-card transition-all duration-300">
        <div class="relative">
          <img src="https://via.placeholder.com/300x200?text=JP+Nadda+Kerala" alt="Video Thumbnail" class="w-full h-48 object-cover rounded-t-lg" />
          <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
            LIVE <i class="fas fa-play ml-1"></i>
          </div>
          <button class="absolute bottom-2 right-2 bg-white text-black p-1 rounded-full text-xs">
            <i class="fas fa-bookmark"></i>
          </button>
          <button class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
            <i class="fas fa-play text-white text-2xl"></i>
          </button>
        </div>
        <div class="p-4">
          <h3 class="font-medium text-gray-800 line-clamp-3">
            LIVE: BJP National President Shri JP Nadda addresses BJP State office Bearers in Kollam, Kerala
          </h3>
          <div class="flex items-center text-xs text-gray-500 mt-2">
            <i class="far fa-clock mr-1"></i> 27-09-2025
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="flex space-x-2">
              <button class="bg-blue-600 text-white p-2 rounded-full text-xs"><i class="fab fa-facebook-f"></i></button>
              <button class="bg-blue-400 text-white p-2 rounded-full text-xs"><i class="fab fa-twitter"></i></button>
              <button class="bg-blue-500 text-white p-2 rounded-full text-xs"><i class="fas fa-share-alt"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card 6 -->
      <div class="bg-white rounded-lg shadow video-card transition-all duration-300">
        <div class="relative">
          <img src="https://via.placeholder.com/300x200?text=Modi+Jharsuguda" alt="Video Thumbnail" class="w-full h-48 object-cover rounded-t-lg" />
          <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
            LIVE <i class="fas fa-play ml-1"></i>
          </div>
          <button class="absolute bottom-2 right-2 bg-white text-black p-1 rounded-full text-xs">
            <i class="fas fa-bookmark"></i>
          </button>
          <button class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
            <i class="fas fa-play text-white text-2xl"></i>
          </button>
        </div>
        <div class="p-4">
          <h3 class="font-medium text-gray-800 line-clamp-3">
            PM Shri Narendra Modi lays foundation stone, inaugurates development works in Jharsuguda,
          </h3>
          <div class="flex items-center text-xs text-gray-500 mt-2">
            <i class="far fa-clock mr-1"></i> 27-09-2025
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="flex space-x-2">
              <button class="bg-blue-600 text-white p-2 rounded-full text-xs"><i class="fab fa-facebook-f"></i></button>
              <button class="bg-blue-400 text-white p-2 rounded-full text-xs"><i class="fab fa-twitter"></i></button>
              <button class="bg-blue-500 text-white p-2 rounded-full text-xs"><i class="fas fa-share-alt"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card 7 -->
      <div class="bg-white rounded-lg shadow video-card transition-all duration-300">
        <div class="relative">
          <img src="https://via.placeholder.com/300x200?text=Amit+Shah+Bihar" alt="Video Thumbnail" class="w-full h-48 object-cover rounded-t-lg" />
          <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
            LIVE <i class="fas fa-play ml-1"></i>
          </div>
          <button class="absolute bottom-2 right-2 bg-white text-black p-1 rounded-full text-xs">
            <i class="fas fa-bookmark"></i>
          </button>
          <button class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
            <i class="fas fa-play text-white text-2xl"></i>
          </button>
        </div>
        <div class="p-4">
          <h3 class="font-medium text-gray-800 line-clamp-3">
            HM Shri Amit Shah addresses Saharsa, Purnia and Bhagalpur Mandal Karyakarta Sammelan in
          </h3>
          <div class="flex items-center text-xs text-gray-500 mt-2">
            <i class="far fa-clock mr-1"></i> 27-09-2025
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="flex space-x-2">
              <button class="bg-blue-600 text-white p-2 rounded-full text-xs"><i class="fab fa-facebook-f"></i></button>
              <button class="bg-blue-400 text-white p-2 rounded-full text-xs"><i class="fab fa-twitter"></i></button>
              <button class="bg-blue-500 text-white p-2 rounded-full text-xs"><i class="fas fa-share-alt"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Card 8 -->
      <div class="bg-white rounded-lg shadow video-card transition-all duration-300">
        <div class="relative">
          <img src="https://via.placeholder.com/300x200?text=Modi+Mahila+Yojana" alt="Video Thumbnail" class="w-full h-48 object-cover rounded-t-lg" />
          <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
            LIVE <i class="fas fa-play ml-1"></i>
          </div>
          <button class="absolute bottom-2 right-2 bg-white text-black p-1 rounded-full text-xs">
            <i class="fas fa-bookmark"></i>
          </button>
          <button class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
            <i class="fas fa-play text-white text-2xl"></i>
          </button>
        </div>
        <div class="p-4">
          <h3 class="font-medium text-gray-800 line-clamp-3">
            PM Shri Narendra Modi launches Bihar's Mukhyamantri Mahila Rojgar Yojana
          </h3>
          <div class="flex items-center text-xs text-gray-500 mt-2">
            <i class="far fa-clock mr-1"></i> 26-09-2025
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="flex space-x-2">
              <button class="bg-blue-600 text-white p-2 rounded-full text-xs"><i class="fab fa-facebook-f"></i></button>
              <button class="bg-blue-400 text-white p-2 rounded-full text-xs"><i class="fab fa-twitter"></i></button>
              <button class="bg-blue-500 text-white p-2 rounded-full text-xs"><i class="fas fa-share-alt"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Load More Button -->
  <div class="container mx-auto px-4 mb-12 text-center">
    <button class="border border-red-500 text-red-500 hover:bg-red-50 px-6 py-2 rounded font-medium">
      LOAD MORE VIDEOS
    </button>
  </div>

  <!-- Back to Top Button -->
  <button class="fixed bottom-6 right-6 bg-orange-600 text-white p-3 rounded-full shadow-lg hover:bg-orange-700 transition">
    <i class="fas fa-arrow-up"></i>
  </button>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6 px-4 mt-12">
    <div class="container mx-auto text-center">
      <p>&copy; 2025 Bharatiya Janata Party. All rights reserved.</p>
    </div>
  </footer>
  @endsection