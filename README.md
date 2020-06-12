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
- Usuarios: Son los clientes de la página web, pueden realizar compras a la página. Poseen un nombre de usuario y una contraseña. La única interacción posible que tienen con la base de datos es descontar la cantidad de elementos que hayan comprado del stock actual, ni siquiera lo hacen directamente. Se tienen ciertos datos de la persona como el nombre, apellido, domicilio, etc, más que nada para hacer el envío de productos y facturación correspondiente.
- Empleados: Pueden modificar el stock de cualquier producto, ya sea por algún inconveniente (robo, falla, contó de manera errónea) o por ventas en el local físico. Cada modificación de stock queda registrado en una entrada en la base de datos, podría agregarse un campo para agregar un comentario que simbolice porqué tuvo que cambiar el stock (repuso stock, vendió en el local, etc).
- Jefe: Puede modificar el stock y agregar o quitar productos de la base de datos.

Tenemos otras tablas que también guardan información en la base de datos:
- Producto: Guarda la información relacionada a un producto como su nombre, descripción, foto, etc.
- Compra: Guarda información respecto a las compras realizadas a través de la página, como quién la hizo, qué producto compró, que cantidad y cuando.
- Cambio de stock: Cambio de stock con respecto a un producto y quién lo realizó.
- Agregado producto: Qué producto fué agregado y por cual jefe (en caso de que hubiera varios).
