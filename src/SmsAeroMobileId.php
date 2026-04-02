<?php

namespace SmsAero;

class SmsAeroMobileId extends SmsAeroClient
{
    /**
     * Отправка запроса Mobile ID
     *
     * @param array $params
     * - string number Номер телефона|Обязательно
     * - string sign Имя отправителя|Обязательно
     * - string callbackUrl URL для получения результата|Обязательно
     * @return array
     * @throws \Exception
     */
    public function send($params)
    {
        return $this->makeRequest('POST', 'mobile-id/send', $params);
    }

    /**
     * Проверка статуса запроса Mobile ID
     *
     * @param integer $id Идентификатор запроса, полученный при отправке|Обязательно
     * @return array
     * @throws \Exception
     */
    public function getStatus($id)
    {
        return $this->makeRequest('GET', 'mobile-id/status', ['id' => $id]);
    }

    /**
     * Верификация кода Mobile ID
     *
     * @param array $params
     * - integer id Идентификатор запроса|Обязательно
     * - string code Код подтверждения|Обязательно
     * @return array
     * @throws \Exception
     */
    public function verify($params)
    {
        return $this->makeRequest('POST', 'mobile-id/verify', $params);
    }
}
