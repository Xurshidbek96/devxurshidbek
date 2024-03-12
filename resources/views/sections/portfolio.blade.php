<div class="portfolio">
    @foreach ($projects as $item)
        <div class="portfolio__box">
            <img class="portfolio__img" src="{{ $item->img }}" alt="Portfolio Items" />
            <div class="portfolio__info">
                <h3 class="portfolio__title">{{ $item->name }}</h3>
                <p class="portfolio__content">
                    {{ $item->title }}
                </p>
                <a class="portfolio__link" href="{{ $item->link }}" target="_blank">
                    <i class="bi bi-arrow-up-right-circle-fill"></i>
                </a>
            </div>
        </div>
    @endforeach
</div>
