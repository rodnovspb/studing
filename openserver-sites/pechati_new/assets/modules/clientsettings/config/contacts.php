<?php

return [
  'caption' => 'Контакты, адрес, график',
  'settings' => [
    'phone' => [
      'caption' => 'Номер телефона',
      'type' => 'text',
    ],
    'phone_+7' => [
      'caption' => 'Тот же номер начиная с +7',
      'type' => 'text',
      'note'  => 'В формате: +79510000000',
    ],
    'whatsapp' => [
      'caption' => 'WhatsApp',
      'type' => 'text',
      'note'  => 'Начиная с 7 в формате: 79510000000',
    ],
    'telegram' => [
      'caption' => 'Ссылка на телеграм',
      'type' => 'text',
      'note'  => 'То, что идет после @, например: denis123',
    ],
    'email' => [
      'caption' => 'Электронная почта',
      'type' => 'text',
      'note'  => 'Например: zakaz-pechati@mail.ru',
    ],
    'address' => [
      'caption' => 'Адрес',
      'type' => 'text',
      'note'  => 'Например: Москва, ул. Центральная, 88Б, оф. 103',
    ],
    'time' => [
      'caption' => 'Время работы',
      'type' => 'text',
      'note'  => 'Например: пн-пт с 10:00 до 18:00',
    ],
  ],
];
