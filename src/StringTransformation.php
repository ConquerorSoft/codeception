<?php

namespace conquerorsoft\coception;

class StringTransformation
{
    protected const ALPHA_DECODED = "abcdefghijklmnopqrstuvwxyz ";
    protected const ENCODED = ['å','Å','ç','ı','´','ƒ','©','˙','ˆ','Ç','˚','¬','µ','˜','ø','π','œ','®','ß','Î','¨','¡','Ï','Ó','¥','Ω','  '];
    
    public function encode(string $string): string
    {
        $string_to_return = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $pos = strpos(self::ALPHA_DECODED, $string[$i]);
            $string_to_return .= self::ENCODED[$pos];
        }
        return $string_to_return;
    }
    
    public function decode(string $string): string
    {
        $string_to_return = "";
        for ($i = 0; $i < strlen($string); $i += 2) {
            $pos = array_search(substr($string, $i, 2), self::ENCODED);
            $string_to_return .= self::ALPHA_DECODED[$pos];
        }
        return $string_to_return;
    }
}
