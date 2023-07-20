<x-app-layout>

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div class="carousel slide carousel-fade">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="background-image: url(assets/img/slide/slide.png);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>Todo</span> Task</h2>
                                <p class="animate__animated animate__fadeInUp">This todo app simplifies task management by providing you with a convenient and organized way to create, track, and complete tasks. It enhances productivity, reduces forgetfulness, and helps individuals you effectively manage your time and responsibilities.</p>
                                <div>
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="btn-menu animate__animated animate__fadeInUp">Dashboard</a>
                                    @else
                                        <a href="{{ route('register') }}" class="btn-menu animate__animated animate__fadeInUp">Get Started</a>
                                        <a href="{{ route('login') }}"  class="btn-book animate__animated animate__fadeInUp scrollto">Login</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Hero -->

</x-app-layout>
