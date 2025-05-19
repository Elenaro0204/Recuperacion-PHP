<?php

class Menu
{
    private $titulos = [];
    private $enlaces = [];

    // Añade un nuevo elemento al menú
    public function agregarElemento($titulo, $enlace)
    {
        $this->titulos[] = $titulo;
        $this->enlaces[] = $enlace;
    }

    // Muestra el menú en forma vertical (una opción por línea)
    public function mostrarVertical()
    {
        $menuVertical = "<ul>";
        // for ($i = 0; $i < count($this->titulos); $i++) {
        //     $menuVertical .= "<li><a href='" . $this->enlaces[$i] . "'>" . $this->titulos[$i] . "</a></li>";
        // }

        // Otra forma
        foreach ($this->titulos as $i => $texto) {
            $menuVertical .= "<li><a href='" . $this->enlaces[$i] . "'>" . $texto . "</a></li>";
        }
        $menuVertical .= "</ul>";

        return $menuVertical;
    }

    // Muestra el menú en forma horizontal (en una sola línea)
    public function mostrarHorizontal()
    {
        $menuHorizontal = "<div style='display: flex; gap: 10px;'>";
        for ($i = 0; $i < count($this->titulos); $i++) {
            $menuHorizontal .= "<a href='" . $this->enlaces[$i] . "'>" . $this->titulos[$i] . "</a>";
        }
        $menuHorizontal .= "</div>";

        return $menuHorizontal;
    }
}
