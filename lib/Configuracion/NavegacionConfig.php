<?php
/**
 * TrcIMPLAN Sitio Web - Navegacion Config
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
 * Clase NavegacionConfig
 */
class NavegacionConfig {

    protected $sitio_titulo = 'SIG 2.0';
    protected $logotipo     = 'imagenes/implan-barra-logo-chico-gris.png';
    protected $opciones     = array(
        'Información Geográfica' => array(
            'Información Geográfica > Introducción al SIG' => 'sig/introduccion.html',
            'Información Geográfica > Mapas de Torreón'    => 'sig-mapas-torreon/index.html'),
        'Términos de Uso' => array(
            'Términos de Uso > De la información'          => 'terminos/terminos-informacion.html',
            'Términos de Uso > Del sitio web'              => 'terminos/terminos-sitio.html',
            'Términos de Uso > Aviso de Privacidad'        => 'terminos/privacidad.html'),
        'Contacto'                                         => 'contacto/contacto.html',
        'IMPLAN Torreón'                                   => 'http://www.trcimplan.gob.mx/');
    static public $iconos = array(
        'Información Geográfica'  => 'fa fa-map-marker',
            'Introducción al SIG' => 'fa fa-file-text-o',
            'Mapas de Torreón'    => 'fa fa-map-marker',
        'Términos de Uso'         => 'fa fa-share-alt',
            'De la información'   => 'fa fa-cubes',
            'Del sitio web'       => 'fa fa-globe',
            'Aviso de Privacidad' => 'fa fa-lock',
        'Contacto'                => 'fa fa-phone',
        'IMPLAN Torreón'          => 'fa fa-external-link');
    protected $buscador_html = <<<FINAL
          <form method="get" id="searchbox_015475140351266618625:04hulmghdys" action="http://www.trcimplan.gob.mx/buscador-resultados.html">
            <input type="hidden" value="015475140351266618625:04hulmghdys" name="cx">
            <input type="hidden" value="FORID:11" name="cof">
            <div class="input-group custom-search-form">
              <input type="text" class="form-control" placeholder="Buscar..." value="" name="s" id="s">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
FINAL;
    protected $buscador_js = "";

} // Clase NavegacionConfig

?>
