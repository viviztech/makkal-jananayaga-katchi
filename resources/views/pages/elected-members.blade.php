@extends('layouts.app')

@section('title', __('site.elected_members.title'))

@section('content')
<style>
  .container {
  
  max-width: 1200px;
    
  margin: 50px auto;
    
  gap: 40px;
  }
  
  .column {
    flex: 1;
  }
  
  .column.left, .column.right {
    max-width: 300px;
    padding-right: 30px;
    overflow-y: auto;
    max-height: 570px;
  }
section.members-section {
    background-image: url({{ asset('assets/images/images/members-bg.png') }});
    background-size: cover;
    padding: 10px 0;
}
.members-wrap h2 {
    text-transform: capitalize;
    font-size: 30px;
    text-align: center;
    padding-bottom: 20px;
}

.members-top-row {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 60px;
}

.s-member-wrap {
    width: 23%;
}
.s-member-wrap:hover .member-cont{
    background-color:#d92526;
    box-shadow: 0px 4px 5px 2px rgba(0, 0, 0, 0.25);
}
.members-bottom-row {
    display: flex;
    justify-content: center;
    gap: 20px;
}
.member-img {
    text-align: center;
}
.member-img img{
    margin:auto;
}
.member-cont {
    background: #006A9C;
    border-radius: 5px;
    text-align: center;
    padding: 5px 10px 6px;
    color: #fff;
    transition:all 0.5s ease;
}
.member-cont h6 {
    font-size: 20px;
    margin: 0;
    font-weight:900;
    /* line-height: 30px; */
}
.member-cont span {
  color: #D0D0D0;
  display: block;
  margin-bottom:8px;
}
.members-s-media {
    display: flex;
    justify-content: center;
    align-items:center;
    gap: 14px;
}
</style>
  {{-- Page Header --}}
  <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.menu.elected_members') }}</h1>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.elected_members.subtitle') }}</p>
    </div>
  </section>

  <section class="members-section">
        <div class="container">
            <div class="members-wrap">
                <h2 class="animation-element slide-top">{{ __('site.home.members_section_title') }}</h2>
                <div class="members-wrap">
                    <div class="members-top-row">
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/thol-thirmavalavan.png') }}" alt="{{ __('site.home.member_1_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="slide-top">{{ __('site.home.member_1_name') }}</h6>
                                <span>{{ __('site.home.member_1_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/thirumaofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/thirumaofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/thol.thirumaavalavan/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/raj-kumar.png') }}" alt="{{ __('site.home.member_2_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="slide-top">{{ __('site.home.member_2_name') }}</h6>
                                <span>{{ __('site.home.member_2_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/WriterRavikumar" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/WriterRavikumar" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="members-bottom-row">
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/sinthanai-selvan.png') }}" alt="{{ __('site.home.member_3_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="slide-top">{{ __('site.home.member_3_name') }}</h6>
                                <span>{{ __('site.home.member_3_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/SinthanaiVCKofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/sinthanaivck" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/sinthanai_vck" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/aloor-shah-nawaz.png') }}" alt="{{ __('site.home.member_4_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="slide-top">{{ __('site.home.member_4_name') }}</h6>
                                <span>{{ __('site.home.member_4_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/aloor.shanavas" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/aloor_ShaNavas" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/aloor_sha_navas/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/panaiyur-babu.png') }}" alt="{{ __('site.home.member_5_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="slide-top">{{ __('site.home.member_5_name') }}</h6>
                                <span>{{ __('site.home.member_5_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/panaiyurmbabu/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/PanaiyurBabu" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/panaiyurbabumla/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/balaji.png') }}" alt="{{ __('site.home.member_6_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="slide-top">{{ __('site.home.member_6_name') }}</h6>
                                <span>{{ __('site.home.member_6_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/s.s.balaji" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/VckBalaji" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

  {{-- Achievements Section --}}
  <section class="relative py-20 lg:py-28 px-4 bg-gradient-to-br from-red-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-950 dark:to-red-950/30 overflow-hidden">
    {{-- Background Decorative Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-20 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
      <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
          {{ __('site.elected_members.achievements_title') }}
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">

        {{-- Achievement 1 --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="0">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 lg:p-10 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col items-center text-center">
            <div class="relative w-16 h-16 mb-6">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
            </div>
            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.elected_members.electoral_success') }}</h3>
            <p class="text-base text-blue-700/80 dark:text-blue-200/70 leading-relaxed">{{ __('site.elected_members.electoral_success_desc') }}</p>
          </div>
        </div>

        {{-- Achievement 2 --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="100">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 lg:p-10 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col items-center text-center">
            <div class="relative w-16 h-16 mb-6">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m-6 4h6m-6 4h6"/>
                </svg>
              </div>
            </div>
            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.elected_members.legislative_work') }}</h3>
            <p class="text-base text-blue-700/80 dark:text-blue-200/70 leading-relaxed">{{ __('site.elected_members.legislative_work_desc') }}</p>
          </div>
        </div>

        {{-- Achievement 3 --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="200">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 lg:p-10 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col items-center text-center">
            <div class="relative w-16 h-16 mb-6">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
            </div>
            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.elected_members.community_service') }}</h3>
            <p class="text-base text-blue-700/80 dark:text-blue-200/70 leading-relaxed">{{ __('site.elected_members.community_service_desc') }}</p>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
