<?php

namespace Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManage()
    {
        $root = __DIR__ . "/../..";
        //Criar baseado em anotação
        $config = Setup::createAnnotationMetadataConfiguration(
            [$root . "/src"],
            true
        );
        $connect = [
            "driver" => "pdo_sqlite",
            "path" => $root . "/var/data/database.sqlite"
        ];
        // Dados de conexão, configurações
        return EntityManager::create($connect, $config);
    }
}