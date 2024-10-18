<?php

namespace application\routes;

use engine\RestService;
use application\services\APIService;

class API extends RestService
{
  public function init()
  {
    $this->setAntiXsrfValidation(false);

    // Home Page Endpoints:
		$this->addEndpoint('GET', '/home', function ($params) {
      $title = 'Boas-vindas';
      $description = $this->getService('APIService')->apiDescription();

    return $this->response
      ->withStatus(200)
      ->withHTML($this->renderTemplate('home', ['title' => $title, 'description' => $description]));
    });

  // ------- C - CREATE

     // Endpoint POST para adicionar uma nova pessoa
     $this->addEndpoint('POST', '/people', function ($params) {
      $data = 1; // Coletar os dados enviados no corpo da requisição
      $newPerson = $this->getService('people')->createPerson($data);

      return $this->response
        ->withStatus(201)
        ->withData($newPerson);
    });

  // ------- R - READ
    // Endpoint GET para listar todos atributos do cadastro
    $this->addEndpoint('GET', '/attributes', function ($params) {
      $attributes = $this->getService('APIService')->getAttributes();

      return $this->response
      ->withStatus(200)
      ->withData($attributes);
    });

    // Endpoint GET para listar todas as pessoas
    $this->addEndpoint('GET', '/people', function ($params) {
      $people = $this->getService('APIService')->getPeople();

      return $this->response
      ->withStatus(200)
      ->withData($people);
    });

    // Endpoint GET para buscar uma pessoa por ID
    $this->addEndpoint('GET', '/people/{id}', function ($params) {
      $id = $params['id'];
      $person = $this->getService('people')->getPersonById($id);

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

  // ------- U - UPDATE
    // Endpoint PUT para atualizar uma pessoa existente
    $this->addEndpoint('PUT', '/people/{id}', function ($params) {
      $id = $params['id'];
      $data = 1; // Coletar os dados enviados no corpo da requisição

      $updatedPerson = $this->getService('people')->updatePerson($id, $data);

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
    $this->addEndpoint('DELETE', '/people/{id}', function ($params) {
      $id = $params['id'];

      $deleted = $this->getService('people')->deletePerson($id);

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