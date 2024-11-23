<?php
/**
 * adespc-tdms-merignac
 *
 * @package           adespc-tdms-merignac
 * @author            Aubin MAHÉ
 * @copyright         2024 Aubin MAHÉ
 * @license           LGPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:       adespc-tdms-merignac
 * Plugin URI:        https://github.com/AubinMahe/adespc-tdms-merignac
 * Description:       Ce plugin affiche les catégories de la nouvelle CCNM en abscisse et les salaires bruts mensuels en ordonné, sollicite l'utilisateur pour qu'il communique son salaire et sa classification puis le localise graphiquement.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Aubin MAHÉ
 * Author URI:        https://github.com/AubinMahe/adespc-tdms-merignac
 * Text Domain:       CGT
 * License:           LGPL-3.0
 * License URI:       https://www.gnu.org/licenses/lgpl-3.0.txt
**/

function adespc_tdms_merignac_render() {
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <meta charset='utf-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <title>Analyse des écarts salariaux par catégorie - TDMS Mérignac</title>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' type='text/css' media='screen' href='adespc-tdms-merignac.css'>
   </head>
   <body>
      <p>
         <label for="salary">Votre brut fiscal (cf. page 1 de votre fiche de paie) : </label>
         <input id="salary" type="number" />
      </p>
      <p>
         <label for="position">Votre position dans la NCCNM : </label>
         <select id="position">
            <option value="ALL">Tout voir</option>
            <option value="C5" >C5</option>
            <option value="C6" >C6</option>
            <option value="D7" >D7</option>
            <option value="D8" >D8</option>
            <option value="E9" >E9</option>
            <option value="E10">E10</option>
            <option value="F11">F11</option>
            <option value="F12">F12</option>
            <option value="G13">G13</option>
            <option value="G14">G14</option>
            <option value="H15">H15</option>
            <option value="H16">H16</option>
         </select>
      </p>
      <img src="adespc-tdms-merignac-bg.png"   id="graph" />
      <div id="line"></div>
      <div id="left-mask"></div>
      <div id="right-mask"></div>
      <script src='adespc-tdms-merignac.js'></script>
   </body>
   </html>
   <?php
}

function adespc_tdms_merignac_activate() {
   // TODO: enregistrer "render" au moyen d'un hook WordPress
}
function adespc_tdms_merignac_deactivate() {}

register_activation_hook( __FILE__, 'adespc_tdms_merignac_activate' );
register_deactivation_hook( __FILE__, 'adespc_tdms_merignac_deactivate' );
?>
