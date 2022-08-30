<?php

namespace TestWork\Model\Data;

use TestWork\Model\DBClasses\Model;

class EntityManager
{
    protected array $data = [];
    use MultitonTrait{
        MultitonTrait::__construct as private __stConstruct;
    }

    private function __construct($entityClass, $route){
        $this->__stConstruct($entityClass, $route);
        $this->parseEntity();
    }


    private function parseEntity()
    {
        $db = DatabaseConnect::getInstance($this->entityClass, $this->route);
        $db->connect();
        $data = $db->getData();
        foreach ($data as $object){
            $entity = new $this->entityClass;
            $entity->setId($object->id);
            $entity->setParams($object);
            $this->data[] = $entity;
        }
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function persist(Model $model)
    {
        $model->initId();
        $this->data[] = $model;
    }

    public function update(Model $model)
    {
        $id = $model->getId();
        foreach ($this->data as $key => $entity)
        {
            if($entity->getId == $id)
            {
                $this->data[$key] = $model;
            }
        }
    }

    public function delete(Model $model)
    {
        $id = $model->getId();
        foreach ($this->data as $key => $entity)
        {
            if($entity->getId == $id)
            {
                unset($this->data[$key]);
            }
        }
    }

    public function flush()
    {
        file_put_contents($this->route, json_encode($this->data));
    }
}