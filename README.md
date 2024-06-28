## Objetivo
Ofrecer una forma sencilla de autenticar aplicaciones de una sola página (SPA) 
utilizando los servicios de autenticación de sesión basados ​​en cookies integrados de Laravel


##POSTMAN

# Post script


pm.sendRequest({
    url: 'http://localhost:8000/sanctum/csrf-cookie',
    method: 'GET'

}, function (error, response, {cookies}){
    if(!error){
        pm.collectionVariables.set('xsrf-cookie', cookies.get('XSRF-TOKEN'))
    }
}

)

# Registro

http://localhost:8000/api/register

{
    "name": "Nombre Apellido",
    "email": "email@gmail.com",
    "password": "12345",
    "password_confirmation": "12345"
}

# Login 

http://localhost:8000/api/login

{
 
    "email": "email@gmail.com",
    "password": "12345"
  
}