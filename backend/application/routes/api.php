<?php

namespace application\routes;

use engine\WebService;
use engine\Request;

class API extends WebService
{
  public function init()
  {
    $this->setAntiXsrfValidation(false);

    // Home Page Endpoints:
		$this->addEndpoint('GET', '/home', function () {
      $title = 'Boas-vindas';
      $description = $this->getService('APIService')->apiDescription();

    return $this->response
      ->withStatus(200)
      ->withHTML($this->renderTemplate('home', ['title' => $title, 'description' => $description]));
    });

  // ------- C - CREATE
     // Endpoint POST para adicionar uma nova pessoa
     $this->addEndpoint('POST', '/people', function ($params) {
      $newPerson = $this->getService('APIService')->createPerson($params);

      return $this->response
        ->withStatus(201)
        ->withData($newPerson);
    });

  // ------- R - READ
    // Endpoint GET para buscar uma pessoa por ID
    $this->addEndpoint('GET', '/people/?id?', function ($params) {
      $id = $params['id'];
      $person = $this->getService('APIService')->getPersonById($id);
      if ($person) {
        return $this->response
          ->withStatus(200)
          ->withData($person);
      } else {
        return $this->response
          ->withStatus(404)
          ->withData(['error' => 'Person not found']);
      }
    });

    // Endpoint GET para listar todas as pessoas
    $this->addEndpoint('GET', '/people', function () {
      $people = $this->getService('APIService')->getPeople();

      return $this->response
      ->withStatus(200)
      ->withData($people);
    });


  // ------- U - UPDATE
    // Endpoint PUT para atualizar uma pessoa existente
    $this->addEndpoint('PUT', '/people/?id?', function ($params) {
      $id = $params['id'];
      $updatedPerson = $this->getService('APIService')->updatePerson($id, $params);

      if ($updatedPerson) {
        return $this->response
          ->withStatus(200)
          ->withData($updatedPerson);
      } else {
        return $this->response
          ->withStatus(404)
          ->withData(['error' => 'Person not found or not updated']);
      }
    });

  // ------- D - DELETE
    // Endpoint DELETE para remover uma pessoa
    $this->addEndpoint('DELETE', '/people/?id?', function ($params) {
      $id = $params['id'];

      $deleted = $this->getService('APIService')->deletePerson($id);

      if ($deleted) {
        return $this->response
          ->withStatus(200)
          ->withData(['message' => 'Person deleted']);
      } else {
        return $this->response
          ->withStatus(404)
          ->withData(['error' => 'Person not found']);
      }
    });
  }
}