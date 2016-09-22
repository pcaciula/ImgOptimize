<?php
namespace ImgOptimize\Optimizers;

abstract class OptimizerAbstract
{
    /**
     * $img - realpath to image
     *
     * @var string
     */
    protected $img;

    /**
     * $IM - instantiated Imagick Object
     * @var object
     */
    protected $IM;

    /**
     * Main fn to be called on descendants to
     *  run optimization
     */
    abstract public function run();

    /**
     * __construct
     *
     * @param string $img realpath to image
     */
    function __construct($img)
    {
        $this->img = $img;
        $this->IM  = new \Imagick($img);
    }

    /**
     * Main optimization fn for JPGs and PNGs
     *
     * @param  integer $compression_type    Imagick Compression Constant
     * @param  integer $compression_quality Quality Ration out of 100
     * @return void
     */
    function optimize($compression_type, $compression_quality)
    {
        $this->IM->setImageCompression($compression_type);
        $this->IM->setImageCompressionQuality($compression_quality);
        $this->IM->stripImage();
        $this->save();
    }

    /**
     * Resave and overwrite optimized image
     *
     * @return void
     */
    function save()
    {
        $this->IM->writeImages($this->img,true);
    }
}
