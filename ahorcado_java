import java.util.Scanner;
/*
 * REALIZA UNA IMPLEMENTACIÓN SENCILLA DEL JUEGO DEL AHORCADO 
 * Se trata de adivinar una pelicula 
 * El programa solicitará a usuario una frase, por ejemplo de una película,
 *  se mostrará esta cadena con guiones y espacios. 
 *  A continuación el usuario introducirá letras y el programa indicará si 
 *  forma parte de la cadena a adivinar o no. 
 *  Por cada fallo el programa mostrará el mensaje AHORCADO con una letra más. 
 *  El primer fallo mostrará A, el segundo AH y así sucesivamente si tiene 8 fallos 
 *  el juego termina indicado que el usuario a perdido.
 *   Si adivina todas las letras el juego termina indicando que el usuario a ganado.


Ejemplo de ejecución:

Introduce una película: Star Wars

Película a Adivinar:---- ----> ERROR:

Introduce una letra:a

Película a Adivinar:--a- -a--> ERROR:

Introduce una letra:e

Película a Adivinar:--a- -a--> ERROR:A

Introduce una letra:i

Película a Adivinar:--a- -a--> ERROR:AH

Introduce una letra:b

Película a Adivinar:--a-- -a--> ERROR:AHO

Introduce una letra:s

Película a Adivinar:S-a- -a-s> ERROR:AHO

Introduce una letra:t

Película a Adivinar:Sta- -a-s> ERROR:AHO

Introduce una letra:j

Película a Adivinar:S-a- -a-s> ERROR:AHOR

Introduce una letra:r

Película a Adivinar:S-ar -ars> ERROR:AHOR

Introduce una letra:t

Película a Adivinar:Star -ars> ERROR:AHOR

Introduce una letra:w

Película a Adivinar:Star wars> ERROR:AHOR

¡¡ ENHORABUENA HAS ACERTADO !!


 */

public class JuegoAhorcado {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub

		String mensaje = "AHORCADO";
		String pelicula;           // Pelicula a adivinar
		String peliculaAdivinada;  // Pelicula con guiones
		StringBuilder listaletras = new StringBuilder(); // Letras instroducidas 
		Scanner sc = new Scanner (System.in);
		
		int maxfallos = mensaje.length(); // 8 fallos máximo
		int contadorfallos = 0;
		boolean acierto = false;
		
		System.out.print(" Introduce el título de la película:");
		pelicula = sc.nextLine();
		
		peliculaAdivinada = verCadenaSecreta( pelicula,listaletras.toString());
		System.out.println(" Película a Adivinar :"+ peliculaAdivinada + " ERROR:");
		
		while (  contadorfallos  < maxfallos && !acierto){
			System.out.print(" Introduce una letra ");
			// Compruebo si esta la letra
			char letra = sc.next().charAt(0);
			
			// Si no esta la letra en la pelicula
			if ( pelicula.indexOf(letra) == -1){
				contadorfallos++;
				
			}
			// Añado la letra, da igual si esta o no
			listaletras.append(letra);
			
			// Si son iguales las cadenas he acertado
			peliculaAdivinada = verCadenaSecreta( pelicula,listaletras.toString());
			if ( peliculaAdivinada.equals(pelicula)){
				acierto = true;
			}
			System.out.print(" Película a Adivinar :"+ peliculaAdivinada + " ERROR:");
			// Muestro el mensaje de error
			for (int i = 0; i < contadorfallos; i++){
				System.out.print(mensaje.charAt(i));
			}
			System.out.println();
		}
		
		if ( acierto ){
			System.out.println("¡¡ ENHORABUENA HAS ACERTADO !!");
		}
		else {
			System.out.println(" Otra vez será");
		}
		 
	}

	// Método auxiliar que muestra la cadena con guiones en la posiciones que no
	// son espacios o estan en lista de letras
	static public String verCadenaSecreta ( String cadena,  String listaletras ){
		 StringBuilder cadenaresu = new StringBuilder();
		 
		 for (int i=0; i< cadena.length(); i++){
			 char letra = cadena.charAt(i);
			 // da igual mayusculas o minusculas
			 if ( ( letra == ' ') ||  listaletras.indexOf(Character.toUpperCase(letra)) != -1
					 || listaletras.indexOf(Character.toLowerCase(letra)) != -1 ){
				 cadenaresu.append(letra);
			 }
			 else {
				 cadenaresu.append('-');
			 }
		 }
		 return cadenaresu.toString();
		 
	 }
}
