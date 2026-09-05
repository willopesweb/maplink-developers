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
  .login input[type="password"],
  .login input[type="email"] {
    background-color: #2a2a2a !important;
    border: 1px solid rgba(255,255,255,0.25) !important;
    border-radius: 0.5rem !important;
    color: #f2f2f2 !important;
    box-shadow: none !important;
  }

  .login input[type="text"]::placeholder,
  .login input[type="password"]::placeholder,
  .login input[type="email"]::placeholder {
    color: rgba(242,242,242,0.45) !important;
  }

  .login input[type="text"]:focus,
  .login input[type="password"]:focus,
  .login input[type="email"]:focus {
    border-color: #a74ff3 !important;
    outline: none !important;
    box-shadow: 0 0 0 2px rgba(167,79,243,0.25) !important;
  }

  /* neutraliza autofill do browser que força fundo claro */
  .login input:-webkit-autofill,
  .login input:-webkit-autofill:hover,
  .login input:-webkit-autofill:focus {
    -webkit-text-fill-color: #f2f2f2 !important;
    -webkit-box-shadow: 0 0 0 1000px #2a2a2a inset !important;
    transition: background-color 5000s ease-in-out 0s;
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

  /* container do formulário */
  .login #loginform,
  .login #lostpasswordform,
  .login #registerform {
    background-color: #242424 !important;
    border: 1px solid rgba(255,255,255,0.1) !important;
    border-radius: 0.75rem !important;
    box-shadow: 0 8px 32px rgba(0,0,0,0.4) !important;
  }

  /* checkbox "lembrar-me" */
  .login .forgetmenot label {
    color: rgba(242,242,242,0.75) !important;
  }

  /* links de rodapé */
  .login #nav a,
  .login #backtoblog a {
    color: #c4a8e8 !important;
  }

  .login #nav a:hover,
  .login #backtoblog a:hover {
    color: #a74ff3 !important;
  }

  /* mensagens de erro e aviso */
  .login #login_error,
  .login .message,
  .login .success {
    background-color: #2a2a2a !important;
    border-left-color: #ff6700 !important;
    color: #f2f2f2 !important;
  }

  .login #login_error {
    border-left-color: #e05252 !important;
  }

  .login .success {
    border-left-color: #4caf7d !important;
  }
</style>';
}

add_action('login_head', 'theme_custom_login_logo');
