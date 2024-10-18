const API_URL = 'http://localhost:3000';

// API RESTfull -> CRUD

// ------- C - CREATE
export const createPerson = async (personData) => {
  try {
    const response = await fetch(`${API_URL}/people`, {
      method: 'POST',
      headers:{'Content-Type': 'application/json'},
      body: JSON.stringify(personData)
    });

    if (!response.ok) {
      throw new Error('Erro ao criar registro');
    }
    return await response.json();

  } catch(error) {
    console.error(error);
    throw error;
  }
};

// ------- R - READ
export const getAttributes = async () => {
  try {
    const response = await fetch(`${API_URL}/attributes`);
    if (!response.ok) {
      throw new Error('Erro ao buscar atributos');
    }
    return await response.json();

  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const getPeople = async () => {
  try {
    const response = await fetch(`${API_URL}/people`);
    if (!response.ok) {
      throw new Error('Erro ao buscar registro');
    }
    return await response.json();

  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const getPersonById = async (id) => {
  try {
    const response = await fetch(`${API_URL}/people/${id}`);
  
    if (!response.ok) {
      throw new Error(`Erro ao buscar registro ${id}`);
    }
    return await response.json();

  } catch (error) {
    console.error(error);
    throw error;
  }
};

// ------- U - UPDATE
export const updatePerson = async (id, personData) => {
  try {    
    const response = await fetch(`${API_URL}/people/${id}`, {
      method: 'PUT',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify(personData)
    });
    
    if(!response.ok) {
      throw new Error('Erro ao atualizar o registro');
    }
    return await response.json();
    
  } catch(error) {
    console.error(error);
    throw error;
  }
}

// ------- D - DELETE
export const deletePerson = async (id) => {
  try {
    const response = await fetch(`${API_URL}/people/${id}`, {
      method: 'DELETE',
    });

    if(!response.ok) {
      throw new Error('Erro ao deletar o registro');
    }
    return await response.json();

  } catch (error) {
    console.error(error);
    throw error;
  }
};
  