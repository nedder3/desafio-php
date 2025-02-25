﻿# desafio-php

 ![Image Alt](https://github.com/nedder3/desafio-php/blob/e5a8b04aeee954cb84dec84b23cb63c780895002/diagrama.jpg)

 Este proyecto provee una gestión básica de Usuarios y Roles, junto con la asignación de roles a usuarios. Se compone de tres entidades principales:

User
Representa a los usuarios de la aplicación. Cada usuario contiene información básica como nombre, email y contraseña.
Role
Define un rol o “perfil” que puede otorgar ciertos privilegios en la aplicación (p. ej., Administrador, Editor, etc.).
role_user (Tabla pivote)
Implementa la relación “muchos a muchos” entre Users y Roles: un usuario puede tener varios roles asignados, y un rol puede ser compartido por muchos usuarios.
La aplicación expone la siguiente lógica de negocio:

CRUD de Usuarios:

Create: Registrar nuevos usuarios (con nombre, correo y contraseña).
Read: Listar y visualizar detalles de cada usuario.
Update: Modificar los datos de un usuario (nombre, correo, contraseña).
Delete: Eliminar usuarios que ya no se requieran en el sistema.
CRUD de Roles:

Create: Definir nuevos roles (Administrador, Editor, etc.).
Read: Listar y revisar cada rol existente en el sistema.
Update: Ajustar el nombre u otros atributos de un rol.
Delete: Remover roles que no se utilicen.
Asignación de Roles a un Usuario (CRUD de la tabla pivote):

Create: Asignar un rol específico a un usuario concreto.
Read: Consultar qué roles tiene un usuario o, inversamente, qué usuarios pertenecen a un rol.
Update (opcional si la pivote almacenara datos extra): Editar campos adicionales en la relación, como fechas u otros metadatos.
Delete: Retirar (desasignar) un rol de un usuario determinado.
A nivel de controladores y vistas:

Se manejan controladores dedicados (UserController, RoleController) para cada entidad principal.
Un controlador de asignaciones (UserRoleController) gestiona la tabla pivote (permite listar, crear y eliminar la relación de roles con usuarios).
Las vistas Blade brindan una interfaz simple donde se pueden ver, crear y modificar cada entidad.
Con esta estructura se cubre la necesidad de:

Gestionar a los usuarios del sistema.
Definir roles según el dominio (por ejemplo, roles de administración o supervisión).
Asignar y desasignar roles a usuarios, para controlar sus permisos o funcionalidades dentro de la aplicación.
Este enfoque hace que sea fácil de escalar:

Si se requieren más atributos en la relación entre usuarios y roles, se pueden añadir columnas a la tabla pivote (role_user) y exponerlas a través del controlador.
Si se necesitan más entidades (por ejemplo, “Permisos”), se puede añadir su respectivo CRUD y vincularlo a Roles o Usuarios según se requiera.
De esta manera, la lógica de negocio se centra en la administración de identidades y los perfiles de acceso, cubriendo la funcionalidad necesaria para la mayoría de aplicaciones que requieran un manejo básico de roles y usuarios.
