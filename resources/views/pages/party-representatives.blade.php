@extends('layouts.app')

@section('title', __('site.party_representatives.title'))

@section('content')
{{-- Campaign Hero Section --}}
<section class="bg-gradient-to-br from-[var(--color-mjk-red)] via-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.menu.party_representatives') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.party_representatives.district_representatives_desc') ?? 'மாவட்ட அளவிலான பிரதிநிதிகள்' }}
        </p>
    </div>
</section>

  

  {{-- District Representatives --}}
  @if(isset($districtRepresentatives) && $districtRepresentatives->isNotEmpty())
    <section class="relative py-20 lg:py-28 px-4 bg-gray-50 dark:bg-gray-900 overflow-hidden">
      {{-- Background Elements --}}
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
      </div>

      <div class="max-w-7xl mx-auto w-full relative z-10">
        <h2 class="text-3xl lg:text-4xl font-extrabold text-center mb-12 text-gray-900 dark:text-white" data-aos="fade-up">
          {{ __('site.party_representatives.district_representatives_title') ?? 'District Representatives' }}
        </h2>

        {{-- District Representatives Grid --}}
        <div class="grid xl:grid-cols-3 md:grid-cols-2 gap-6">
          @foreach($districtRepresentatives as $representative)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
              <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center gap-6">
                  @if($representative->photo)
                    <img
                      src="{{ asset('storage/' . $representative->photo) }}"
                      alt="{{ app()->getLocale() === 'ta' ? $representative->name_ta : $representative->name_en }}"
                      class="rounded-xl h-32 w-32 object-cover"
                      onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    />
                  @endif
                  <div class="rounded-xl h-32 w-32 bg-gradient-to-br from-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] flex items-center justify-center {{ $representative->photo ? 'hidden' : '' }}">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                  </div>
                  <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">
                      {{ app()->getLocale() === 'ta' ? $representative->name_ta : $representative->name_en }}
                    </h2>
                    <p class="font-medium text-base text-[var(--color-mjk-red)] mb-1">
                      {{ app()->getLocale() === 'ta' ? $representative->post->name_ta : $representative->post->name_en }}
                    </p>
                    @if($representative->district)
                      <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ app()->getLocale() === 'ta' ? $representative->district->name_ta : $representative->district->name_en }}
                      </p>
                    @endif
                    @if($representative->assembly)
                      <p class="text-sm text-gray-500 dark:text-gray-500">
                        {{ app()->getLocale() === 'ta' ? $representative->assembly->name_ta : $representative->assembly->name_en }}
                      </p>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @else
    <section class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-xl text-gray-600">{{ __('site.party_representatives.no_representatives') ?? 'No district representatives available at the moment.' }}</p>
      </div>
    </section>
  @endif

  {{-- Contact Representatives CTA --}}
  <section class="py-20 lg:py-28 px-4 {{ (isset($representatives) && $representatives->isNotEmpty()) ? 'bg-gray-50' : 'bg-white' }}">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl lg:text-4xl font-extrabold text-[var(--color-mjk-red)] mb-6">{{ __('site.party_representatives.contact_title') }}</h2>
      <p class="text-lg text-gray-700 mb-8">{{ __('site.party_representatives.contact_desc') }}</p>
      <a href="{{ route('contact') }}" class="btn-campaign btn-campaign-primary">
        {{ __('site.party_representatives.contact_button') }}
      </a>
    </div>
  </section>

@endsection
