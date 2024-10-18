<?php

namespace application\services;

use \engine\Service;
use stdClass;

class APIService extends Service
{
  // construct de SERVICEs deve ser feito com init !!!

  /** 
   * Set a description for the API.
   * @return  string  $description
   */
  public function apiDescription()
  {
    $description = "Boas-vindas a API de testes LAMB, uma API REST desenvolvida para propósitos de estudos de Split PHP, APIs REST e implementação de CRUD";
    return $description;
  }

  /** 
   * Insert a new record in table 'people', using the data passed in $data.
   * @return  object  $newRecord    An object containing the new record data.
   */
  public function createPerson($data)
  {
    $newRecord  = $this->getTable('people')
      ->insert($data);
    
    return $newRecord;
  }

  /** 
   * Fetches a person in table 'people' from the database by their ID.
   * @param   string  $id 
   * @return  object  $person    An object containing the details of the person
   */
  public function getPersonById($id)
  {
    $person = $this->getTable('people')
      ->filter('id')->equalsTo($id)
      ->find("SELECT * FROM `people` WHERE id = ?id?");
    return $person;
  }

  /** 
   * Fetches all registers in table 'people' from the database.
   * @return  array   $results An array of objects where each object contains the details of a person
   */
  public function getPeople()
  {
    $results = $this->getTable('people')
      ->find();
    return $results;
  }

  /** 
   * Update the attributes of the person with the corresponding ID.
   * @param   string  $id 
   * @param   object  $data
   * @return  int     $affectedRows
   */
  public function updatePerson($id, $data)
  {
    $affectedRows = $this->getTable('people')
      ->filter('id')->equalsTo($id)
      ->update($data);
    return $affectedRows;
  }

  /** 
   * Deletes a person in table 'people' from the database by their ID.
   * @param   string  $id 
   * @return  int     $affectedRows
   */
  public function deletePerson($id)
  {
    $affectedRows = $this->getTable('people')
      ->filter('id')->equalsTo($id)
      ->delete();
    return $affectedRows;
  }

}