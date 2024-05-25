# Proyecto integrado 23-24

## Introduccion
Se trata de un proyecto de desarrollo web 
en el cual se busca crear una aplicación con la funcionalidad de una bolsa de 
trabajo en la que se puedan aplicar los conocimientos del curso poniéndolos en 
práctica con el desarrollo de este proyecto.

Dentro de este README se encuentra la guía a la documentación y código
correspondiente al proyecto.

## Tabla de contenidos

- [Proyecto integrado 23-24](#proyecto-integrado-23-24)
  - [Introduccion](#introduccion)
  - [Tabla de contenidos](#tabla-de-contenidos)
  - [Entregas](#entregas)
    - [Entrega 1 - Propuesta del proyecto](#entrega-1---propuesta-del-proyecto)
    - [Entrega 2 - Ante proyecto](#entrega-2---ante-proyecto)
  - [Objetivos](#objetivos)
    - [Objetivos tecnicos](#objetivos-tecnicos)
  - [Metodologia de trabajo](#metodologia-de-trabajo)
  - [Descripcion de la aplicacion](#descripcion-de-la-aplicacion)
  - [Documentación de la aplicacion](#documentación-de-la-aplicacion)
    - [Base de datos](#base-de-datos)
  - [Tecnologías utilizadas](#tecnologías-utilizadas)

## Entregas
Al ser un proyecto de desarrollo se realizará en varias partes, por lo que se necesita
tener un orden y documentación del proyecto adecuada con esto se busca tener un control
y seguimiento del proyecto. Todas las entregas que se realizarán en el transcurso de 
tiempo del proyecto se encontrarán en el directorio llamado [entregas](./entregas/), 
con su respectivo nombre correspondiente a la entrega que se realizó.

### Entrega 1 - Propuesta del proyecto

[Propuesta del proyecto](./entregas/anteproyecto/propuesta%20de%20proyecto)

### Entrega 2 - Ante proyecto
[entregas/anteproyecto](./entregas/anteproyecto/)


## Objetivos
Los objetivos que busco lograr con esta aplicacion son lo siguientes

- Crear una aplicacion con la funcionalidad de una bolsa de trabajo
- Desarrollar una interfaz para nuestros usuarios y empresas
- Crear una cuenta como empleador para publicar ofertas laborales
- Crear una cuenta como usuario para aplicar a estas ofertas aplicadas
- Aprender las bases del patron MVC
- Implementar una base de datos eficiente para el manejo de la cosultas de la apicacion
### Objetivos tecnicos
Funcionalidades de usuario:

- Registro de usuario
- Inicio de sesión
- Búsqueda de empleo
- Postulación a ofertas de trabajo

Funcionalidades de empresa:
- Registro de empresa
- Inicio de sesión
- Publicación de ofertas de trabajo

## Metodologia de trabajo
El desarrollo de la aplicacion esta basado en crear un producto inicial a que me refiero con esto de producto, basicamente a implementar una aplicacion con buenas bases para que pueda ser escalable en un futuro, sin dejar de lado que en esta forma de desarrollo las funcionalidades basicas de la aplicacion deben funcionar dejando la posiblidad de escalar con el tiempo.


## Descripcion de la aplicacion
La aplicacion de bolsa de trabajo hace las siguientes acciones,
nuestro usuario puede entrar a la aplicacion y tener una vista principal sobre ella en donde tiene una interfaz minimalista y se presentan algunas ofertas de trabajo que estan registradas en nuestra base de datos, este usuario debera crear una cuenta para poder aplicar y enviar una solicitud a la empresa que publico dicha oferta, 
en dado caso que este usuario sea un empleador o empresa tiene la opcion de crear una cuenta de empresa donde tendra funcionalidades especificas como publicar una oferta de trabajo y ver quienes son los
aspirantes a dicha publicacion para tomar la decision de rechazar 
o contactarse, nuestro usuario tambien podra ver su historial de solicitudes y el estatus de esta solictud.


## Documentación de la aplicacion

Aquí se encuentra toda la documentación técnica relacionada al proyecto, aquí encontrarás la guía y rutas que corresponden a la misma.

### Base de datos

Los diagramas entidad relacion correspondientes a la base de datos se encuntran en este link  [Modelo entidad relación](https://drive.google.com/file/d/1XWkLliBB5vRx6wLDfw2RARyTjqdRyn7d/view?usp=sharing)

Tablas

1. Usuarios
| Campo       | Descripción |
|-------------|-------------|
| id          | Identificador único del usuario |
| nombre      | Nombre del usuario |
| apellido    | Apellido del usuario |
| email       | Correo electrónico del usuario |
| password    | Contraseña del usuario |
| direccion   | Dirección del usuario |
| nif         | Número de identificación fiscal del usuario |
| descripccion| Descripción del usuario |
| rol_id      | Identificador del rol del usuario |
| fecha_creacion | Fecha y hora de cuando se creo el usuario|


2. roles

2. Roles
| Campo     | Descripción |
|-----------|-------------|
| id        | Identificador único del rol |
| rol_name  | Nombre del rol |

## Tecnologías utilizadas

Para el desarrollo de este proyecto se utilizarán las siguientes tecnologías:

- [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
- [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [TailwindCSS](https://tailwindcss.com/)

**¿Por qué estas tecnologías?**

**HTML, CSS y JavaScript:**
Estas tres tecnologías son la base fundamental para el desarrollo de cualquier aplicación web moderna. HTML proporciona la estructura básica de la página, CSS se encarga del diseño y la presentación, y JavaScript agrega interactividad y funcionalidad dinámica. Utilizaremos estas tecnologías para crear una interfaz de usuario atractiva, intuitiva y altamente funcional.

**PHP:**
PHP se utilizará para la lógica del lado del servidor. Con PHP, podremos manejar la lógica de negocio de la aplicación, procesar formularios, interactuar con la base de datos y generar contenido dinámico basado en las solicitudes del usuario. Su capacidad para integrarse con HTML facilita la generación de páginas web dinámicas y personalizadas.

**MySQL:**
MySQL será nuestra base de datos para almacenar y gestionar datos de manera eficiente. Utilizaremos MySQL para almacenar información de usuarios, contenido generado por los usuarios, configuraciones de la aplicación y otros datos relevantes. Su capacidad para realizar consultas complejas y su escalabilidad lo hacen ideal para aplicaciones web que manejan grandes volúmenes de datos.

**TailwindCSS:**
TailwindCSS se utilizará para facilitar el diseño y la estilización de la interfaz de usuario. Sus clases utilitarias permitirán diseñar rápidamente componentes personalizados y mantener un código CSS limpio y mantenible. Con TailwindCSS, se puede crear una interfaz de usuario coherente y estilizada sin necesidad de escribir mucho CSS personalizado.
