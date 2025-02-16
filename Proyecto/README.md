Mejoras Implementadas:

1) Mostrar e implementar en detalles y en modificar la opción de siguiente y anterior

2) Mejorar las operaciones de Nuevo y Modificar para que chequee que los datos son correctos:  correo electrónico (no repetido), IP correcta y  teléfono con formato 999-999-9999.

3) Mostrar una imagen asociada al cliente almacenada previamente en uploads o una imagen por defecto aleatoria generada por https://robohash.org.  sin no existe. En nombre de las fotos tiene el formato 00000XXX.jpg para el cliente con id XXX.

4)Permitir subir o cambiar la foto del cliente en modificar y en nuevo (La imagen no es obligatoria). Hay que controlar que el fichero subido sea una imagen jpg  o png de un tamaño inferior a 500 Kbps.

5) Mostrar en detalles una bandera del país asociado a la IP ( utilizar https://ip-api.com/  y  https://flagpedia.net/ )

7) Generar un PDF con los todos detalles de un cliente ( Incluir un botón que indique imprimir)

10) Utilizar geoip y el api para javascript https://openlayers.org o similar para mostrar la localización geográfica del cliente  en un mapa en función de su IP.
