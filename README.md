# Bolsa de Trabajo

## Introducción
Este proyecto de desarrollo web tiene como objetivo crear una aplicación con la funcionalidad de una bolsa de trabajo. A través de este proyecto, se busca aplicar los conocimientos adquiridos durante el curso y ponerlos en práctica.

Dentro de este README se encuentra la guía a la documentación y código correspondiente al proyecto.

## Tabla de Contenidos


  - [Introducción](#introducción)
  - [Tabla de Contenidos](#tabla-de-contenidos)
  - [Entregas](#entregas)
    
  - [Objetivos](#objetivos)
    - [Objetivos Técnicos](#objetivos-técnicos)
  - [Metodología de Trabajo](#metodología-de-trabajo)
  - [Descripción de la Aplicación](#descripción-de-la-aplicación)
  - [Documentación de la Aplicación](#documentación-de-la-aplicación)
    - [Base de Datos](#base-de-datos)
      - [Tablas](#tablas)
  - [Tecnologías Utilizadas](#tecnologías-utilizadas)

## Entregas
El proyecto se realizará en varias partes, por lo que se necesita un orden y documentación adecuada para el control y seguimiento del proyecto. Todas las entregas se encontrarán en el directorio llamado [entregas](./entregas/).

### Entrega 1 - Propuesta del Proyecto
[Propuesta del Proyecto](./entregas/anteproyecto/propuesta%20de%20proyecto)

### Entrega 2 - Ante Proyecto
[Ante Proyecto](./entregas/anteproyecto/)

## Objetivos
Los objetivos del proyecto son los siguientes:

- Crear una aplicación con la funcionalidad de una bolsa de trabajo.
- Desarrollar una interfaz para usuarios y empresas.
- Permitir a los empleadores publicar ofertas laborales.
- Permitir a los usuarios aplicar a las ofertas laborales.
- Aprender las bases del patrón MVC.
- Implementar una base de datos eficiente para el manejo de consultas.

### Objetivos Técnicos
Funcionalidades de usuario:

- Registro de usuario
- Inicio de sesión
- Búsqueda de empleo
- Postulación a ofertas de trabajo

Funcionalidades de empresa:

- Registro de empresa
- Inicio de sesión
- Publicación de ofertas de trabajo

## Metodología de Trabajo
El desarrollo de la aplicación está basado en la creación de un producto mínimo viable (MVP) con una buena base para ser escalable en el futuro. Las funcionalidades básicas deben funcionar correctamente, dejando la posibilidad de escalar con el tiempo.

## Descripción de la Aplicación
La aplicación de bolsa de trabajo realiza las siguientes acciones:

- Los usuarios pueden ver una interfaz minimalista con ofertas de trabajo registradas en la base de datos.
- Los usuarios deben crear una cuenta para aplicar y enviar solicitudes a las empresas.
- Los empleadores pueden crear una cuenta de empresa para publicar ofertas de trabajo y gestionar las postulaciones recibidas.
- Los usuarios pueden ver su historial de solicitudes.

## Documentación de la Aplicación
Aquí se encuentra toda la documentación técnica relacionada al proyecto, incluyendo guías y rutas correspondientes.

### Base de Datos
Los diagramas entidad-relación correspondientes a la base de datos se encuentran en este enlace: [Modelo entidad-relación](https://drive.google.com/file/d/1XWkLliBB5vRx6wLDfw2RARyTjqdRyn7d/view?usp=sharing)

#### Tablas

1. **Usuarios**

| Campo           | Descripción                                   |
|-----------------|-----------------------------------------------|
| id              | Identificador único del usuario               |
| nombre          | Nombre del usuario                            |
| apellido        | Apellido del usuario                          |
| email           | Correo electrónico del usuario                |
| password        | Contraseña del usuario                        |
| direccion       | Dirección del usuario                         |
| nif             | Número de identificación fiscal del usuario   |
| descripcion     | Descripción del usuario                       |
| rol_id          | Identificador del rol del usuario             |
| fecha_creacion  | Fecha y hora de creación del usuario          |

2. **Roles**

| Campo     | Descripción                     |
|-----------|---------------------------------|
| id        | Identificador único del rol     |
| rol_name  | Nombre del rol                  |

3. **Empresas**

| Campo           | Descripción                           |
|-----------------|---------------------------------------|
| id              | Identificador único de la empresa     |
| nombre_empresa  | Nombre de la empresa                  |
| industria       | Industria de la empresa               |
| locacion        | Ubicación de la empresa               |
| nif             | Número de identificación fiscal       |
| descripcion     | Descripción de la empresa             |
| telefono        | Teléfono de la empresa                |
| email           | Correo electrónico de la empresa      |
| password        | Contraseña de la empresa              |
| rol_id          | Identificador del rol (clave foránea) |

4. **Ofertas de trabajo**

| Campo              | Descripción                           |
|--------------------|---------------------------------------|
| id                 | Identificador único de la oferta      |
| empresa_id         | Identificador de la empresa           |
| nombre_trabajo     | Nombre del trabajo                    |
| descripcion        | Descripción del trabajo               |
| requisitos         | Requisitos para el trabajo            |
| salario            | Salario ofrecido                      |
| ubicacion          | Ubicación del trabajo                 |
| duracion           | Duración del contrato                 |
| contrato           | Tipo de contrato                      |
| fecha_publicacion  | Fecha de publicación de la oferta     |

5. **Aplicaciones**

| Campo              | Descripción                           |
|--------------------|---------------------------------------|
| id                 | Identificador único de la aplicación  |
| usuario_id         | Identificador del usuario             |
| estado             | Estado de la aplicación               |
| oferta_id          | Identificador de la oferta de trabajo |
| fecha_publicacion  | Fecha de publicación de la aplicación |

## Tecnologías Utilizadas
Para el desarrollo de este proyecto se utilizarán las siguientes tecnologías:

- [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
- [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [TailwindCSS](https://tailwindcss.com/)

**¿Por qué estas tecnologías?**

**HTML, CSS y JavaScript:**
Estas tres tecnologías son la base fundamental para el desarrollo de cualquier aplicación web moderna. HTML proporciona la estructura básica de la página, CSS se encarga del diseño y la presentación, y JavaScript agrega interactividad y funcionalidad dinámica.

**PHP:**
PHP se utilizará para la lógica del lado del servidor. Con PHP, podremos manejar la lógica de negocio de la aplicación, procesar formularios, interactuar con la base de datos y generar contenido dinámico basado en las solicitudes del usuario.

**MySQL:**
MySQL será nuestra base de datos para almacenar y gestionar datos de manera eficiente. Utilizaremos MySQL para almacenar información de usuarios, contenido generado por los usuarios, configuraciones de la aplicación y otros datos relevantes. Su capacidad para realizar consultas complejas y su escalabilidad lo hacen ideal para aplicaciones web que manejan grandes volúmenes de datos.

**TailwindCSS:**
TailwindCSS se utilizará para facilitar el diseño y la estilización de la interfaz de usuario. Sus clases utilitarias permitirán diseñar rápidamente componentes personalizados y mantener un código CSS limpio y mantenible. Con TailwindCSS, se puede crear una interfaz de usuario coherente y estilizada sin necesidad de escribir mucho CSS personalizado.
