<?php
namespace ImgOptimize\Optimizers;

class JpgOptimizer extends OptimizerAbstract
{
   /**
    * Imagick Compression Type Constant
    *
    * @var integer
    */
    private $compression_type = \Imagick::COMPRESSION_LOSSLESSJPEG;

   /**
    * Out of 100 Image Quality ratio
    *
    * @var integer
    */
    private $compression_quality = 65;

    /**
     * Initialize Imagick in parent and update $compression options if present
     *
     * @param string  $img          realpath to image
     * @param integer $comp_type    Imagick Compression Type Constant
     * @param integer $comp_quality Out of 100 Image Quality ratio
     */
    public function __construct($img, $comp_type = null, $comp_quality = null)
    {
        parent::__construct( $img );
        if($comp_type !== null)    $this->compression_type    = $comp_type;
        if($comp_quality !== null) $this->compression_quality = $comp_quality;
    }

    /**
     * Execute Optimization
     *
     * @return void
     */
    public function run()
    {
        $this->optimize( $this->compression_type, $this->compression_quality );
    }
}
