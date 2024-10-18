<?php

namespace application\services;

use \engine\Service;

class APIService extends Service
{
  protected $db;

  public function __construct()
  {
    // $this->db = Database::get();
  }

  public function apiDescription()
  {
    $msg = "Boas-vindas a API de testes LAMB, uma API REST desenvolvida para propósitos de estudos de Split PHP, APIs REST e implementação de CRUD";
    return $msg;
  }

  public function getPeople()
  {
    $results = $this->getTable('PEOPLE');
    return $results;
  }
}