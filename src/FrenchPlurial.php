<?php
class FrenchPlurial{

  public static function convert($fullStr){
    $strings = explode(' ',$fullStr);
    $plurals = [];
    foreach($strings as $key => $value){
      $str = $value;
      // http://grammaire.reverso.net/5_5_01_pluriel_des_noms_et_des_adjectifs.shtml
      // If pluriel is not initialized
      $pluriel = '';

      $last_letter =    substr($str,  -1); // Last letter of str
      $last_2_letters = substr($str,  -2); // Last 2 letters of str
      $last_3_letters = substr($str,  -3); // Last 3 letters of str

      // exception for /s/z/x
      if ($last_letter === 's' || $last_letter === 'z' || $last_letter === 'x') {
        $pluriel = $str;
      }
      // Exception for /eau/au/eu
      else if ($last_2_letters === 'au' || $last_2_letters === 'eu') {
        //Les mots de la liste suivante font exception à cette règle et prennent un s au pluriel : bleu, émeu, landau, lieu « poisson », pneu, sarrau
        switch ($str) {
          case 'bleu':
          case 'émeu':
          case 'landau':
          case 'pneu':
          case 'sarrau':
            $pluriel = $str.'s';
            break;
          default:
            $pluriel = $str.'x';
        }

      }
      else if ($last_2_letters === 'ou') {
        switch ($str) {
          case 'bijou':
          case 'chou':
          case 'genou':
          case 'caillou':
          case 'hibou':
          case 'joujou':
          case 'pou':
          case 'ripou':
          case 'chouchou':
          case 'boutchou':
            $pluriel = $str.'x';
            break;
          default:
            $pluriel = $str.'s';
        }
      }
      else if ($last_3_letters === 'ail') {
        switch ($str) {
          case 'bail':
          case 'corail':
          case 'émail':
          case 'gemmail':
          case 'soupirail':
          case 'travail':
          case 'vantail':
          case 'vitrail':
            $radical = substr($str, 0, -3);
            $pluriel = $radical.'aux';
            break;
          case 'ail':
            $pluriel = 'aulx';
            break;
          default:
            $pluriel = $str.'s';
        }

      }
      else if ($last_2_letters === 'al') {
        switch ($str) {
          case 'aval':
          case 'bal':
          case 'banal':
          case 'bancal':
          case 'cal':
          case 'carnaval':
          case 'cérémonial':
          case 'choral':
          case 'étal':
          case 'fatal':
          case 'festival':
          case 'natal':
          case 'naval':
          case 'pal':
          case 'récital':
          case 'régal':
          case 'tonal':
          case 'val':
          case 'virginal':
            $pluriel = $str.'s';
            break;
          default:
            $radical = substr($str, 0, -2);
            $pluriel = $radical.'aux';
        }
      }
      else if ($last_2_letters === 'il' && ($str === 'oeil' || $str === 'œil')) {
        $pluriel = 'yeux';
      }
      else {
        $pluriel = $str.'s';
      }
      array_push($plurals, $pluriel);
    }

  $pluriel = implode(" ", $plurals);;
  return ($pluriel);
}
}
