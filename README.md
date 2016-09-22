# ImgOptimize
Simple PHP package to optimize images. Requires Image Magick. Compresses and strips metadata.
For gifs, removes transparent layers if any exist
### Usage:
---
```PHP
require_once('ImgOptimize/index.php');
$img = 'path/to/file.jpg';

echo 'Size Before Compression: ' . ImgOptimizeClient::real_filesize($img);

ImgOptimize\Client::optimize($img);

sleep(5);

echo 'Size After Compression: '  .  ImgOptimizeClient::real_filesize($img);
```
---
