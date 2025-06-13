@extends('layouts.presentation')

@section('title', "Validité de l'invitation")

@section('content')

    <!-- Home1 About Section Start -->
    <div class="home1-service-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 d-lg-block d-none">
                    <div class="about-img magnetic-item">
                        <img src="{{ asset('storage/' . $invitation->event->couple_photo) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="about-content">
                        <div class="section-title">
                            <div class="alert alert-info">{{ $message }}</div>

                            <h2>{{ $invitation->guest->name }}</h2>

                            <p>
                                Table : {{ $invitation->table->name }}
                            </p>

                            <h4>
                                Mariage de : {{ $invitation->event->bride_name }} & {{ $invitation->event->groom_name }}
                            </h4>
                        </div>

                        <a href="{{route('invitation.check.form')}}" class="primary-btn" data-text="Retour"><span>Retour</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home1 About Section End -->
@endsection
