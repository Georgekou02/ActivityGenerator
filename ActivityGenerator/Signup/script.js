CaptchaImg = document.getElementById("CaptchaImg");

function ChangeCaptcha()
{
    // Changes the captcha display text, input text and sets the session for captcha to the new captchaInputText
    CaptchaImg.src = "Captcha/generateCaptcha.php";
}