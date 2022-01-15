# 21724 - Aplicacions Distribuïdes a Internet i Interficies d'Usuari

## [***Data Dashboard***](https://github.com/aNDREUET648/adiu_datadashboard)


## Tabla de contenido
- [Introducción](#introducción)
- [Enunciado](#enunciado)
- [Requisitos mínimos](#requisitos-mínimos)
- [Versión Avanzada](#versión-avanzada)
- [Estructura](#estructura)
- [Consideraciones](#consideraciones)
  - [Sobre la Hoja de estilos](#sobre-la-hoja-de-estilos)
  - [Carácteres especiales](#carácteres-especiales)
  - [Accesibilidad](#accesibilidad)
  - [Validación del código](#validación-del-código)
  - [HTML Responsive Web Design](#HTML-Responsive-Web-Design)
- [Bibliografía y Herramientas](#bibliografía-y-herramientas)

### Introducción

Este archivo `README.md` documenta el desarrollo de la práctica principal en HTML.

---

### Enunciado

La práctica consiste en crear un panel de datos (Data Dashboard). Este panel cogería los datos de una base de datos de su elección en PhPMyAdmin, Xampp. Es un ejemplo de una aplicación web distribuida que tiene un front-end y un back-end.

El desarrollo de la practica será utilizando:
  - Bootstrap: para configurar el front-end.
  - JavaScript y JQuery: para poder modificar los contenidos del DOM de la página web. 
  - Se puede usar Ajax de JQuery para extraer los datos de los archivos del servidor Apache (Xampp) i modificar los contenidos del DOM de la web en base a lo recibido.
  - HighCharts y/o HighMaps: para hacer las visualizaciones en el dashboard.
  - Xampp, php: para el servidor web.

#### Requisitos mínimos

  - La parte superior del tablero debe tener una barra de navegación que contenga un vínculo con una clase navbar-brand para el título del dashboard y un atributo href igual a "#", un vínculo al sitio web de la UIB y otro vínculo a la fuente de datos. Puede agregar otros enlaces si lo desea.
  - Mínimo tres visualizaciones con Highcharts y/o highmaps.

#### Versión avanzada

  Una versión avanzada opcional de la práctica puede ser mediante extraer datos de una API. API son las siglas de Application Programming Interface (Interfaz de programación de aplicaciones). 
  Una API proporciona una forma conveniente para que dos aplicaciones se comuniquen entre sí. 
  El beneficio es que, si los datos alguna vez cambian, su aplicación web automáticamente tendrá los datos correctos.

  [Enunciado Original](https://github.com/aNDREUET648/adiu_datadashboard/blob/master/Data%20Dashboard/Enunciado%20de%20la%20pr%C3%A1ctica.pdf)

---

### Estructura


```
Data Dashboard
├── index.php                             Página web principal (.php)
├── Enunciado de la práctica.pdf          Documento original de la práctica
├── images                                Directorio de las imágenes
│   └── black_flag_logo-768x768.png       Logo de la barra de navegación
│   └── favicon.ico                       Icono de la página (Favorite Icon)
│   └── Página Principal.png              Imagen de muestra de la página finalizada
├── js
│   └── client.js                         JavaScript referenciado en la página principal (index.php) 
│                                         donde realizo mis peticiones jQuery.post al servidor
└── server                                Carpeta "lado servidor"
    └── conexion.php                      Conexión con la base de datos
    └── server.php                        Gestiono los query de MySQL y los devuelvo al cliente
    └── sql
        └── Chinook_MySql.sql             Archivo de datos SQL (versión original)
        └── Chinook - Estructura BD.pdf   Documento que muestra como está construida la BD
        └── chinook               
            └── .IBD, .FRM, .OPT files    Archivos de estructura y formato de la base de datos

```
---

### Consideraciones

#### Sobre la página principal

  A continuación vemos una imagen ejemplo de lo que la página muestra al acceder a ella

 ![Sample Page](./blob/master/Data%20Dashboard/images/sample_page.png?raw=true "Muestra de la página resultante")
  
  
```
  <head>
    <link rel="stylesheet" href="hojaestilos.css">
  </head>
```

#### Carácteres especiales

Mediante el uso de `<meta charset="UTF-8">` represento la codificación de carácteres UTF-8 (estándar en HTML5) aunque es posible que en algún proceso:

- Otra persona interviene en la creación de la página y emplea codificación 88509-1.
- El servidor web guarda las páginas HTML estáticas.
- El cliente web del usuario no representa igual las páginas....

Para la representación del texto uso una herramienta online para convertir el texto simple a
codificación html (www.textfixeres.com/html/texto-a-html.php)

#### Accesibilidad

Durante la confección de la página se ha tenido todo el tiempo en cuenta el diseño pensando en la accesibilidad. Una vez finalizada, se ha testeado manualmente y validado con distintas herramientas tanto online como extensiones del navegador obteniendo un _Nivel de Conformidad AA_ indicándose así que se han cumplido todos los puntos de control de Prioridad 1 y Prioridad 2 definidos en las Directrices de la **WAI** (_Web Accessibility Initiative_). Incluyendo al final de la página el icono correspondiente a su Nivel de Conformidad.

#### Validación del código

Del mismo modo finalizada la codificación de la página y para comprobar que todo mi código, tanto el HTML como la hoja de estilos CSS eran correctos también han sido evaluados con los validadores de la **W3C** (_The World Wide Web Consortium_) y con un resultado que el archivo ```hojaestilos.css``` es _CSS versión 3 + SVG_ válido! y el archivo ```index.html``` es _Valid XHTML 1.0 Strict_. Es por ello que, al final de la página he incluído los iconos correspondientes.

#### HTML Responsive Web Design


Revisando el tutorial que ofrece w3c.org [Tutorial HTML](https://www.w3schools.com/html) me fije que tienen un apartado de [HTML Responsive](https://www.w3schools.com/html/html_responsive.asp) con la idea de adaptar la apariencia de las páginas web al dispositivo que se esté utilizando, ya sean móviles, laptops, tablets o desktops. Y aprovechando que era mi primera página web aproveché para incluir simplemente unos `media-query` o `breakpoints`como los llaman para dependiendo de donde se estuviese viendo la página se adaptase en tamaño. Destaqué cuatro tipos, todos los valores los extraje de información del framework `Bootstrap` considerándose como los más comunes.

---

### Bibliografía y Herramientas

  - [w3schools](https://www.w3schools.com/default.asp) - Tutoriales HTML, PHP, JavaScript, jQuery
  - [jQuery](https://jquery.com/) - Biblioteca multiplataforma de JavaScript. Manuales de referencia (Write less, do more)
  - [php](https://www.php.net/) - Lenguaje de programación. Manuales de referencia
  - [Bootstrap](https://getbootstrap.com/) - Biblioteca multiplataforma para el diseño de sitios y aplicaciones web (front-end side). Templates y documentación de referencia
  - [HighCharts](https://www.highcharts.com/) - Biblioteca en JavaScript para visualización de gráficos (back-end side). Templates y documentación de referencia

---
[aNDREUET648](https://github.com/aNDREUET648)
