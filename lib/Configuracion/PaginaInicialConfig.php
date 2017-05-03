<?php
/**
 * TrcIMPLAN Sitio Web - Pagina Inicial Config
 *
 * Copyright (C) 2017 Guillermo Valdés Lozano <guivaloz@movimientolibre.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package TrcIMPLANSitioWeb
 */

namespace Configuracion;

/**
 * Clase PaginaInicialConfig
 */
class PaginaInicialConfig extends \Base\Plantilla {

    public $imprentas;                        // Arreglo con rutas a las clases de ImprentaPublicaciones, es usado en ultimas_publicaciones
    const   ULTIMAS_PUBLICACIONES_LIMITE = 4; // Cantidad límite de últimas publicaciones

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        // Propiedades para la página inicial
        $this->en_raiz              = true;
        $this->titulo               = 'SIG 2.0';
    //~ $this->autor                = '';
        $this->descripcion          = 'Órgano técnico responsable de la planeación del desarrollo del municipio de Torreón cuyas propuestas de política tienen una orientación territorial.';
        $this->claves               = 'IMPLAN, Torreon, Gomez Palacio, Lerdo, Matamoros, La Laguna';
        $this->directorio           = '.';
        $this->archivo_ruta         = "index.html";
        $this->imagen_previa_ruta   = 'imagenes/imagen-previa.jpg';
        $this->contenido_en_renglon = FALSE;
    } // constructor

    /**
     * Organizacion
     */
    protected function organizacion() {
        // Encabezado
        $organizacion                 = new \PaginaInicial\Organizacion();
        $organizacion->name           = 'Instituto Municipal de Planeación y Competitividad de Torreón';
        $organizacion->description    = 'Órgano técnico responsable de la planeación del desarrollo del municipio de Torreón, Coahuila, México.';
        $organizacion->image          = 'imagenes/implan-logo.png';
        $organizacion->is_article     = FALSE;
        $organizacion->big_heading    = TRUE;
        $organizacion->headline_style = 'organizacion';
        // Acumular
        $this->contenido[] = '  <section id="organizacion">';
        $this->contenido[] = '    <img class="banner" src="imagenes/encabezado.jpg" alt="TrcIMPLAN Plan Estrategico Torreon 2016-11">';
        $this->contenido[] = $organizacion->html();
        $this->contenido[] = '  </section>';
    } // organizacion

    /**
     * Servicios
     */
    protected function servicios() {
        // SIG
        $sig              = new \PaginaInicial\Destacado();
        $sig->name        = 'Sistema de Información Geográfica 2.0';
        $sig->description = 'La representación de datos de diversas fuentes sobre mapas georreferenciados para su fácil análisis constituye una excelente herramienta para todos.';
        $sig->image       = 'servicio-sig';
        $sig->url         = 'sig-mapas-torreon/index.html';
        // Acumular sección destacado
        $this->contenido[]  = '  <section id="destacado">';
        $this->contenido[]  = $sig->html();
        $this->contenido[]  = '  </section>';
    } // servicios

    /**
     * Redes
     */
    protected function redes() {
        $this->contenido[] = '  <section id="redes">';
        $this->contenido[] = '    <div class="pull-right redes-sociales">';
        $this->contenido[] = '      <a class="fa fa-twitter-square" href="http://www.twitter.com/trcimplan" target="_blank"></a>';
        $this->contenido[] = '      <a class="fa fa-facebook-square" href="https://facebook.com/trcimplan" target="_blank"></a>';
        $this->contenido[] = '      <a class="fa fa-google-plus-square" href="https://plus.google.com/106220426241750550649" target="_blank"></a>';
        $this->contenido[] = '      <a class="fa fa-github-square" href="https://github.com/TRCIMPLAN" target="_blank"></a>';
        $this->contenido[] = '      <a class="fa fa-rss-square" href="rss.xml"></a>';
        $this->contenido[] = '    </div>';
        $this->contenido[] = '  </section>';
    } // redes

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Elaborar secciones
        $this->organizacion();
        $this->servicios();
        $this->redes();
        // Entregar resultado del método en el padre
        return parent::html();
    } // html

} // Clase PaginaInicialConfig

?>
