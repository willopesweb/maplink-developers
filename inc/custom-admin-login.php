<?php

function my_login_logo_url()
{
  return get_bloginfo('url');
}
add_filter('login_headerurl', 'my_login_logo_url');


function my_login_logo_url_title()
{
  return 'Voltar para Página Inicial';
}
add_filter('login_headertext', 'my_login_logo_url_title');

function theme_custom_login_logo()
{
  echo '<style type="text/css">
  @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap");
  :root{
    --login-background-color: #1c1c1c;
    --login-font-family: "Outfit", sans-serif;
    --button-background-color: #4b007f;
    --button-hover-color: #ff6700;
    --button-font-color: #fff;
  }

  h1 a {
    background-image: url(' . get_stylesheet_directory_uri() . '/' . ASSETS_DIR . '/img/logo.svg) !important;
    background-size: contain !important;
    height: 72px !important;   
    margin-bottom: 20px !important;
    padding-bottom: 0 !important;
    width: 320px !important;
  }

  .login form {
    margin-top: 10px !important;
  }

  body.login {
    background-color: var(--login-background-color);
  }

  .login label,
  .login input,
  .login #nav,
  .login #backtoblog {
    font-family: var(--login-font-family) !important;
    color: #f2f2f2 !important;
  }

  .login input[type="text"],
  .login input[type="password"] {
    background-color: rgba(255,255,255,0.07) !important;
    border: 1px solid rgba(255,255,255,0.15) !important;
    border-radius: 0.5rem !important;
    color: #f2f2f2 !important;
  }

  .button {
    border: none !important;
    border-radius: 9999px;
    cursor: pointer;
    font-family: var(--login-font-family);
    font-size: 1rem;
    font-weight: 700;
    outline: 0;
    padding: 0.625rem 1.5625rem;
    text-align: center;
    text-transform: uppercase;
    transition: 300ms ease all;
    -webkit-appearance: none !important;
  }

  .button:focus,
  .button:active {
    border: none !important;
    box-shadow: none;
    outline: 2px solid var(--button-background-color);
  }

  .button-primary {
    background-color: var(--button-background-color) !important;
    color: var(--button-font-color);
  }

  .button-primary:hover {
    background-color: var(--button-hover-color) !important;
  }
</style>';
}

add_action('login_head', 'theme_custom_login_logo');
