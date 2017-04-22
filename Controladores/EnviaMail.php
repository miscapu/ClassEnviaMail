<?php
/**
 * Author: MiSCapu
 * Class EnviaMail
 *
*/
    /**
    * @namespace MiSCapu: Creo un namespace para evitar posibles conflictos de nombres de métodos, variables o constantes;
    * que podrían ocurrir en el script.
    */
    namespace MiSCapu;

/***
 * @class EnviaMail: Class que permite el envío de un Mail
*/
class EnviaMail
{
    /**
     * @var string $remitente: contiene los datos del remitente del mail.
     * @var string $destino: contiene los datos del destino del mail.
     * @var string $asunto: contiene los datos del asunto del mail.
     * @var string $cuerpo: contiene los datos del cuerpo del mail.
    */
    private $remitente;
    private $destinos;
    private $asuntos;
    private $cuerpos;
    /**
     * @method __construct: es apropiado aquí este método mágico que nos brinda PHP ya que realizaremos un inicio
     * del objeto $emailer instanciando a la class EnviaMail y necesitamos preparar este objeto para que sea enviado
     * con sus (campos remitente, destino, asunto y cuerpo que estan alojados en las variables private antes informadas)
     * @param string $elRemitente: este parámetro incluye los datos del remitente (quien envia el mail)
    */
    function __construct($elRemitente)
    {
        /**
         * Accedemos a la variable private $remitente con la pseudovariable '$this' que está disponible para cuando un
         * método o una variable va a ser invocada.
        */
        $this->remitente = $elRemitente;
        /**
         * Accedemos a la variable private $destino con la pseudovariable '$this' e igualamos esta será array
        */
        $this->destinos = array();
    }

    public function agregaDestino($elDestino)
    {
        /**
         * @function array_push: Esta función Adiciona al array el valor de las variables que se puedan pasar; esta
         * adición del contenido de las variables estará al final del array (ejemplo:
         * $nombres = 1-miguel, 2-juan
         * array_push($nombres, "Carlos") ===> el resultado en pantalla será:
         * 1-miguel
         * 2-juan
         * 3-Carlos
         */
        array_push($this->destinos, $elDestino);
    }/** @noinspection PhpInconsistentReturnPointsInspection */

    /**
     * @return mixed
     *
     * @method setAsunto: setando al atributo Asunto que es private y lo setamos; lo cual hace que este atributo sea
     * solo accesado travez de un método de la class EnviaMail que en este caso sería setAsunto. Osea este método lo que
     * hace es poner a disposición al atributo asunto que tenga el mail
     *
     * @param string $elAsunto: es el parámetro que contiene el asunto de nuestro e-mail
     *
     * @var string $asuntos: atributo private declarado al principio del código al que e accesa en esta función
     */
    public function setAsunto($elAsunto){
        $this->asuntos = $elAsunto;
    }

    /**
     * @method setCuerpo: setando el atributo cuerpos a travéz del método setCuerpo.
     * @param string $elCuerpo: que almacena los valores que pueda tener la variable private $cuerpos.
     */
    public function setCuerpo($elCuerpo){
        $this->cuerpos = $elCuerpo;
    }
    /**
     * @method enviaMail: método que accesa mediante la pseudovariable $this al atributo private destino, luego
     * mediante el constructor foreach (solo actua con arrays y objetos) recorremos el array dado por $this->destinos
     * y en cada iteración le asigna un valor al parámetro $eldestino luego mediante:
     * @var string $resultado: inicia el envio de un email para el e-mail que cumpla con los datos ingresados.
     * Luego muestra un mensaje que dice que el mensaje se ha enviado de manera satisfactoria para $elDestino
    */
    public function enviaMail(){
        foreach ($this->destinos as $elDestino){
            $result = mail($elDestino, $this->asuntos, $this->cuerpos, "From: {$this->remitente}\r\n");
            if ($result) echo "Su e-mail se ha conseguido enviar satisfactoriamente para {$elDestino}<br />";
        }
    }
}