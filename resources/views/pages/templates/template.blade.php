@extends('layouts.presentation')

@section('title', 'Nos Templates')

@section('content')
    <!-- Start Breadcrumb section -->
    <div class="breadcrumb-section" style="background: radial-gradient(60.1% 75.75% at 100% 96.1%, #153C3C 0%, #172426 100%)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="banner-content">
                        <h1>Modèles et Templates</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="{{route('home')}}">Accueil</a></li>
                            <li>Nos Templates</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb section -->

    <!-- Portfolio Page Start -->
    <div class="portfolio-page pt-130 mb-130">
        <div class="container">
            <div class="row g-4 mb-70">
                @foreach($templates as $template)
                    <div class="col-lg-4 col-md-6 wow animate fadeInDown me-2 card" data-wow-delay="{{ $loop->iteration * 200 }}ms" data-wow-duration="1500ms">
                        <div class="portfolio-card two magnetic-item">
                            <div class="portfolio-img">
                                <img src="{{ asset('storage/' . $template->image) }}" alt="{{ $template->name }}">
                            </div>
                            <div class="portfolio-content-wrap">
                                <div class="portfolio-content">
                                    <a target="_blank" href="{{ route('template.detail', ['code' => $template->code]) }}" class="details-btn">
                                        <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.3386 4.55228L2.86315 16.0277L0.977539 14.1421L12.453 2.66667H2.33863V0H17.0053V14.6667H14.3386V4.55228Z"/>
                                        </svg>
                                    </a>
                                    <span>Modèle d'invitation</span>
                                    <h4>
                                        <a target="_blank" href="{{ route('template.detail', ['code' => $template->code]) }}">
                                            {{ $template->name }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="mt-1">
                            <h4>
                                <a target="_blank" href="{{ route('template.detail', ['code' => $template->code]) }}">
                                    {{ $template->name }}
                                </a>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination optionnelle (si tu utilises ->paginate() dans le contrôleur) --}}
            {{-- <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="col-lg-12 d-flex justify-content-center">
                    {{ $templates->links() }}
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Portfolio Page End -->
@endsection
