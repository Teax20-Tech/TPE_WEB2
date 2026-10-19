# TPE WEB 2 - Cine

Trabajo Práctico Especial de Web 2 - 2026  
Sede Lobería

## Integrantes

- Thiago Leonel Martinez - teaxmartinez2025@gmail.com
- Evelyn Rojas Alem - Evelynalemr@gmail.com

## Descripción

El proyecto consiste en un sitio web dinámico desarrollado en PHP utilizando Server Side Rendering (SSR), arquitectura MVC y conexión a una base de datos MySQL mediante PDO.

La temática elegida es un cine.

El sistema permite gestionar clientes y las entradas adquiridas por cada uno de ellos.

La relación principal del modelo es:

**CLIENTE 1:N ENTRADA**

- Un cliente puede tener cero o muchas entradas.
- Una entrada pertenece a un único cliente.

## Modelo de datos

### CLIENTE

- `id_cliente` - Clave primaria
- `socio` - Indica si el cliente es socio
- `nombre`
- `fecha_nacimiento`

### ENTRADA

- `id_entrada` - Clave primaria
- `valor_final`
- `tipo_entrada`
- `descuento_aplicado`
- `CLIENTE_id_cliente` - Clave foránea hacia CLIENTE

### USUARIO

Tabla utilizada para la autenticación del administrador.

- `id_usuario` - Clave primaria
- `usuario`
- `password`

La contraseña se almacena mediante hash y se verifica utilizando `password_verify()`.

## Funcionalidades públicas

Sin iniciar sesión se puede:

- Listar todas las entradas.
- Ver el detalle de una entrada.
- Visualizar el cliente relacionado con cada entrada.
- Listar los clientes.
- Ver las entradas correspondientes a un cliente determinado.

## Funcionalidades de administración

Luego de iniciar sesión como administrador se puede realizar el ABM/CRUD de entradas y clientes.

### Entradas

- Agregar una entrada.
- Editar una entrada.
- Eliminar una entrada.
- Seleccionar el cliente relacionado mediante un `<select>`.

### Clientes

- Agregar un cliente.
- Editar un cliente.
- Eliminar un cliente.

Si un cliente posee entradas asociadas, no puede ser eliminado debido a la restricción de integridad referencial de la base de datos. El sistema informa esta situación al usuario.

## Autenticación y autorización

Las operaciones administrativas están protegidas mediante sesión.

Las rutas de alta, modificación y eliminación verifican que exista un usuario autenticado antes de permitir el acceso.

### Credenciales de administrador

**Usuario:** `webadmin`  
**Contraseña:** `admin`

## Arquitectura

El proyecto utiliza el patrón MVC:

- **Model:** acceso y modificación de los datos mediante PDO.
- **View:** comunicación entre los controladores y los templates.
- **Controller:** procesa las acciones del usuario y coordina Models y Views.
- **Templates:** archivos `.phtml` encargados de generar el HTML.

También se utilizan templates comunes:

- `header.phtml`
- `footer.phtml`

Esto permite reutilizar la estructura HTML y evitar código duplicado.

## Ruteo

El proyecto utiliza URLs semánticas mediante `.htaccess` y `route.php`.

Algunos ejemplos:

```text
/TPE_WEB2/entradas
/TPE_WEB2/entrada/1
/TPE_WEB2/clientes
/TPE_WEB2/clientes/1/entradas
/TPE_WEB2/login
```

## Base de datos y autodeploy

La configuración de conexión se encuentra en:

```text
config.php
```

El script de creación e inicialización se encuentra en:

```text
db/db_cine.sql
```

El proyecto implementa autodeploy de la base de datos.

Al ejecutarse, el modelo comprueba si existe la base:

```text
tp_especialweb
```

Si no existe, la crea automáticamente y ejecuta `db/db_cine.sql`, generando las tablas y los datos iniciales necesarios.

## Instalación y ejecución

### 1. Clonar el repositorio

```bash
git clone https://github.com/Teax20-Tech/TPE_WEB2.git
```

El proyecto debe quedar accesible desde el servidor web como:

```text
TPE_WEB2
```

### 2. Iniciar Apache y MySQL

Es necesario tener un servidor con:

- Apache
- MySQL/MariaDB
- PHP
- PDO para MySQL

El proyecto fue desarrollado utilizando XAMPP.

### 3. Configurar la conexión

Verificar los datos de conexión en:

```text
config.php
```

La configuración utilizada durante el desarrollo es:

```text
Host: localhost
Usuario: root
Contraseña: vacía
Base de datos: tp_especialweb
```

### 4. Abrir el proyecto

Ingresar desde el navegador a:

```text
http://localhost/TPE_WEB2/
```

Si la base de datos todavía no existe, se crea automáticamente mediante el mecanismo de autodeploy.

## Estructura principal

```text
TPE_WEB2/
│
├── app/
│   ├── controller/
│   ├── helper/
│   ├── model/
│   └── view/
│
├── db/
│   └── db_cine.sql
│
├── parte 1/
│   ├── DER.jpeg
│   └── tp_especialweb.sql
│
├── templates/
│
├── .htaccess
├── config.php
├── route.php
└── README.md
```

## Parte 1

Los archivos correspondientes a la primera entrega se conservan dentro de:

```text
parte 1/
```

Allí se encuentran el DER original y el script SQL correspondiente a esa entrega.
