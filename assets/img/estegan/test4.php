<?php
function getBitInMessage($message, $position)
{
    $char = $message[(int) floor($position / 8)];
    $bitMask = 1 << (7 - ($position % 8));
    if ($char & $bitMask) {
        return 1;
    }
    return 0;
}

function getBit($byte, $position)
{
    return ($byte & pow(2, $position)) >> $position;
}

function setBit($byte, $position, $value)
{
    if (1 === $value) {
        $byte |= 1 << $position;
    } else {
        $byte &= ~(1 << $position);
    }
    return $byte;
}

function getRgbPixel($image, $x, $y) {
    $rgb = imagecolorat($image, $x, $y);
    return [
        'r' => ($rgb >> 16) & 0xFF,
        'g' => ($rgb >> 8) & 0xFF,
        'b' => $rgb & 0xFF
    ];
}

function getDistribution($imagePath)
{
    $image = imagecreatefrompng($imagePath);
    $width = imagesx($image);
    $height = imagesy($image);
    $stats = [
        0 => 0,
        1 => 0
    ];
    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {
            $rgb = getRgbPixel($image, $x, $y);
            $stats[getBit($rgb['r'], 0)]++;
            $stats[getBit($rgb['g'], 0)]++;
            $stats[getBit($rgb['b'], 0)]++;
        }
    }
    // percent
    $total = ($width * $height) * 3;
    $stats[0] = ($stats[0] * 100) / $total;
    $stats[1] = ($stats[1] * 100) / $total;
    return $stats;
}
var_dump(getDistribution(__DIR__ . '/monalisa_7.png'), getDistribution(__DIR__ . '/output.png'));

$image = imagecreatefrompng(__DIR__ . '/output.png');
$message = '';
$width = imagesx($image);
$height = imagesy($image);
$bitPosition = 0;
$byte = 0;
for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
        $rgb = getRgbPixel($image, $x, $y);
        // red channel
        $byte = setBit($byte, 7 - $bitPosition, getBit($rgb['r'], 0));
        $bitPosition++;
        if (8 === $bitPosition) {
            $bitPosition = 0;
            if (0 === $byte) {
                break 2;
            }
            $message .= chr($byte);
        }
        // green channel
        $byte = setBit($byte, 7 - $bitPosition, getBit($rgb['g'], 0));
        $bitPosition++;
        if (8 === $bitPosition) {
            $bitPosition = 0;
            if (0 === $byte) {
                break 2;
            }
            $message .= chr($byte);
        }
        // blue channel
        $byte = setBit($byte, 7 - $bitPosition, getBit($rgb['b'], 0));
        $bitPosition++;
        if (8 === $bitPosition) {
            $bitPosition = 0;
            if (0 === $byte) {
                break 2;
            }
            $message .= chr($byte);
        }
    }
}
echo $message . PHP_EOL;

$image = imagecreatefrompng(__DIR__ . '/monalisa_7.png');
$message = <<<TEXT
The Three Laws of Robotics (often shortened to The Three Laws or Three Laws, also known as Asimov's Laws) are a set of rules devised by the science fiction author Isaac Asimov. The rules were introduced in his 1942 short story "Runaround", although they had been foreshadowed in a few earlier stories. The Three Laws are:
1. A robot may not injure a human being or, through inaction, allow a human being to come to harm.
2. A robot must obey the orders given it by human beings, except where such orders would conflict with the First Law.
3. A robot must protect its own existence as long as such protection does not conflict with the First or Second Law.
TEXT;
$message = array_values(unpack('C*char', $message . "\0"));
$messagePosition = 0;
$messageBitLength = count($message) * 8;
$width = imagesx($image);
$height = imagesy($image);
for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
        $rgb = getRgbPixel($image, $x, $y);
        if ($messagePosition < $messageBitLength) {
            // red channel
            $rgb['r'] = setBit($rgb['r'], 0, getBitInMessage($message, $messagePosition));
            $messagePosition++;
            if ($messagePosition < $messageBitLength) {
                // green channel
                $rgb['g'] = setBit($rgb['g'], 0, getBitInMessage($message, $messagePosition));
                $messagePosition++;
                if ($messagePosition < $messageBitLength) {
                    // blue channel
                    $rgb['b'] = setBit($rgb['b'], 0, getBitInMessage($message, $messagePosition));
                    $messagePosition++;
                }
            }
        }
        $color = imagecolorallocate($image, $rgb['r'], $rgb['g'], $rgb['b']);
        //$color = imagecolorallocate($image, 255,255,255);
        imagesetpixel($image, $x, $y, $color);
        imagecolordeallocate($image, $color);
        if ($messagePosition >= $messageBitLength) {
            break 2;
        }
    }
}
imagepng($image, __DIR__ . '/output.png');
?>