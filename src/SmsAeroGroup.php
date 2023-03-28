<?php

namespace SmsAero;

class SmsAeroGroup extends SmsAeroClient
{
    /**
     * Добавление группы
     *
     * @param $params
     * - string name Имя группы|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_7
     */
    public function create($params)
    {
        return $this->makeRequest('POST', 'group/add', $params);
    }

    /**
     * Удаление группы
     *
     * @param integer $id Идентификатор группы|Обязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_7
     */
    public function delete($id)
    {
        return $this->makeRequest('GET', 'group/delete', ['id' => $id]);
    }

    /**
     * Получение списка групп
     *
     * @param $params
     * - integer page Номер страницы|Необязательно
     * @return array
     * @throws \Exception
     * @link https://smsaero.ru/integration/documentation/api/#top_7
     */
    public function getList($params = [])
    {
        return $this->makeRequest('GET', 'group/list', $params);
    }
}