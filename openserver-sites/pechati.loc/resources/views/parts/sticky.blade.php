<div class="sticky">
        <div class="sticky__logo">
            <div class="sticky__wrapper">
                <a href="{{ route('index') }}" class="sticky__img">{!! $options['logo'] ?? null !!}</a>
            </div>
        </div>
        <div class="sticky__place">
            <div class="sticky__wrapper wrapper-place">
                <div class="sticky__time">{!! $options['shedule'] ?? null !!}</div>
                <div class="sticky__address">{!! $options['address'] ?? null !!}</div>
            </div>
        </div>
        <div class="sticky__phone">
            <div class="sticky__wrapper">
                <div class="sticky__messengers">
                    <div class="sticky__whatsapp dfc">{!! $options['whatsapp'] ?? null !!}</div>
                    <div class="sticky__viber dfc">{!! $options['viber'] ?? null !!}</div>
                    <div class="sticky__telegram dfc">{!! $options['telegram'] ?? null !!}</div>
                </div>
                <div class="sticky__number">{!! $options['phone_1'] ?? null !!}</div>
            </div>
        </div>
        <div class="sticky__email">
            <div class="sticky__wrapper">{!! $options['email'] ?? null !!}</div>
        </div>
    </div>
