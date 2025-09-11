<?php

namespace SmsAero;

class SmsAeroTelegram extends SmsAeroClient
{
    /**
     * Отправка кода в Telegram
     *
     * @param $params
     * - string number Номер телефона|Обязательно (на выбор)
     * - array numbers Номера телефонов|Обязательно (на выбор)
     * - integer code Код Telegram (от 4 до 8 цифр)|Обязательно
     * - string sign Имя отправителя SMS|Необязательно
     * - string text Текст сообщения SMS|Необязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api#api_13
     */
    public function send($params)
    {
        return $this->makeRequest('POST', 'telegram/send', $params);
    }

    /**
     * Проверка статуса кода в Telegram
     *
     * @param integer $id Идентификатор сообщения, который вернул сервис при отправке|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api#api_13
     */
    public function getStatus($id)
    {
        return $this->makeRequest('GET', 'telegram/status', ['id' => $id]);
    }
}
