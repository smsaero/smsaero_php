<?php

namespace SmsAero;

class SmsAeroUser extends SmsAeroClient
{
    /**
     * Запрос баланса
     *
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_4
     */
    public function getBalance()
    {
        return $this->makeRequest('GET', 'balance');
    }

    /**
     * Запрос тарифа
     *
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_4
     */
    public function getTariffs()
    {
        return $this->makeRequest('GET', 'tariffs');
    }

    /**
     * Карты пользователя
     *
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_5
     */
    public function getCards()
    {
        return $this->makeRequest('GET', 'cards');
    }

    /**
     * Пополнение баланса
     *
     * @param $params
     * - integer sum Сумма пополнения|Обязательно
     * - integer cardId Идентификационный номер карты|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_5
     */
    public function charge($params)
    {
        return $this->makeRequest('POST', 'balance/add', $params);
    }
}