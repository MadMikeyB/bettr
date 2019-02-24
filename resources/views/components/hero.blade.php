<section class="hero">
    <div class="hero__flex-container">
        @if (Route::current()->getName() === 'home')
        <div class="icon-box" style="margin-bottom: 0rem">
            <div class="icon-box__icon icon-box__icon--alt icon-box__icon--large">
                <i class="fas fa-thumbs-up"></i>  
            </div>
        </div>
        @endif

        <h1 class="hero__title">{{$title ?? ''}}</h1>
        <h2 class="hero__subtitle">{{$subtitle ?? ''}}</h2>
        <div class="hero__content">
            {{$slot}}
        </div>
    </div>
</section>
