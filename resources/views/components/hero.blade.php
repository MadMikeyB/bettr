<section class="hero">
    <div class="hero__flex-container">
        <h1 class="hero__title">{{$title ?? ''}}</h1>
        <h2 class="hero__subtitle">{{$subtitle ?? ''}}</h2>
        <div class="hero__content">
            {{$slot}}
        </div>
    </div>
</section>
