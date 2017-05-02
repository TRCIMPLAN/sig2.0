#!/bin/bash

#
# Plataforma de Conocimiento - Destruir
#
# Copyright (C) 2017 Guillermo Valdés Lozano <guivaloz@movimientolibre.com>
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#

# Constantes que definen los tipos de errores
EXITO=0
E_FATAL=99

# Constantes
SITIO_WEB_DIR="$HOME/Documentos/GitHub/TrcIMPLAN/sig2.0"

# Definir directorios
declare -a DIRECTORIOS=(
    "autores"
    "blog"
    "categorias"
    "contacto"
    "sig"
    "sig-mapas-torreon"
    "sig-planes"
    "smi"
    "terminos")

# Destruir
echo "[Destruir] Inicia..."
cd "$SITIO_WEB_DIR"
find . -name .directory -delete
echo "  Eliminando archivos html y xml de la raiz..."
rm -f *.html *.xml
for DIRECTORIO in "${DIRECTORIOS[@]}"
do
    if [ -d "$DIRECTORIO" ]; then
        echo "  Eliminando archivos html en $DIRECTORIO"
        rm -f $DIRECTORIO/*.html
    else
        echo "  ERROR: No existe $DIRECTORIO"
        #~ exit $E_FATAL
    fi
done

# Mostrar mensaje de término
echo "[Destruir] Terminó."
exit $EXITO
