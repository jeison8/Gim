<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arduino{

	/**
	 * Puerto con el que nos comunicamos.
	 * @var string
	 */
	private $puerto;
	
	/**
	 * Manejador del puerto.
	 * @var file
	 */
	private $manejador;

	/******************************** CONSTRUCTORES ********************************/

	/**
	 * Constructor que abre un puerto.
	 * @param string $puerto: nombre del puerto a abrir.
	 */
	public function __construct($puerto) {
		$this->puerto = $puerto;	
	}
		
	/****************************** FUNCIONES PÚBLICAS *****************************/
	
	/**
	 * Abre el puerto.
	 */
	public function conectar(){		
		//mode: BAUD=9600 PARITY=N data=8 stop=1 xon=off`;
		
		//Abrimos el puerto (para mayores de 9: "\\\\.\\COM10");
		$this->manejador = fopen ($this->puerto, "w+");
		
		if (!$this->manejador) {
			throw new \Exception("No se ha encontrado ninguna placa conectada al puerto ".$this->puerto);
		}
	}
	
	/**
	 * Escribe una orden en un puerto.
	 * @param string $orden: orden a escribir.
	 */
	public function escribir($orden){
		fputs ($this->manejador, $orden);
	}
	
	/**
	 * Cierra el puerto.
	 */
	public function desconectar(){
		fclose ($this->manejador);
	}
	
}