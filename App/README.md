# Documentacion tecnica del proyecto Bolsa de trabajo

Esta es una guia de documentacion tecnica del proyecto en donde se encuentra toda la historia de desarrollo del proyecto, asi como la configuracion del servidor de desarrollo, cual es la estructura del proyecto.

## Tabla de contenidos

- [Documentacion tecnica del proyecto Bolsa de trabajo](#documentacion-tecnica-del-proyecto-bolsa-de-trabajo)
  - [Tabla de contenidos](#tabla-de-contenidos)
  - [Como instalar el proyecto](#como-instalar-el-proyecto)
- [Configuración del servidor de desarrollo](#configuración-del-servidor-de-desarrollo)
  - [PHP Built-in Server](#php-built-in-server)
  - [BrowserSync](#browsersync)
  - [Tailwind CSS](#tailwind-css)
  - [Concurrently](#concurrently)
  - [NPM Scripts](#npm-scripts)

## Como instalar el proyecto

- 1. Clonar el repositorio
  ```
  git clone https://github.com/iesfuengirola1es/proyectointegrado2t2024-DiosTeOdia.git
  ```
- 2. Instalar las dependencias
  ```
  cd App
  npm install
  ```
- 3. Iniciar el servidor de desarrollo
  ```
  npm run dev
  ```

Para lo anterior te funcione debes asegurarte de tener instalado PHP en tu computadora, si no lo tienes instalado puedes descargarlo desde la [página oficial de PHP](https://www.php.net/downloads).

Ademas de tener instalado Node.js en tu computadora, si no lo tienes instalado puedes descargarlo desde la [página oficial de Node.js](https://nodejs.org/).

# Configuración del servidor de desarrollo

## PHP Built-in Server

PHP viene con un servidor web incorporado para el desarrollo. El comando `php -S localhost:3000` inicia este servidor en el puerto 3000. Puedes leer más sobre esto en la [documentación oficial de PHP](https://www.php.net/manual/en/features.commandline.webserver.php).

## BrowserSync

BrowserSync es una herramienta que te ayuda a probar tu sitio web. Puede iniciar un servidor web, recargar tu navegador automáticamente cuando cambias archivos en tu proyecto, y muchas otras cosas. En este caso, lo estamos utilizando para recargar tu navegador automáticamente cuando cambias archivos. Puedes leer más sobre BrowserSync en su [documentación oficial](https://www.browsersync.io/).

## Tailwind CSS

Tailwind CSS es un framework de CSS que te permite construir diseños personalizados sin salir de tu HTML. El comando `npx tailwindcss -i ./src/css/main.css -o ./public/assets/css/main.css --watch` le dice a Tailwind que observe el archivo `main.css` y que recompile tu CSS cuando se realicen cambios. Puedes leer más sobre Tailwind en su [documentación oficial](https://tailwindcss.com/docs).

## Concurrently

Concurrently es una herramienta que te permite ejecutar múltiples comandos npm al mismo tiempo. En este caso, lo estamos utilizando para ejecutar el servidor PHP, BrowserSync y Tailwind al mismo tiempo. Puedes leer más sobre Concurrently en su [documentación oficial](https://www.npmjs.com/package/concurrently).

## NPM Scripts

Los scripts NPM son una forma de automatizar tareas en tu proyecto. En este caso, hemos definido varios scripts en tu `package.json` para iniciar el servidor PHP, iniciar BrowserSync, y observar los cambios en tu CSS con Tailwind. Puedes leer más sobre los scripts NPM en la [documentación oficial de NPM](https://docs.npmjs.com/cli/v7/using-npm/scripts).
