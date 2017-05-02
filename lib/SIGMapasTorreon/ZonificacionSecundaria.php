<?php
/**
 * TrcIMPLAN Sitio Web - SIGMapasTorreon ZonificacionSecundaria
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

namespace SIGMapasTorreon;

/**
 * Clase ZonificacionSecundaria
 */
class ZonificacionSecundaria extends \Base\Publicacion {

    /**
     * Constructor
     */
    public function __construct() {
        // Título, autor y fecha
        $this->nombre             = 'Zonificación Secundaria';
        $this->autor              = 'Arq. Jair Miramontes Chávez';
        $this->fecha              = '2014-11-18T11:00';
        // El nombre del archivo a crear y rutas relativas a las imágenes
        $this->archivo            = 'zonificacion-secundaria';
        $this->imagen             = 'zonificacion-secundaria/imagen.jpg';
        $this->imagen_previa      = 'zonificacion-secundaria/imagen-previa.jpg';
        // La descripción y claves dan información a los buscadores y redes sociales
        $this->descripcion        = 'Mapa referente para consultar los usos de suelo del área urbana de Torreón. De clic en un área para mostrar detalles y el enlace al reglamento.';
        $this->claves             = 'IMPLAN, Torreón, Zonificación, Usos de Suelo';
        // El directorio en la raíz donde se guardará el archivo HTML
        $this->directorio         = 'sig-mapas-torreon';
        // Opción del menú Navegación a poner como activa cuando vea esta publicación
        $this->nombre_menu        = 'Información Geográfica';
        // El estado puede ser publicar, revisar o ignorar
        $this->estado             = 'Publicar';
        // Si para compartir es verdadero, aparecerán al final los botones de compartir en Twitter y Facebook
        $this->para_compartir     = TRUE;
        // Para el Organizador
        $this->categorias         = array('Gobierno');
        // Para el botón de ver a pantalla completa
        $this->url                = 'https://implantorreon.cartodb.com/u/sigimplan/viz/7c091e9c-7041-11e4-b580-0e4fddd5de28/embed_map';
        $this->url_etiqueta       = 'Ver a pantalla completa';
        // Instancia de SchemaPostalAddress que tiene la localidad, municipio y país
        $region                   = new \Base\SchemaPostalAddress();
        $region->addressCountry   = 'MX';
        $region->addressRegion    = 'Coahuila de Zaragoza';
        $region->addressLocality  = 'Torreón';
        // Instancia de SchemaMapa con el mapa en CartoDB
        $mapa                     = new \Base\SchemaMap();
        $mapa->mapType            = 'VenueMap';
        $mapa->url                = $this->url;
        $mapa->url_label          = $this->url_etiqueta;
        $mapa->theMap             = <<<FINAL
<iframe width='100%' height='520' frameborder='0' src='https://implantorreon.cartodb.com/u/sigimplan/viz/7c091e9c-7041-11e4-b580-0e4fddd5de28/embed_map' allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
<p><b>VERSIÓN DE DIVULGACIÓN E INFORMACIÓN, NO PRODUCE EFECTOS JURÍDICOS.</b></p>
FINAL;
        // Instancia de SchemaPlace agrupa la región y el mapa
        $lugar                    = new \Base\SchemaPlace();
        $lugar->address           = $region;
        $lugar->hasMap            = $mapa;
        // Instancia de SchemaCreativeWork lo empaca con más datos
        $paquete                  = new \Base\SchemaCreativeWork();
        $paquete->big_heading     = true;
        $paquete->name            = $this->nombre;
        $paquete->description     = $this->descripcion;
        $paquete->author          = $this->autor;
        $paquete->datePublished   = $this->fecha;
        $paquete->headline_style  = $this->encabezado_color;
        $paquete->image           = $this->imagen;
        $paquete->contentLocation = $lugar;
        // El contenido es una instancia de SchemaCreativeWork
        $this->contenido          = $paquete;
    } // constructor

    /**
     * Javascript
     *
     * @return string No hay código Javascript, entrega un texto vacío
     */
    public function javascript() {
        // JavaScript
        // Sin caja JS
        // Ejecutar este método en el padre
        return parent::javascript();
    } // javascript

    /**
     * Redifusion HTML
     *
     * @return string Código HTML
     */
    public function redifusion_html() {
        // Para redifusión, si tiene una imagen, se pone la imagen y después el contenido
        if ($this->imagen != '') {
            $this->redifusion = sprintf("<a href=\"%s\"><img src=\"%s\"><br>\n\n%s</a>", "{$this->archivo}.html", $this->imagen, $this->descripcion);
        } else {
            $this->redifusion = sprintf('<a href="%s">%s</a>', "{$this->archivo}.html", $this->descripcion);
        }
        // Ejecutar este método en el padre
        return parent::redifusion_html();
    } // redifusion_html

} // Clase ZonificacionSecundaria

?>
