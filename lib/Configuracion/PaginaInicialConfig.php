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
        $this->en_raiz                  = true;
        $this->titulo                   = 'SIG 2.0';
    //~ $this->autor                    = '';
        $this->descripcion              = 'Órgano técnico responsable de la planeación del desarrollo del municipio de Torreón cuyas propuestas de política tienen una orientación territorial.';
        $this->claves                   = 'IMPLAN, Torreon, Gomez Palacio, Lerdo, Matamoros, La Laguna';
        $this->directorio               = '.';
        $this->archivo_ruta             = "index.html";
        $this->imagen_previa_ruta       = 'imagenes/imagen-previa.jpg';
        $this->contenido_en_renglon     = FALSE;
        $this->google_site_verification = '';
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
        $this->contenido[] = '    <img class="banner" src="imagenes/banner-implan-2016-11.jpg" alt="TrcIMPLAN Plan Estrategico Torreon 2016-11">';
        $this->contenido[] = $organizacion->html();
        $this->contenido[] = '  </section>';
    } // organizacion

    /**
     * Servicios
     */
    protected function servicios() {
        // SIG
        $sig              = new \PaginaInicial\Destacado();
        $sig->name        = 'Sistema de Información Geográfica';
        $sig->description = 'La representación de datos de diversas fuentes sobre mapas georreferenciados para su fácil análisis constituye una excelente herramienta para todos.';
        $sig->image       = 'servicio-sig';
        $sig->url         = 'sig-mapas-torreon/index.html';
        $sig->botones     = array(
            '<i class="fa fa-server"></i> Planes'               => 'sig-planes/index.html',
            '<i class="fa fa-map-marker"></i> Mapas de Torreón' => 'sig-mapas-torreon/index.html');
        // Acumular sección destacado
        $this->contenido[]  = '  <section id="destacado">';
        $this->contenido[]  = '    <div class="row">';
        $this->contenido[]  = '      <div class="col-sm-12 col-md-12">';
        $this->contenido[]  = $sig->html();
        $this->contenido[]  = '      </div>';
        $this->contenido[]  = '    </div>';
        $this->contenido[]  = '  </section>';
    } // servicios

    /**
     * Últimas publicaciones
     */
    protected function ultimas_publicaciones() {
        // Iniciar concentrador
        $concentrador          = new \Base\VinculosDetallados();
        $concentrador->en_raiz = true;
        // Iniciar recolector
        $recolector = new \Base\Recolector();
        $recolector->agregar_publicaciones_de_imprentas($this->imprentas);
        // Ordenar publicaciones por tiempo, de la más nueva a la más antigua
        $recolector->ordenar_por_tiempo_desc();
        // Bucle por las publicaciones
        foreach ($recolector->obtener_publicaciones(self::ULTIMAS_PUBLICACIONES_LIMITE) as $publicacion) {
            // Iniciar vínculo
            $vinculo          = new \Base\Vinculo();
            $vinculo->en_raiz = true;
            $vinculo->en_otro = false;
            $vinculo->definir_con_publicacion($publicacion);
            // Agregar
            $concentrador->agregar($vinculo);
        }
        // Acumular Últimas Publicaciones y Twitter Timeline
        $this->contenido[]  = '  <section id="ultimas-publicaciones">';
        $this->contenido[]  = '    <div class="row">';
        $this->contenido[]  = '      <div class="col-md-12">';
        $this->contenido[]  = '        <div class="ultimas">';
        $this->contenido[]  = '          <h2>Últimas publicaciones</h2>';
        $this->contenido[]  = $concentrador->html();
        $this->contenido[]  = '          <div class="text-center">';
        $this->contenido[]  = "            <a href=\"blog/index.html\" class=\"btn btn-default\" role=\"button\">Todos los Análisis Publicados</a>";
        $this->contenido[]  = '          </div>';
        $this->contenido[]  = '        </div>';
        $this->contenido[]  = '      </div>';
        $this->contenido[]  = '    </div>';
        $this->contenido[]  = '  </section>';
    } // ultimas_publicaciones

    /**
     * HTML
     *
     * @return string Código HTML
     */
    public function html() {
        // Elaborar secciones
        $this->organizacion();
        $this->servicios();
        $this->ultimas_publicaciones();
        // Entregar resultado del método en el padre
        return parent::html();
    } // html

} // Clase PaginaInicialConfig

?>
