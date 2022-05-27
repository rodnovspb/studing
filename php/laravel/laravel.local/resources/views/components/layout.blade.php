<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
        <{{ $meta }}>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	</head>
	<body>
		<div class="wrapper">
			<x-header.header>
                Внутрь готовой переменной slot
            <x-slot:name>Компания "Рысь ч/з переменную"</x-slot:name>
			</x-header.header>
            <x-sidebar.leftside />
			<main>
                <x-main.menu.nav />
                <x-main.news />
{{--                Здесь x-other.block вызываем через компонент--}}
{{--                Компонент имеет приоритет. Если есть компонент с таким
же именем, что и вьюха, то вьюха не показывается. Либо компонент вызывает эту вьюху--}}
                <x-other.block />
                <x-footer.footer />
                <x-main.info.info-block>
                Информация о компании: наша компания большая и хорошая
                </x-main.info.info-block>
                {{ $slot }}
			</main>
            <x-sidebar.rightside />
			<x-footer.footer />
            <x-alert.error>
                Ошибка:
                <x-slot:type>
                    здесь будет сообщение об ошибке
                </x-slot:type>
            </x-alert.error>
		</div>
	</body>
</html>
