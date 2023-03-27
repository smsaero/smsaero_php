<?php

namespace SmsAero;

class SmsAeroContact extends SmsAeroClient
{
    /**
     * Добавление контакта
     *
     * @param $params
     * - string number Номер абонента|Обязательно
     * - integer groupId Идентификатор группы|Не обязательно
     * - integer birthday Дата рождения абонента (в формате unixtime)|Не обязательно
     * - string sex Пол(допустимые значения: male/female)|Не обязательно
     * - string lname Фамилия абонента|Не обязательно
     * - string fname Имя абонента|Не обязательно
     * - string sname Отчество абонента|Не обязательно
     * - string param1 Свободный параметр|Не обязательно
     * - string param2 Свободный параметр|Не обязательно
     * - string param3 Свободный параметр|Не обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_8
     */
    public function create($params)
    {
        return $this->makeRequest('POST', 'contact/add', $params);
    }

    /**
     * Удаление контакта
     *
     * @param integer $id Идентификатор абонента|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_8
     */
    public function delete($id)
    {
        return $this->makeRequest('GET', 'contact/delete', ['id' => $id]);
    }

    /**
     * Список контактов
     *
     * @param $params
     * - string number Номер абонента|Не обязательно
     * - integer groupId Идентификатор группы|Не обязательно
     * - string sex Пол(допустимые значения: male/female)|Не обязательно
     * - string operator Оператора контакта(допустимые значения: MEGAFON, MTS, BEELINE, TELE2, OTHER)|Не обязательно
     * - string lname Фамилия абонента|Не обязательно
     * - string fname Имя абонента|Не обязательно
     * - string sname Отчество абонента|Не обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_8
     */
    public function getList($params = [])
    {
        return $this->makeRequest('GET', 'contact/list', $params);
    }

    /**
     * Добавление в черный список
     *
     * @param $params
     * - string number Номер абонента|Обязательно
     * - integer groupId Идентификатор группы|Не обязательно
     * - integer birthday Дата рождения абонента (в формате unixtime)|Не обязательно
     * - string sex Пол(допустимые значения: male/female)|Не обязательно
     * - string lname Фамилия абонента|Не обязательно
     * - string fname Имя абонента|Не обязательно
     * - string sname Отчество абонента|Не обязательно
     * - string param1 Свободный параметр|Не обязательно
     * - string param2 Свободный параметр|Не обязательно
     * - string param3 Свободный параметр|Не обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_9
     */
    public function toBlacklist($params)
    {
        return $this->makeRequest('POST', 'blacklist/add', $params);
    }

    /**
     * Удаление из черного списка
     *
     * @param integer $id Идентификатор абонента|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_9
     */
    public function deleteFromBlacklist($id)
    {
        return $this->makeRequest('GET', 'blacklist/delete', ['id' => $id]);
    }

    /**
     * Список контактов в черном списке
     *
     * @param $params
     * - string number Номер абонента|Не обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_9
     */
    public function getBlacklist($params = [])
    {
        return $this->makeRequest('GET', 'blacklist/list', $params);
    }

    /**
     * Создание запроса на проверку HLR
     *
     * @param $params
     * - string number Номер телефона|Обязательно (на выбор)
     * - array numbers Номера телефонов|Обязательно (на выбор)
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_10
     */
    public function check($params)
    {
        return $this->makeRequest('POST', 'hlr/check', $params);
    }

    /**
     * Получение статуса HLR
     *
     * @param integer $id Идентификатор запроса|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_10
     */
    public function status($id)
    {
        return $this->makeRequest('GET', 'hlr/status', ['id' => $id]);
    }

    /**
     * Определение оператора
     *
     * @param $params
     * - string number Номер телефона|Обязательно (на выбор)
     * - array numbers Номера телефонов|Обязательно (на выбор)
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_10
     */
    public function getOperator($params)
    {
        return $this->makeRequest('POST', 'number/operator', $params);
    }
}