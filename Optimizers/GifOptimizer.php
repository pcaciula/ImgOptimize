<?php
namespace ImgOptimize\Optimizers;

class GifOptimizer extends OptimizerAbstract
{
  /**
   * Initialize Imagick in parent and update $compression options if present
   *
   * $Comp_quality & $Comp_type always null - unused for compatibility w/other
   *  optimizers
   *
   * @param string  $img          realpath to image
   * @param integer $comp_type    Imagick Compression Type Constant
   * @param integer $comp_quality Out of 100 Image Quality ratio
   */
    public function __construct($img, $comp_type = null, $comp_quality = null)
    {
        parent::__construct($img);
    }

   /**
    * Execute Optimization
    *
    * @return void
    */
    public function run()
    {
        $this->IM->optimizeImageLayers();
        $this->IM->stripImage();
        $this->save();
    }
}
