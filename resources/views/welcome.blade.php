@extends('layouts.app')

@section('content')

<!-- Fondo y bienvenida -->
<section id="welcome" class="relative bg-gradient-to-r from-green-200 to-cyan-200 pt-[40px] pb-32 overflow-hidden">

    <!-- Partículas decorativas -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-10 left-10 w-3 h-3 bg-white rounded-full opacity-30 animate-bounce"></div>
        <div class="absolute top-20 right-20 w-4 h-4 bg-green-300 rounded-full opacity-30 animate-pulse"></div>
        <div class="absolute bottom-10 left-1/2 w-2 h-2 bg-cyan-300 rounded-full opacity-30 animate-bounce"></div>
    </div>

    <!-- Contenido principal -->
    <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <!-- Texto de bienvenida -->
        <h2 class="text-3xl sm:text-4xl font-semibold text-green-900 mb-4 animate__animated animate__fadeInUp">
            <span id="typewriter" class="text-green-700"></span>
        </h2>

        <!-- Frase inspiradora -->
        <p class="text-lg sm:text-xl text-green-800 mb-12 animate__animated animate__fadeInUp animate__delay-1s">
            <span id="fraseRotativa">¡Juntos podemos hacer la diferencia!</span>
        </p>

        <!-- Carrusel estilo Coverflow 3D -->
        <div class="py-10 relative">
            <div class="swiper mySwiper max-w-5xl mx-auto">
                <div class="swiper-wrapper">
                    @foreach ([
                        '5403358.jpg',
                        '8381344.jpg',
                        '8661063.jpg',
                        'bolsa-reutilizable.jpg',
                        'comprador_productos.jpg',
                        'utensilios-reutilizables.jpg'
                    ] as $img)
                        <div class="swiper-slide rounded-xl overflow-hidden shadow-xl bg-white w-[250px] sm:w-[300px] md:w-[320px] lg:w-[350px]">
                            <img src="{{ asset('images/' . $img) }}"
                                 class="w-full h-[220px] sm:h-[250px] md:h-[280px] lg:h-[300px] object-cover transition-all duration-300 ease-in-out"
                                 alt="Eco imagen">
                            <div class="p-3 sm:p-4 text-center">
                                <h3 class="text-base sm:text-lg font-semibold text-green-800">Naturaleza Viva</h3>
                                <p class="text-xs sm:text-sm text-green-600">Reflexiona, conecta, protege.</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Flechas -->
                <div class="swiper-button-next text-green-800"></div>
                <div class="swiper-button-prev text-green-800"></div>

            </div>

            <!-- Dots fuera del carrusel -->
            <div class="swiper-pagination mt-6"></div>
        </div>

        <!-- Botón a reflexiones -->
        <div class="my-10 animate__animated animate__fadeInUp">
            <a href="#reflexiones"
               class="inline-block bg-green-700 text-white py-3 px-6 rounded-full text-lg font-semibold shadow-md hover:bg-green-800 transition duration-300">
                Ver Reflexiones
            </a>
        </div>

        <!-- Caja informativa -->
        <div class="max-w-2xl mx-auto mb-12 bg-green-50 p-6 rounded-lg shadow animate__animated animate__fadeIn animate__delay-2s">
            <h4 class="text-green-900 font-semibold mb-2 text-lg">¿Sabías que…?</h4>
            <p class="text-green-700 text-sm">Reciclar una sola botella de plástico puede ahorrar suficiente energía para alimentar una bombilla durante 3 horas. 🌍</p>
        </div>

        <!-- Reflexiones -->
        <section id="reflexiones" class="max-w-6xl mx-auto px-4 mb-20 animate__animated animate__fadeInUp">
            <h3 class="text-3xl font-bold text-center text-green-900 mb-12">Reflexiones para un mundo mejor</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16 items-center">
                <img src="{{ asset('images/5403358.jpg') }}" alt="Reflexión" class="rounded-xl shadow-md w-full h-72 object-cover">
                <div>
                    <h3 class="text-2xl font-semibold text-green-800 mb-2">“La Tierra no nos pertenece, nosotros pertenecemos a la Tierra.”</h3>
                    <p class="text-green-700 text-sm">Recordar esto cada día puede cambiar nuestra manera de actuar. Vive en armonía con el planeta.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16 items-center">
                <div class="order-2 md:order-1">
                    <h3 class="text-2xl font-semibold text-green-800 mb-2">“Pequeñas acciones multiplicadas por millones de personas, pueden transformar el mundo.”</h3>
                    <p class="text-green-700 text-sm">Reciclar, reducir, reutilizar... Cada paso cuenta.</p>
                </div>
                <img src="{{ asset('images/8381344.jpg') }}" alt="Acción" class="rounded-xl shadow-md w-full h-72 object-cover order-1 md:order-2">
            </div>
        </section>

        <!-- Frase final -->
        <div class="text-center max-w-2xl mx-auto mb-20 animate__animated animate__fadeInUp animate__delay-5s">
            <blockquote class="text-green-800 italic border-l-4 border-green-600 pl-4">
                “No heredamos la tierra de nuestros antepasados, la tomamos prestada de nuestros hijos.”<br>
                <span class="block text-sm text-green-600 mt-2">– Proverbio nativo americano</span>
            </blockquote>
        </div>

        <!-- Botón final -->
        <div class="animate__animated animate__fadeInUp animate__delay-6s">
            <a href="{{ route('reciclaje') }}#reciclaje"
               class="bg-green-700 text-white py-3 px-6 rounded-full text-lg font-semibold shadow-lg hover:bg-green-800 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-recycle"></i> Comienza a Aprender
            </a>
        </div>
    </div>
</section>

<!-- Máquina de escribir y rotador -->
<script>
    const typewriterText = '¡Bienvenido a EcoSostenible!';
    let i = 0;
    function typeWriter() {
        if (i < typewriterText.length) {
            document.getElementById('typewriter').innerHTML += typewriterText.charAt(i);
            i++;
            setTimeout(typeWriter, 70);
        }
    }
    document.addEventListener('DOMContentLoaded', typeWriter);

    const frases = [
        '¡Juntos podemos hacer la diferencia!',
        'Reduce, Reutiliza, Recicla.',
        'Un planeta limpio comienza contigo.',
        'El reciclaje es el futuro.',
    ];
    let fraseIndex = 0;
    setInterval(() => {
        fraseIndex = (fraseIndex + 1) % frases.length;
        document.getElementById('fraseRotativa').innerText = frases[fraseIndex];
    }, 4000);
</script>

<!-- SwiperJS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- Swiper Config -->
<script>
    const swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                coverflowEffect: {
                    rotate: 15,
                    stretch: 0,
                    depth: 60,
                    modifier: 1,
                    slideShadows: false,
                }
            },
            640: {
                coverflowEffect: {
                    rotate: 25,
                    stretch: 0,
                    depth: 90,
                    modifier: 1,
                    slideShadows: true,
                }
            },
            1024: {
                coverflowEffect: {
                    rotate: 30,
                    stretch: 0,
                    depth: 120,
                    modifier: 1,
                    slideShadows: true,
                }
            }
        }
    });
</script>

<!-- Estilo personalizado para los dots -->
<style>
    .swiper-pagination-bullet {
        background-color: #4CAF50;
        opacity: 0.4;
    }

    .swiper-pagination-bullet-active {
        background-color: #1b7c2c;
        opacity: 1;
    }
</style>

<!-- Animate + FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

@endsection
