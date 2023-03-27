<?php

namespace SmsAero;

class SmsAeroViber extends SmsAeroClient
{
    /**
     * Создание Viber-рассылки
     *
     * @param array $params
     * - string number Номер телефона|Обязательно (на выбор)
     * - array numbers Номера телефонов|Обязательно (на выбор)
     * - integer groupId ID группы по которой будет произведена рассылка. Для выбора всех контактов необходимо передать значение "all"|Обязательно (на выбор)
     * - string sign Имя отправителя|Обязательно
     * - string channel Канал отправки Viber(значение: OFFICIAL или CASCADE для Viber-каскад)|Обязательно
     * - string text Текст сообщения|Обязательно
     * - string imageSource Картинка кодированная в base64 формат, не должна превышать размер 300 kb. Отправка поддерживается только в 3 форматах: png, jpg, gif. Перед кодированной картинкой необходимо указывать ее формат. Пример: jpg#TWFuIGlzIGRpc3Rpbmd1aXNoZ. Отправка доступна только методом POST.
    Параметр передается совместно с textButton и linkButton|Не обязательно
     * - string textButton Текст кнопки. Максимальная длина 30 символов. Параметр передается совместно с imageSource и linkButton|Не обязательно
     * - string linkButton Ссылки для перехода при нажатие кнопки. Ссылка должна быть с указанием http:// или https://. Параметр передается совместно с imageSource и textButton|Не обязательно
     * - integer dateSend Дата для отложенной отправки рассылки (в формате unixtime)|Не обязательно
     * - string signSms Имя для SMS-рассылки. Используется при выборе канала "Viber-каскад" (channel=CASCADE). Параметр обязателен|Не обязательно
     * - string textSms Текст сообщения для SMS-рассылки. Используется при выборе канала "Viber-каскад" (channel=CASCADE)/Параметр обязателен если channel=CASCADE
     * - integer priceSms Максимальная стоимость SMS-рассылки. Используется при выборе канала "Viber-каскад" (channel=CASCADE). Если параметр не передан, максимальная стоимость будет рассчитана автоматически|Не обязательно
     * - float timeout Тайм-аут отправки SMS. Возможные значения: 0.25 — 15 минут, 0.5 — 30 минут, 1 — 1 час, 3 — 3 часа, 6 — 6 часов, 12 — 12 часов, 24 — 24 часа|Не обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_11
     */
    public function send($params)
    {
        return $this->makeRequest('POST', 'viber/send', $params);
    }

    /**
     * Статистика по Viber-рассылке
     *
     * @param integer $id Идентификатор Viber-рассылки в системе|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_11
     */
    public function getStat($id)
    {
        return $this->makeRequest('GET', 'viber/statistic', ['sendingId' => $id]);
    }

    /**
     * Список Viber-рассылок
     *
     * @param array $params
     * - integer page Номер страницы|Не обязательно
     * @return array
     * @throws \Exception
     */
    public function getList($params = [])
    {
        return $this->makeRequest('GET', 'viber/list', $params);
    }

    /**
     * Список доступных имен для Viber-рассылок
     *
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_11
     */
    public function getSigns()
    {
        return $this->makeRequest('GET', 'viber/sign/list');
    }
}