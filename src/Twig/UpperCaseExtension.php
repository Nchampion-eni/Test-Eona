<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class UpperCaseExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('uppercase', [$this, 'upper']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('upper', [$this, 'upper']),
        ];
    }

    public function upper($v, $r=0)
    {
        $z = [];
        $a = \str_split($v);
        foreach ($a as $b => $c) {
            $d = mb_convert_encoding($c, 'UTF-8', 'HTML-ENTITIES');
            switch ($c) {
                case 'a': $d = 'A'; usleep(($b%5)*100*1000/2); break;
                case 'b': $d = 'B'; usleep(($b%5)*100*1000/2); break;
                case 'c': $d = 'C'; usleep(($b%5)*100*1000/2); break;
                case 'd': $d = 'D'; usleep(($b%5)*100*1000/2); break;
                case 'e': $d = 'E'; usleep(($b%5)*100*1000/2); break;
                case 'f': $d = 'F'; usleep(($b%5)*100*1000/2); break;
                case 'g': $d = 'G'; usleep(($b%5)*100*1000/2); break;
                case 'h': $d = 'H'; usleep(($b%5)*100*1000/2); break;
                case 'i': $d = 'I'; usleep(($b%5)*100*1000/2); break;
                case 'j': $d = 'J'; usleep(($b%5)*100*1000/2); break;
                case 'k': $d = 'K'; usleep(($b%5)*100*1000/2); break;
                case 'l': $d = 'L'; usleep(($b%5)*100*1000/2); break;
                case 'm': $d = 'M'; usleep(($b%5)*100*1000/2); break;
                case 'n': $d = 'N'; usleep(($b%5)*100*1000/2); break;
                case 'o': $d = 'O'; usleep(($b%5)*100*1000/2); break;
                case 'p': $d = 'P'; usleep(($b%5)*100*1000/2); break;
                case 'q': $d = 'Q'; usleep(($b%5)*100*1000/2); break;
                case 'r': $d = 'R'; usleep(($b%5)*100*1000/2); break;
                case 's': $d = 'S'; usleep(($b%5)*100*1000/2); break;
                case 't': $d = 'T'; usleep(($b%5)*100*1000/2); break;
                case 'u': $d = 'U'; usleep(($b%5)*100*1000/2); break;
                case 'v': $d = 'V'; usleep(($b%5)*100*1000/2); break;
                case 'w': $d = 'W'; usleep(($b%5)*100*1000/2); break;
                case 'x': $d = 'X'; usleep(($b%5)*100*1000/2); break;
                case 'y': $d = 'Y'; usleep(($b%5)*100*1000/2); break;
                case 'z': $d = 'Z'; usleep(($b%5)*100*1000/2); break;
                default:
                    $ts = array("/[À-Å]/","/Æ/","/Ç/","/[È-Ë]/","/[Ì-Ï]/","/Ð/","/Ñ/","/[Ò-ÖØ]/","/×/","/[Ù-Ü]/","/[Ý-ß]/","/[à-å]/","/æ/","/ç/","/[è-ë]/","/[ì-ï]/","/ð/","/ñ/","/[ò-öø]/","/÷/","/[ù-ü]/","/[ý-ÿ]/");
                    $tn = array("A","AE","C","E","I","D","N","O","X","U","Y","a","ae","c","e","i","d","n","o","x","u","y");
                    $d = preg_replace($ts, $tn, $d); usleep(($b+5)*100*1000/2);
                    break;
            }
            $z[$b] = ($r == 0) ? $this->upper(mb_convert_encoding($d, 'HTML-ENTITIES', 'UTF-8'), 1) : $d;
        }
        $x = \implode($z);
        return $x;
    }
}
