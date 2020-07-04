<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Proyecto 2

Mi idea es realizar una página web de venta de hardware para computadoras. Entre el hardware podemos encontrar procesadores, placas madre y otras partes además de periféricos como teclados, mouses, auriculares, etc. 

Para esto se utilizará:
- Laravel, un framework de trabajo para desarrollar con PHP
- Bootstrap para CSS
- Javascript
- PostgreSQL para la base de datos
- Heroku para el deploy

Las entidades se pueden observar en el siguiente diagrama:
<p align="center"><img src="https://github.com/Sly-Agustin/proyecto-2-iaw/blob/master/iaw.png?raw=true" width="1000"></p>
NOTA: El diagrama está sujeto a cambios, puede que me haya olvidado de algo o que sea conveniente agregar/quitar cosas a futuro, como por ejemplo el método de pago que aún no terminé de definir. Si el diagrama no se vé está en el branch master como un archivo "iaw.png".

Las personas que interactúan con la aplicación son:
- Usuarios: Son los clientes de la página web, pueden realizar compras a la página. Poseen un nombre de usuario y una contraseña. Entre las interaccioens posibles que tienen con la base de datos se encuentran descontar la cantidad del producto que hayan comprado del stock actual y crear o borrar tarjetas de crédito que son las que utilizan para comprar. Se tienen ciertos datos de la persona como el nombre, apellido, domicilio, etc, más que nada para hacer el envío de productos y facturación correspondiente.
- Empleados: Pueden modificar el stock de cualquier producto, ya sea por algún inconveniente (robo, falla, contó de manera errónea) o por ventas en el local físico. También puede dar de baja/alta un producto para que no aparezca a la venta en la página, como por ejemplo en el caso de quedarse sin stock, producto descontinuado, etc. Cada modificación de stock queda registrado en una entrada en la base de datos en la cuál el empleado debe informar la razón del cambio (como las antes mencionadas).
- Jefe: Puede modificar el stock, agregar o quitar productos de la base de datos, dar de alta o baja los mismos, agregar empleados, darlos de alta/baja para realizar operaciones.

Tenemos otras tablas que también guardan información en la base de datos:
- Producto: Guarda la información relacionada a un producto como su nombre, descripción, foto, etc. Las fotos son guardadas en una columna LongText en base64 dentro de la base de datos. Los productos NUNCA se borran de la base de datos, solo se les puede sacar de la venta, esto se hace porque las compras tienen como clave foránea a las claves primarias de estos productos además de que se puede seguir accediendo a la información de la misma sin opción de compra. 
- Compra: Guarda información respecto a las compras realizadas a través de la página, como quién la hizo, qué producto compró, que cantidad y cuando.
- Cambio de stock: Cambio de stock con respecto a un producto, quién lo realizó (usuario, empleado, jefe) y con que motivo (compra, stock, etc). Si bien tiene 3 campos id nullable correspondientes a los usuarios, empleados o jefe solo uno de ellos se llenará y registrará la razón del cambio.

## Sobre los seeders de los productos
Son seeders creados a manos porque me pareció que quedaba fea la página con datos del estilo procesador thermaltake A4 marca sentey que vale 1000 pesos y redirige a una página de corsair, asique todos los productos fueron escritos a mano.


## Jefes y empleados
Los empleados y jefes deben pueden loguearse desde una URL específica, en el caso de los empleados es dominio/empleados/login (o sin login y será redirigido) y los jefes dominio/admin/login (idem empleado login).
Todos los tipos de usuario pueden recuperar su contraseña en caso de olvidarla, solo es necesario hacer click en "¿Olvido su contraseña?" en la pantalla de login que le corresponda, escribir su mail y si el mail existe en la base de datos recibirá un link para reiniciar la contraseña.
CUENTA JEFE =
- mail: jefecito@jefe.com
- contraseña: jefe
NOTA: no hay manera de crear otro jefe que no sea con seeders o directamente de la base de datos, asi que no se puede probar el reiniciar contraseña, personalmente lo probé con mailtrap cambiando las variables de configuración y capturé todo en mi cuenta de mailtrap demostrando que andaba bien. Sin embargo si querés probarlo con la tuya avisame y te agrego a la bd.

CUENTA EMPLEADO =
- mail: johnc@gmail.com
- contraseña: empleado

Para las cuentas usuario podés crearte una (no es necesaria la verificación) y hay usuarios por defecto creadas manuales y con factory (y faker, hice ambas para probar). Si no querés crear una cuenta una por defecto es usuario1@gmail.com y contraseña: contrasenia


## Agregar producto
Solo los jefes pueden agregar productos, las condiciones de los campos se encuentran en la pestaña para agregar.

## Modificar producto
Puede ser realizada tanto por jefes o empleados. Consiste en la modificación de las propiedades de los productos como el stock, quitar o volver a poner un producto a la venta.
En el caso de cambiar el stock es necesario agregar la nueva cantidad total disponible, el controlador se encargará de hacer los cálculos y ver si se agregó o decrementó el stock. Quizás hubiera sido más intuitivo aceptar valores relativos al stock y no un stock absoluto, es decir aceptar +1/-1 y calcular en nuevo stock en base a eso pero llegó la entrega y nunca se me había ocurrido. Además es necesario especificar la razón del cambio de stock.
Para quitar un producto de la venta es necesario seleccionarlo y pulsar el botón quitar.
Para agregar un producto a la venta es necesario seleccionarlo y pulsar el botón Agregar de nuevo.

## Agregar empleados
Solo los jefes pueden agregar empleados. Las condiciones de los campos son las siguientes:
- Nombre de usuario: Único, necesario.
- Password: Necesaria, puede ser de cualquier longitud o combinación.
- Email: Único, necesario y debe ser una dirección de mail válida.
- Nombre: Necesario, puede ser cualquier combinación de caracteres.
- Apellido: Necesario, puede ser cualquier combinación de caracteres.
Una vez completado el empleado ya podrá loguearse desde el login de empleados.

## Dar de alta/baja empleados
Nos permite dar de alta/baja los empleados para que ya no puedan ingresar al sistema ni realizar modificaciones. No son borrados de la base de datos ya que su ID se utiliza como clave foránea en los cambios de stock, habría que analizar si es necesario o directamente sacarla como clave foránea y ponerla como atributo nullable. Otra cosa a destacar es que esta idea se me ocurrió a último momento y no llegué a implementarla del todo asique lo único que hace es setear al empleado como inactivo pero aún así puede loguearse y realizar cambios (sí, la feature más útil del mundo cuando renuncia alguien).

## Como probar la API con postman
La API es extremadamente básica, podemos hacer lo siguiente:
- Obtener los datos de un producto
- Obtener los datos de todos los productos
- Agregar un producto

Las primeras dos son de acceso público, me pareció adecuado que cualquiera pudiera consultar esto. La última necesita permisos de jefe para realizarse, para esto ponemos el api-token y su valor como parámetro de Query en la parte de autorización, esto ya se encuentra agregado en el JSON que se encuentra en el home del repositorio. Para probar la API usar el json.

## Link al video de youtube
https://www.youtube.com/watch?v=ax_fJFxC0bw