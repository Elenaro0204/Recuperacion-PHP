<?php
class NumeroRomano
{
    private $romano;
    private $valores = [
        'M' => 1000,
        'D' => 500,
        'C' => 100,
        'L' => 50,
        'X' => 10,
        'V' => 5,
        'I' => 1
    ];

    public function __construct($cadena)
    {
        $this->romano = strtoupper(trim($cadena));
    }

    public function convertirADecimal()
    {
        $suma = 0;

        for ($i = 0; $i < strlen($this->romano); $i++) {
            $letra = $this->romano[$i];

            if (!isset($this->valores[$letra])) {
                return "❌ Error: carácter inválido '$letra'. Solo se permiten M, D, C, L, X, V, I.";
            }

            $suma += $this->valores[$letra];
        }

        return "✅ Valor decimal: $suma";
    }
}
