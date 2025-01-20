# Prueba de desarrollo para desarrollador de PHP, HTML y XML en OMNI.PRO

## Introducción
Con esta prueba queremos evaluar tus habilidades en las siguientes áreas:
* Análisis y entendimiento del problema.
* Uso óptimo de las buenas prácticas y estandares de programación de Adobe Commerce
* Uso óptimo de PHP
* Uso óptimo de MySQL
* Uso medio de HTML
* Uso medio de Git
* Uso medio de XML
  
Durante esta prueba, sigue tu propio proceso de desarrollo. Buscamos un equilibrio entre calidad y cantidad. Si no puedes terminar la prueba en su totalidad dentro del tiempo dado, aún deberíamos ser capaces de apreciar tu trabajo y habilidades. Piensa en esta aplicación como un proyecto que será mantenido y posiblemente extendido en el futuro por otros desarrolladores.

Usar la versión de 2.4.5 ó 2.4.6 de Magento

## Descripción:
* Como cliente de Omnipro con una tienda en línea basada en Magento 2.4.6, poseo un catálogo compuesto por __500 categorías__ y un total de __8,000,000 de productos__ distribuidos entre ellas. Solicito la implementación de una funcionalidad en el backend que permita al equipo de Marketing, sin conocimientos técnicos, reordenar los productos dentro de una o varias categorías de forma rápida. Esta funcionalidad debe permitir la ordenación tanto ascendente como descendente de dichos productos.

* El objetivo es que el personal de marketing pueda organizar el posicionamiento de los productos dentro de las categorías. Por ejemplo, quiero que el producto "camisa con el código ABC" aparezca en la primera página de la categoría "hombres" y al final de la categoría "mujeres". __Es importante notar que el mismo producto puede estar en múltiples categorías o en una sola, dependiendo de las necesidades del catálogo.__
  
* La primera campaña del cliente será realizar una actualización de 500.000 productos.
* Actualmente, el equipo de marketing debe ingresar a cada categoría y mover cada producto a la posición deseada manualmente, lo cual es una tarea laboriosa durante cada campaña.


![example](https://imgur.com/UrC8wwy.png)


## Caracteristicas:
* Se debe crear un módulo llamado QuickProductPositioning dentro del Vendor Omnipro

## Funcionalidad:

*	Permitir la reordenación de forma rápida de productos en una o varias categorías.
*	Ofrecer opciones para ordenar los productos de manera ascendente o descendente.
*	Implementar una solución fácil y accesible para usuarios sin conocimientos técnicos.

## Historial de Git: 


*	Se espera un historial de Git conciso y bien documentado.
*	Al finalizar el desarrollo, crea una __Solicitud de Fusión (Pull Request)__ para notificar al equipo técnico que la prueba está lista para ser evaluada.
* Solo se debe versionar el directorio que contiene el módulo, no toda la aplicación de Magento.

## Instalación:

* La extensión debe ser auto-instalable mediante el comando magento setup:upgrade.

## Documentación:

* Proporciona una explicación clara de tu solución, incluyendo las decisiones de diseño y cualquier consideración técnica relevante.
* Incluye instrucciones de instalación y uso de la funcionalidad.

## Consideraciones de Rendimiento:

* Dado el gran número de productos (8 millones), asegúrate de optimizar el rendimiento de las operaciones de reordenación rapida.
* Incluir las recomendación para un uso optimo de la solución. 



* __Tipo de prueba:__ Creación de un modulo de backend
* __Tiempo estimado:__ 8h
* __Tiempo máximo para entrega:__ 2 Dias

__¡Buena suerte!__
