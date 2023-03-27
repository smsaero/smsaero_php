<?php

namespace SmsAero;

class SmsAeroMessage extends SmsAeroClient
{
    /**
     * Отправка SMS сообщений
     *
     * @param $params
     * - string number Номер телефона|Обязательно (на выбор)
     * - array numbers Номера телефонов|Обязательно (на выбор)
     * - string sign Имя отправителя|Обязательно
     * - string text Текст сообщения|Обязательно
     * - integer dateSend Дата для отложенной отправки сообщения (в формате unixtime)|Не обязательно
     * - string callbackUrl url для отправки статуса сообщения в формате https://your.site (в ответ система ждет статус 200)|Не обязательно
     * - integer shortLink 	При значении shortLink=1, все ссылки будут автоматически сокращены|Не обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_2
     */
    public function send($params)
    {
        return $this->makeRequest('POST', 'sms/send', $params);
    }

    /**
     * Проверка статуса SMS сообщения
     *
     * @param integer $id Идентификатор сообщения, который вернул сервис при отправке|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_3
     */
    public function getStatus($id)
    {
        return $this->makeRequest('GET', 'sms/status', ['id' => $id]);
    }

    /**
     * Получение списка отправленных сообщений
     *
     * @param $params
     * - string number Фильтровать сообщения по номеру телефона|Не обязательно
     * - string text Фильтровать сообщения по тексту|Не обязательно
     * - integer page Номер страницы|Не обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#tb_3_2
     */
    public function getList($params = [])
    {
        return $this->makeRequest('GET', 'sms/list', $params);
    }
}