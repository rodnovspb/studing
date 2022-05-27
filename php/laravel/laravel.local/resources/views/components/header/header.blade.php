<header class="header">
    <x-header.logo>
      img/logo.png
        <x-slot:alt>Наш логотип</x-slot:alt>
        <x-slot:title>Это наш логотип</x-slot:title>
    </x-header.logo>
    {{ $slot }}
    {{ $name }}
    <x-header.contacts />
</header>
