# SMSAero PHP SDK

SDK для работы с SMSAero API на языке PHP.
#### Все методы принимают параметры указанные в документации https://smsaero.ru/integration/documentation/api в виде массива(исключения: методы которые требуют передачу только идентификатора, они принимают сразу ID)

### Установка
```bash
composer require smsaero/smsaero_api
```

## Робота с SMS сообщениями
```php
$smsAeroMessage = new \SmsAero\SmsAeroMessage(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Отправка SMS сообщений
$response = $smsAeroMessage->send(['number' => 'номер абонента', 'text' => 'текст сообщения', 'sign' => 'подпись отправителя(можно получить в личном кабинете smsaero.ru или использовать подпись: SMS Aero)']);
// Проверка статуса SMS сообщения
$response = $smsAeroMessage->getStatus($id);
// Получение списка отправленных сообщений
$response = $smsAeroMessage->getList();
```

## Робота с контактами
```php
$smsAeroContact = new \SmsAero\SmsAeroContact(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Добавление контакта
$response = $smsAeroContact->create(['number' => 'номер абонента']);
// Удаление контакта
$response = $smsAeroContact->delete($id);
// Список контактов
$response = $smsAeroContact->getList();
// Добавление в черный список
$response = $smsAeroContact->toBlacklist(['number' => 'номер абонента']);
// Удаление из черного списка
$response = $smsAeroContact->deleteFromBlacklist($id);
// Список контактов в черном списке
$response = $smsAeroContact->getBlacklist();
// Создание запроса на проверку HLR
$response = $smsAeroContact->check(['number' => 'номер абонента']);
// Получение статуса HLR
$response = $smsAeroContact->status($id);
// Определение оператора
$response = $smsAeroContact->getOperator(['number' => 'номер абонента']);
```

## Робота с группами
```php
$smsAeroGroup = new \SmsAero\SmsAeroGroup(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Добавление группы
$response = $smsAeroGroup->create(['name' => 'название новой группы']);
// Удаление группы
$response = $smsAeroGroup->delete($id);
// Получение списка групп 
$response = $smsAeroGroup->getList();
```

## Робота с профилем
```php
$response = $smsAeroUser = new \SmsAero\SmsAeroUser(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Запрос баланса
$response = $smsAeroUser->getBalance();
// Запрос тарифа
$response = $smsAeroUser->getTariffs();
// Карты пользователя
$response = $smsAeroUser->getCards();
// Пополнение баланса
$response = $smsAeroUser->charge(['cardId' => $cardId, 'sum' => $sum]);
```

## Робота с Viber сообщениями
```php
$response = $smsAeroViber = new \SmsAero\SmsAeroViber(['Ваш E-mail на сайте', 'apiKey можно посмотреть в личном кабинете в разделе настройки -> API и SMPP']);
// Создание Viber-рассылки
$response = $smsAeroViber->send(['number' => 'номер абонента', 'sign' => 'имя отправителя', 'channel' => 'OFFICIAL', 'text' => 'текст сообщения']);
// Статистика по Viber-рассылке
$response = $smsAeroViber->getStat($id);
// Список Viber-рассылок
$response = $smsAeroViber->getList();
//Список доступных имен для Viber-рассылок
$response = $smsAeroViber->getSigns();
```

## Обработка ответа
```php
if ($response['success']) {
    echo 'Успешны запрос';
    // Массив с данными для дальнейшего действия
    print_r($response['data');
} else {
    echo 'Ошибка авторизации или валидации';
    // Массив или сообщение содержащие детальную информацию
    print_r($response['message');
}
```
