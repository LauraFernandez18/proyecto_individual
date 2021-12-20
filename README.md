Host de la página web: https://morfeo21-laura.000webhostapp.com

# MORFEO21

Está página consiste en una página web para poder controlar las reservas de mesas en un restaurante, podemos reservar las mesas en un día y a una hora en concreto.  

## Comenzando 🚀

Con estas instrucciones te epxlicaré como hacer para poder visualizar la página web, tanto de manera local como mediante un host.

Mira **Instalación** para conocer como visualizar la página web de manera local.

Mira **Despliegue**  para conocer como visualizar la página web desde el host.


### Pre-requisitos 📋

_Que cosas necesitas para instalar el software y como instalarlas_

Para poder visualizar nuestra página web tenemos que instalar XAMPP (https://www.apachefriends.org/es/index.html)

También necesitaremos un editor de texto como puede ser:
* **Visual Studio Code** - (https://code.visualstudio.com/)
* **Sublime Text** - (https://www.sublimetext.com/)


### Instalación 🔧
Una vez tengamos instalado XAMPP, debemos ir a la ruta donde tenemos instalado XAMPP y dirigirnos a la carpeta htdocs. En mi caso es: C:\xampp\htdocs

En la carpeta htdocs pegamos todos los archivos descargados de este repositorio.

Dentro del programa de XAMPP, activamos la opción de Apache para poder visualizar la página web y el de MYSQL para detectar la base de datos.

Editamos el archivo config.php rellenando los siguientes datos:

```
<?php 
 define("SERVIDOR","XXXX");
 define("USUARIO","XXXX");
 define("PASSWORD","XXXX");
 define("BD","XXXX");
```

Abrimos nuestor navegador, y en la barra de navegación introducimos lo siguiente: localhost/proyecto_individual
Esto nos llevará a la página web

## Despliegue 📦

Para subir la página web a un host nos registraremos en 000webhost(https://www.000webhost.com/)

En la zona de configuración de la página vamos a la sección de File Manager.

Encontraremos un par de carpetas creadas.

En la carpeta *public_html* añadiremos todos los archivos de la página web (formularios, procesos, css...)

Una vez añadidos todos los archivos, tendremos que añadir la base de datos. Para eso, nos dirigimos a Tools->Database manager.

Creamos la BD y le ponemos el nombre, el usuario y la contraseña deseados.

Después volvemos a la zona de los ficheros y entramos en config.php que está dentro de public_html->services.

Ahí configuramos el archivo según las credenciales que hemos indicado anteriormente

```
<?php 
 define("SERVIDOR","XXXX");
 define("USUARIO","XXXX");
 define("PASSWORD","XXXX");
 define("BD","XXXX");
```

Después ya tendriamos nuestra página web disponible!!

Para acceder a la página principal necesitamos iniciar sesión, por eso aquí abajo te dejo un usuario de prueba: 


**ADMIN**
**Usuario:** admin@gmail.com

**Contraseña:** admin

**CAMARERO**
**Usuario:** gerard.gomez@gmail.com

**Contraseña** gerard.gomez


## Construido con 🛠️

* [PHP] - Lenguaje de programación
* [JS] - Para la validación de formularios
* [HTML & CSS] - Para el diseño y la forma del contenido 
* [MYSQL] - Para la base de datos


## Wiki 📖

Puedes encontrar mucho más de cómo utilizar este proyecto en nuestra [Wiki](https://github.com/LauraFernandez18/PR1/wiki)

## Versionado 📌

Actualmente solo tenemos disponible la primera versión de nuestra página web. (https://github.com/LauraFernandez18/PR1/releases/tag/v1)

## Autores ✒️

* **Laura Fernández** [laurafernandez18](https://github.com/LauraFernandez18)


## Expresiones de Gratitud 🎁

* Agradecimientos a los profesores y compañeros que me han ayudado cuando he tenido algún problema ❤
