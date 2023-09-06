<?php

namespace SmsAero;

class SmsAeroWhatsapp extends SmsAeroClient
{
    /**
     * Отправка WhatsApp-сообщений
     * 
     * @param $params
     * - string sign Имя отправителя|Обязательно
     * - string address Номер телефона|Обязательно
     * - string contentType Тип сообщения(допустимые значения: text, image, document, video, audio)|Обязательно
     * - text Текст сообщения|Обязательно когда contentType=text
     * - attachmentUrl Ссылка на файл|Обязательно когда contentType=image, document, video, audio
     * - attachmentName Текст для вложения|Обязательно когда contentType=image, document, video, audio
     * - timeStart Время отправки в unixtime|Необязательно
     * !!Параметры ниже работают только для шаблона
     * - buttons Объект с кнопками|Необязательно
     *   - text Текст кнопки|Обязательно если передан объект buttons
     *   - buttonType Тип кнопки: QUICK_REPLY, URL, PHONE|Обязательно если передан объект buttons
     *   - payload Действие для быстрого ответа|Обязательно если buttonType=QUICK_REPLY
     *   - url URL на который ведёт нажатие кнопки|Обязательно если buttonType=URL
     *   - phone Номер телефона на который можно позвонить нажав на кнопку|Обязательно если buttonType=PHONE
     * - header Объект для описания заголовка|Необязательно
     *   - text Для текстового заголовка|Обязательно если передан объект header и заголовок текстовый
     *   - imageUrl Для заголовка-изображения|Обязательно если передан объект header и заголовок изображение
     *   - videoUrl Для видио-заголовка|Обязательно если передан объект header и заголовок видио
     *   - documentUrl Для документа-заголовка|Обязательно если передан объект header и заголовок документ
     * - footer Объект с подписью|Необязательно
     *   - text Текст подписи|Обязательно если передан объект footer
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api#api_11
     */
    function send($params)
    {
        return $this->makeRequest('POST', 'whatsapp/send', $params);
    }

    /**
     * Проверка статуса Whatsapp сообщения
     *
     * @param integer $id Идентификатор сообщения, который вернул сервис при отправке|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api#api_11
     */
    function getStatus($id)
    {
        return $this->makeRequest('POST', 'whatsapp/status', ['id' => $id]);
    }

    /**
     * Получение списка диалогов
     *
     * @param $params
     * - status 1 — открытые диалоги, 2 — закрытые диалоги|Необязательно
     * - limit Сколько сообщений диалогов за раз(по умолчанию 100)|Необязательно
     * - offset Начинать выводить с offset диалога(по умолчанию 0)|Необязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api#api_11
     */
    function getChats($params = [])
    {
        return $this->makeRequest('POST', 'whatsapp/get-chats', $params);
    }

    /**
     * Список сообщений по диалогу
     *
     * @param integer $id Идентификатор диалога, который вернул сервис при получении списка диалогов|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api#api_11
     */
    function getChatMsg($id)
    {
        return $this->makeRequest('POST', 'whatsapp/get-chat-msg', ['id' => $id]);
    }

    /**
     * Список всех сообщений
     *
     * @param $params
     * - limit Сколько сообщений диалогов за раз(по умолчанию 100)|Необязательно
     * - offset Начинать выводить с offset диалога(по умолчанию 0)|Необязательно
     * - timeFrom Фильтровать сообщения начиная с времени timeFrom(unixtime)|Необязательно
     * - timeTo Фильтровать сообщения до времени timeTo(unixtime)|Необязательно
     * - address Фильтровать сообщения по адресу получчателя|Необязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api#api_11
     */
    function getAllMsg($params = [])
    {
        return $this->makeRequest('POST', 'whatsapp/get-all-msg', $params);
    }
}