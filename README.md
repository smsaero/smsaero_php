# SMSAero PHP SDK

SDK для работы с SMSAero API на языке PHP.
#### Все методы принимают параметры указанные в документации https://smsaero.ru/integration/documentation/api в виде массива(исключения: методы которые требуют передачу только идентификатора, они принимают сразу ID)

## Робота с SMS сообщениями
```php
$smsAeroMessage = new \SmsAero\SmsAeroMessage(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Отправка SMS сообщений
$request = $smsAeroMessage->send(['number' => 'номер абонента', 'text' => 'текст сообщения', 'sign' => 'подпись отправителя(можно получить в личном кабинете smsaero.ru или использовать подпись: SMS Aero)']);
// Проверка статуса SMS сообщения
$request = $smsAeroMessage->getStatus($id);
// Получение списка отправленных сообщений
$request = $smsAeroMessage->getList();
```

## Робота с контактами
```php
$smsAeroContact = new \SmsAero\SmsAeroContact(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Добавление контакта
$request = $smsAeroContact->create(['number' => 'номер абонента']);
// Удаление контакта
$request = $smsAeroContact->delete($id);
// Список контактов
$request = $smsAeroContact->getList();
// Добавление в черный список
$request = $smsAeroContact->toBlacklist(['number' => 'номер абонента']);
// Удаление из черного списка
$request = $smsAeroContact->deleteFromBlacklist($id);
// Список контактов в черном списке
$request = $smsAeroContact->getBlacklist();
// Создание запроса на проверку HLR
$request = $smsAeroContact->check(['number' => 'номер абонента']);
// Получение статуса HLR
$request = $smsAeroContact->status($id);
// Определение оператора
$request = $smsAeroContact->getOperator(['number' => 'номер абонента']);
```

## Робота с группами
```php
$smsAeroGroup = new \SmsAero\SmsAeroGroup(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Добавление группы
$request = $smsAeroGroup->create(['name' => 'название новой группы']);
// Удаление группы
$request = $smsAeroGroup->delete($id);
// Получение списка групп 
$request = $smsAeroGroup->getList();
```

## Робота с профилем
```php
$request = $smsAeroUser = new \SmsAero\SmsAeroUser(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Запрос баланса
$request = $smsAeroUser->getBalance();
// Запрос тарифа
$request = $smsAeroUser->getTariffs();
// Карты пользователя
$request = $smsAeroUser->getCards();
// Пополнение баланса
$request = $smsAeroUser->charge(['cardId' => $cardId, 'sum' => $sum]);
```

## Робота с Viber сообщениями
```php
$request = $smsAeroViber = new \SmsAero\SmsAeroViber(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Создание Viber-рассылки
$request = $smsAeroViber->send(['number' => 'номер абонента', 'sign' => 'имя отправителя', 'channel' => 'OFFICIAL', 'text' => 'текст сообщения']);
// Статистика по Viber-рассылке
$request = $smsAeroViber->getStat($id);
// Список Viber-рассылок
$request = $smsAeroViber->getList();
//Список доступных имен для Viber-рассылок
$request = $smsAeroViber->getSigns();
```

## Обработка ответа
```php
if ($request['success']) {
    echo 'Успешны запрос';
    // Массив с данными для дальнейшего действия
    print_r($request['data');
} else {
    echo 'Ошибка авторизации или валидации';
    // Массив или сообщение содержащие детальную информацию
    print_r($request['message');
}
```
