<?php
    $captchaLength = 6;
    $captchaTextDisplay = "";
    $captchaTextInput = "";
    $Characters = array(array(48, 57), array(65, 90), array(97, 122));
    $CharArr;
    $minCharPos;
    $maxCharPos;
    $char;
    // Set the text to be either a number, a lowercase or an uppercase letter
    for ($i = 0; $i < $captchaLength; $i++)
    {
        $CharArr = $Characters[rand(0, count($Characters) - 1)];
        $minCharPos = $CharArr[0];
        $maxCharPos = $CharArr[1];
        $char = chr(rand($minCharPos, $maxCharPos));
        $captchaTextDisplay .= (($i > 0) ? " " : "") . $char;
        $captchaTextInput .= $char; // No spaces in-between
    }
    
    // Put captchaText to session, so I can validate it when user registers
    session_start();
    $_SESSION["Captcha"] = $captchaTextInput;

    // Create the image
    $imageWidth = 110;
    $imageHeight = 30;
    $image = imagecreatetruecolor($imageWidth, $imageHeight);
    // Failed to create image
    if (!$image)
        exit();
    
    $imgBgColor = imagecolorallocate($image, 100, 100, 100);
    // 0 is the default start point
    $imageFill = imagefill($image, 0, 0, $imgBgColor);
    // If image fill failed
    if (!$imageFill)
        exit();
        
    // Image has been created
    // Set the text color
    $textColor = imagecolorallocate($image, 255, 255, 255);
    $fontSize = 3;
    $textCoordX = 17;  
    $textCoordY = 7; 
    // Set the text inside the image
    imagestring($image, $fontSize, $textCoordX, $textCoordY, $captchaTextDisplay, $textColor);
    // Specify the return type
    header("Content-Type: image/png");
    // Add the img to the browser
    imagepng($image);
    // Destroy the image to free up memory
    imagedestroy($image);
?>