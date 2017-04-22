<?php
/**
 * Author: MiSCapu
 * Date: 21/04/2017
 * Time: 23:31
 */
/**
 * Accedemos al archivo EnviaMail que contiene la classe del mismo nombre.
*/
require 'Controladores/EnviaMail.php';
/**
 * Utilizo el namespace MiSCapu y la class EnviaMail
*/
use MiSCapu\EnviaMail as EnviaMail;
/**
 * Creamos el objeto $emailer que instancia a la class EnviaMail para realizar el proceso de envío de un e-mail
*/
$emailer = new EnviaMail('miguelonsinho5@gmail.com');  //construcción
$emailer->agregaDestino('mignan2010@hotmail.com');     //accesando métodos
//pasamos algunos datos
$emailer->setAsunto('Sólo un Teste');
$emailer->setCuerpo('Hola MiSCapu, como esta todo ahí?');
$emailer->enviaMail();