@extends('layouts.layout')

@section('content')
    <!-- Hero Section -->
    @if ($message = Session::get('success'))
        		<div class="btn btn--accent">
            		<p>{{ $message }}</p>
        		</div>
    		@endif
    <section class="hero">
        <div class="container">
            <div class="hero__wrapper">
                <div class="hero__img">
                    <img src="/images/{{$file->img}}" alt="Profile Picture" />
                </div>
                <h1 class="hero__title animate__animated animate__slideInUp">
                    PHP (Laravel) <br />
                    Backend developer
                </h1>
                <p class="hero__content animate__animated animate__slideInUp">
                    I am Kurshidbek from Uzbekistan. I have been working as a Backend developer since 2021.<br> I'm ready to code
                </p>
                <ul class="social " style="z-index: 55">

                    <li>
                        <a href="https://github.com/Xurshidbek96" target="_blank"><i class="bi bi-github"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/xurshidbekmuminov/" target="_blank"><i class="bi bi-instagram"></i></a>
                    </li>

                    <li>
                        <a href="https://t.me/backend_php_dev" target="_blank"><i class="bi bi-telegram"></i></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/xurshidbek.mominov.77/" target="_blank"><i class="bi bi-facebook"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section animate__animated animate__slideInUp" id="portfolio">
        <div class="container">
          <div class="section__header section__header">
            <h2 class="section__title">Portfolio</h2>
            <p class="section__subtitle">See my latest work</p>
          </div>
    @include('sections.portfolio')

    <div class="section__footer">
        <a href="/portfolio">
          Ask for More Projects
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>

    <!-- About Me Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="section__header">
                <h2 class="section__title">About</h2>
                <p class="section__subtitle">Few things about me</p>
            </div>
            <div class="about">
                <h3 class="about__intro">👋 Hi, I'm Khurshidbek</h3>
                <p class="about__bio">
                     I am form Andijan, Uzbekistan. I was born in 1996 and started coding in 2021.
                     I am a strong junior who writes clean code. Laravel ecosystem is my choice in other frameworks. I can work both remote and offline. My services are web site Backend and REST API .
                </p>
                <a class="about__link" href="#contact">Contact Me<i class="bi bi-arrow-right"></i></a>

                <h4 class="about__skillsTitle">Skills</h4>
                <ul class="about__skillsList">
                    <li class="btn btn--light">PHP</li>
                    <li class="btn btn--light">Laravel</li>
                    <li class="btn btn--light">MySQL</li>
                    <li class="btn btn--light">PostgreSQL</li>
                    <li class="btn btn--light">RestAPI</li>
                    <li class="btn btn--light">HTML</li>
                    <li class="btn btn--light">CSS</li>
                    <li class="btn btn--light">Bootstrap</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section" id="contact">
        <div class="section__header section__header--center">
            <h2 class="section__title">Contact Me</h2>
            <p class="section__subtitle">Reach out to me, 24/7</p>
        </div>
        <div class="container">
            <div class="contact">
                <div class="contact__info">
                    <p>Call Me: <a href="tel:+998912801774"> (+998 91) 2801774</a></p>
                </div>

                <form class="contact__form" action="{{ route('sendMessage') }}" method="post">
                    @csrf
                    <div class="contact__fields">
                        <label for="name">Name</label>
                        <input type="name" name="name" id="name" placeholder="Your Name" />
                    </div>
                    <div class="contact__fields">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email Address" />
                    </div>
                    <div class="contact__fields">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Write Message..."></textarea>
                    </div>
                    <div class="contact__fields contact__fields--action">
                        <button class="btn btn--accent" type="submit">
                            Send Message <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


