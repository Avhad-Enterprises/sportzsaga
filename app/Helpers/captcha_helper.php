<?php

use CodeIgniter\I18n\Time;

function generateCaptcha()
{
    $image = imagecreatetruecolor(120, 40);

    // Background color
    $bgColor = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, 120, 40, $bgColor);

    // Text color
    $textColor = imagecolorallocate($image, 0, 0, 0);

    // Generate random string
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captchaText = '';
    for ($i = 0; $i < 6; $i++) {
        $captchaText .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Store the text in session
    $session = session();
    $session->set('captcha_text', $captchaText);

    // Path to the TTF font file
    $fontPath = FCPATH . 'app/Assets/fonts/arial.ttf';

    // Add text to image
    imagettftext($image, 20, 0, 10, 30, $textColor, $fontPath, $captchaText);

    // Add some noise
    for ($i = 0; $i < 50; $i++) {
        $dotColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
        imagesetpixel($image, rand(0, 120), rand(0, 40), $dotColor);
    }

    // Output the image as PNG
    ob_start();
    imagepng($image);
    $imageData = ob_get_clean();

    imagedestroy($image);

    return base64_encode($imageData);
}
