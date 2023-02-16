@extends('layouts.layout')

@section('content')
    <!-- Portfolio Section -->
    <section class="section animate__animated animate__slideInUp" id="portfolio">
        <div class="container">
            <div class="section__header section__header">
                <h2 class="section__title">Portfolio</h2>
                <p class="section__subtitle">See my latest work</p>
            </div>

            @include('sections.portfolio')
            <div class="pagination page-link">{{ $projects->links() }}</div>
        </div>

    </section>
@endsection
