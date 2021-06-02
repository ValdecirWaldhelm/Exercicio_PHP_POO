<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    
    <title>EXEMPLO CLASSES E OBJETO POO PHP</title>
</head>
<body>
<div class="img">
    <img src="../../img/lo_php_poo-remove.png" alt="">
</div>

<pre>
<div class="box">
    
    <?php
    /*
        Deve-se construir uma conta de banco com parametros e metodos; a seguir:
        // ao abrir a conta aberta(true) conta fechada ou não aberta(false) FEITO!!!!!
        // dois tipos de conta $cc(conta corrente) e $cp(conta poupança); FEITO!!!!!
        // ao cliente abrir uma conta corrente ganha R$50,00 e se for poupança R$150,00; FEITO!!!!!
        // para fechar uma conta deve se ter saldo zero, se tiver dinheiro tem que sacar o dinheiro,ou ainda nao pode haver debitos; FEITO!!!!!
        // para fazer um deposito em uma conta ela deve estar aberta, status verdadeiro; FEITO!!!!!
        // para sacar dinheiro deve se estar com a conta aberta e ter saldo para fazer o saque; FEITO!!!!!
        // o saaue nao podera ser maior que o saldo, entao entra em saldo LIS(vandeco); FEITO!!!!!
        // pagar a mensalidade todo mes, vai ser diretamente do saldo, cada vez que o metodo for chamado o cliente de CC vai pagar R$12,00 já o cliente que tem conta poupança vai pagar R$20,00 de mensalidade, FEITO!!!!!
        /* os metodos nos exercicios serão public mais vou fazer de outra forma, 
        deve-se ter os getters e setters em todos os metodos,
        terá um metodo construct sempre que criar uma conta status false e saldo zero; FEITO!!!!!
        */

    class Banco{

       public $numConta;           
       protected $tipo;        
       private $dono;               
       private $saldo;            
       private $status;           

    
            public function __construct($dono, $numConta = 0){

                    $numConta++;
                    $this->status = false;
                    $this->saldo = 0;
                    $this->numConta = $numConta; 
                    $this->dono = $dono;
                   
                    echo "<br>Bem vindo $dono ao <h3>Banco Limpa Bolso</h3><br>Vc e o nosso Cliente agora Parabéns!<br>";
                    echo "Seu saldo é R$$this->saldo<br>";
                    echo "Seu número de cliente do Banco Limpa Bolso é $this->numConta<br>";

                    if($this->status == false){
                        echo "Você não possui uma conta!Faça uma agora!<br>";
                    }
                    
    
                    return $this->numConta;


            }

            public function abrirConta($tipo){

                switch ($tipo) {
                    case "Conta Corrente":
                        $this->saldo += 50;
                        echo "<h3>Conta Corrente </h3>Aberta!<br>Parabéns pela sua nova Conta Corrente!<br>Você recebeu um saldo de ínicio de R$" .number_format($this->saldo, 2, ',', '') ."<br>";
                        $this->tipo = $tipo;
                        break;

                    case "Conta Poupança":
                        $this->saldo += 150;
                        echo "<h3>Conta Poupança</h3>Aberta!<br>Parabéns pela sua nova Conta Poupança!<br>Você recebeu um saldo de ínicio de R$" .number_format($this->saldo, 2, ',', '') ."<br>";
                        $this->tipo = $tipo;
                        break;
                    
                    default:
                    echo "Você não pode sacar!<br>Não possui conta nesse Banco!<br>";
                        $this->status = false;
                        break;
                }
                
                $this->status = true;

            }
            
            public function fecharConta(){
                if($this->saldo == 0){
                    echo "Conta fechada!<br>Sentiremos falta do seu Rico Dinheirinho!<br>";
                }else if($this->saldo > 0){
                    echo "Você não pode fechar sua Conta!Ainda possui saldo!<br>";
                    echo "Seu saldo é R$$this->saldo<br>";
                    echo "Faça o saque para poder encerrar a conta!<br>";
                }else if($this->saldo < 0){
                    echo "Você está com saldo negativo!<br>Não pode fechar sua conta regularize seus débitos!<br>Vamos te arrancar até a Cueca!<br>";
                    
                }
                
            }

            public function pagarDebito($dinheiro){
                
                $this->saldo -= -$dinheiro; // operações numeros negativos

                if($this->saldo == 0){
                   echo "Você pagou sua divida já pode encerrar a conta!<br>";
                }else{ 
                    echo "Você ainda deve $this->saldo<br>";
                    echo "Efetue o pagamento do resto da divida!<br>";
                }
            }
            
            public function depositar($dinheiro){
              if($this->status == true){
                  $this->saldo += $dinheiro;
                  echo "Você depositou R$$dinheiro<br>";
                  echo $this->saldo();
              }else{
                    echo "Você não pode depositar!<br>Não possui conta nesse Banco!<br>";
              }
            }
            
            public function sacar($dinheiro){
                if(($this->status == true) && ($this->saldo > 0)){
                    $this->saldo -= $dinheiro;
                    echo "Você sacou R$$dinheiro<br>";
                    echo $this->saldo();
                
                }else if(($this->status == true) && ($this->saldo <= 0)){
                    $this->saldo += -$dinheiro; 
                    echo "Você sacou do LIS R$".number_format($dinheiro, 2, ',', '') ."<br>";;
                    echo "Saldo LIS devedor, de emprestimo!<br>";
                    echo $this->saldo();
                    
                }else{
                    echo "Você não pode sacar!<br>Não possui conta nesse Banco!<br>";
                }
            }

            public function saldo(){
                if($this->status == true){
                    echo "Seu saldo é R$".number_format($this->saldo, 2, ',', '') ."<br>";;
                }else{
                    echo "Você não possui conta nesse banco!".number_format($this->saldo, 2, ',', '') ."<br>";;
                }
            }
            
            public function pagarMensal(){
                if($this->tipo == 'Conta Corrente'){
                    $this->saldo -= 12;  // testar com numero float
                    echo "Foi debitado anuidade mensal de R$15,00<br>";
                    echo "Seu saldo e de R$$this->saldo<br>";

                }else if($this->tipo == 'Conta Poupança'){
                    $this->saldo -= 20;
                    echo "Foi debitado anuidade mensal de R$20,00<br>";
                    echo "Seu saldo e de R$$this->saldo<br>";
                }else{
                    echo "Não haverá debitos pois você não possui conta!<br>";
                }
            }
    
    }

    $cliente = new Banco('João das Coves');
    $cliente->abrirConta('Conta Poupança');
    $cliente->sacar(150);
    $cliente->sacar(150);

   



    // $cliente2 = new Banco('Vanessa Braga Morgado Waldhelm');





     
    ?>
   

    <br>
    <button class="botao"><a href="index.php">Voltar</a></button>
</div>
 </pre>
</body>
</html>



