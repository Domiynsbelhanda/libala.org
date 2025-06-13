@extends('layouts.presentation')

@section('title', "Verification d'invitation")

@section('content')

    <!-- Home2 Contact Section Start -->
    <div class="home1-banner-section">
        <div class="container">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="contact-form">
                        <div class="form-title">
                            <h4>Verifiez l'Ivitation</h4>

                            @if(session('error'))
                                <p style="color:red;">{{ session('error') }}</p>
                            @endif

                            @if(isset($error))
                                <p style="color:red;">{{ $error }}</p>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('invitation.check.verify') }}">
                            @csrf
                            <div class="row gy-md-4 gy-3 mb-25">
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <input type="text" name="code" id="code" placeholder="Entrez le code d'invitation" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div>
                                        <!-- Bouton pour ouvrir le scanner QR -->
                                        <button  class="primary-btn black-bg"
                                                 data-text="Scanner lr QR Code" type="button" onclick="startScanner()">Scanner le QR Code</button>

                                        <!-- Zone pour afficher la caméra -->
                                        <div id="qr-reader" style="width: 100%; max-width: 400px; margin-top: 20px;"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="primary-btn" data-text="Verifiez">
                                <span>Verifiez</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6 d-lg-block d-none">
                    <div class="banner-img magnetic-item">
                        <img src="{{asset('presentation/img/home1/home01-banner-img.png')}}" alt="Illustration du mariage">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home2 Contact Section End -->

    <script>
        function startScanner() {
            const qrReader = new Html5Qrcode("qr-reader");

            qrReader.start(
                { facingMode: "environment" },
                {
                    fps: 10,
                    qrbox: 250
                },
                (decodedText, decodedResult) => {
                    try {
                        // 🔍 Extraire le dernier segment de l'URL
                        const url = new URL(decodedText);
                        const pathSegments = url.pathname.split("/");
                        const code = pathSegments[pathSegments.length - 1]; // Dernier élément

                        if (code) {
                            document.getElementById("code").value = code;
                            qrReader.stop().then(() => {
                                document.getElementById("qr-reader").innerHTML = "";
                                document.querySelector("form").submit();
                            });
                        } else {
                            alert("Code invalide dans l'URL.");
                            qrReader.stop();
                        }
                    } catch (error) {
                        alert("Le code QR scanné n’est pas une URL valide.");
                        qrReader.stop();
                    }
                },
                (errorMessage) => {
                    // Peut être utilisé pour le debug si besoin
                }
            ).catch(err => {
                alert("Impossible de démarrer le scanner : " + err);
            });
        }
    </script>


@endsection
