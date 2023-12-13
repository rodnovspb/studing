<section class="contacts">
    <div class="container page">
        <div class="contacts__text">
            <h2 class="contacts__title">Контакты</h2>
            <div class="contacts__blocks">
                <div class="contacts__block">
                    <div>Адрес:</div>
                    <div>
                        {{ $city->name }}, {{ $city->address }}
                        <span class="office__outside">Мы работаем удаленно. <br>Просьба звонить или писать</span>
                    </div>
                </div>
                <div class="contacts__block">
                    <div>Время работы:</div>
                    <div>Пн−Пт: 9:00 − 18:00<br>Сб−Вс: выходной</div>
                </div>
                <div class="contacts__block">
                    <div>Мы в других городах</div>
                    <a class="underlined" href="{{ route('cities') }}">Смотреть список</a>
                </div>
            </div>
        </div>
        @includeIf('parts.links')
    </div>
    <div id="map"></div>
</section>

@push('scripts')
    <script>
    // Функция создания Яндекс карты

    createMap(`{{$city->coords}}`)

    function createMap(coords){
        let array = coords.split(', ');
        ymaps.ready(init);
        function init(){
            // Создание карты.
            var myMap = new ymaps.Map("map", {
                center: [array[0], array[1]],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 13,
            });
            myGeoObject = new ymaps.GeoObject({
                // Описание геометрии.
                geometry: {
                    type: "Point",
                    coordinates: [array[0], array[1]]
                },
            })

            myMap.geoObjects
                .add(myGeoObject);
        }

    }

</script>
@endpush
