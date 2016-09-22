<?php
namespace ImgOptimize;

class Client
{
    /** 
     * Main function for image optimization
     * determines, instantiates, and executes appropriate Optimizer
     *  based on image mime type
     * 
     * @param string $img          image to be optimized
     * @param int    $comp_type    Optional Imagick Compression Type Constant
     * @param int    $comp_quality Optional Out of 100 quality rating
     * @return void
     */
    static function optimize($img,$comp_type = null, $comp_quality = null)
    {
        $cls = self::getClsByType($img);
        $Opt = new $cls(realpath($img), $comp_type, $comp_quality);
        $Opt->run();
    }
    
    /**
     * Retrieve appropriate class name to use by file type
     * 
     * @param string $img image file to be optimized
     * @return string class name
     */
    static function getClsByType($img)
    {
        $type   = mime_content_type($img);
        $type   = strtolower(str_replace('image/','',$type));
        if(!in_array($type,['jpeg','jpg','png','gif'])){
            return false;
        }
        return "ImgOptimize\\Optimizers\\" . ucfirst(str_replace('e','',$type)) . 'Optimizer';
    }
    
    /**
     * Get human readable file size
     * ...to visualize compression
     * 
     * @see http://php.net/manual/en/function.filesize.php#106569
     * 
     * @param string  $img Image Path
     * @param integer $decimals Precision for return
     * @return string human readable file size representation
     */
    static function real_filesize($img, $decimals = 2) {
        $bytes  = filesize($img);
        $sz     = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }
}