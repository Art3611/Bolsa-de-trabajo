# Documentacion de la aplicacion bolsa de trabajo
Generalmente siguiendo las buenas practicas de programacion todo el codigo de la
aplicacion se encuentra documentado con comentarios para explicar que es lo que 
hace cada clase y metodo de nuestra aplicacion

## Descripcion

Se trata de una aplicacion que hace la funcion de una bolsa de trabajo
en la cual los usuarios pueden registrarse y postularse a las ofertas de trabajo
que se encuentren disponibles en la aplicacion.

La aplicacion trata de implementar el patron de diseño MVC (Modelo Vista Controlador)
a un nivel simple para manterner la organizacion del codigo y optimizar el desarrollo.

Explico un podo como esta implementado
Dentro del proyecto encontramos los siguientes directorios

**controllers** -> Intermediario entre nuesto modelo y vistas.

**models** -> Aqui se encuentra la logica de consulta de nuestros usuarios.

**views** -> Aqui se encuentran las vistas correspondientes a nuestra aplicacion.

**lib** -> Aqui se encuentra las clases basicas de las cuales eredamos a nuestras demas clases
en los anteriores directorios mencionados.

En el archivo **App**.php
Aqui se encuentra la logica implementada para manejar las rutas de la aplicacion
y la redireccion a de los controladores

En **index.php** se encuentra la carga de nuestras clases para iniciar la aplicacion

**config**
En el directorio config se encuentra un archivo con constantes necesarias
en nuestra aplicacion

**.htaccess**
Aplica las reglas de configuracion del servidor


  
## Estructura de directorios

```
|── bolsa-trabajo
│  ├── controllers
│  ├── lib
│  │  └── app.php
│  ├── models
│  ├── public
│  │  └── css
│  └── views
│  └── config
|  ├── index.php
|  ├── README.md
```

## Tecnologias

- HTML
- CSS
- JavaScript
- PHP
- MySQL
- Tailwind CSS
