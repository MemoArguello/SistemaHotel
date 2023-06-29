<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand&family=Roboto+Condensed:wght@300&display=swap');

    * {

        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    :root {
        --azul: #ffffff;
        --azulOscuro: rgb(238, 238, 238);
        --azulGris: #1900ff;
        --blanco: #e6e5e5;
        --negro: rgb(0, 0, 0);
        --fuente: 'Quicksand', sans-serif;
    }

    html {
        box-sizing: border-box;
    }

    *,
    *::after,
    *::before {
        box-sizing: inherit;
    }

    body {
        font-family: var(--fuente);
        background-color: var(--azulOscuro);
        display: flex;
        align-items: center;
        height: 100vh;
    }

    .contenedor {
        margin: 0 auto;
        max-width: 1200px;
        width: 100%;
        justify-content: center;
    }

    .imagen-formulario {
        background-image: url('../Backend/IMG/login.png');
        background-position: center center;
        background-size: cover;
        width: 200px;
        height: 100px;
        flex: 0 0 calc(60%);
        position: relative;
    }

    .imagen-formulario::before {
        content: '';
        position: absolute;
        top: 10;
        bottom: 0;
        left: 0;
        right: 0;

    }

    @media(min-width:768px) {
        .imagen-formulario {
            height: auto;
            background-position: right;
        }

    }

    @media(min-width:1200px) {
        .imagen-formulario {
            background-position: center;
        }
    }

    @media(min-width:768px) {
        .contenedor-formulario {
            display: flex;
        }
    }

    .formulario {
        padding: 100px;
        background-color: var(--azul);
    }

    .texto-formulario .input label,
    .password-olvidada a,
    .texto-formulario p {
        color: var(--negro);
    }

    .texto-formulario h2 {
        color: var(--azulGris)
    }

    .texto-formulario h2 {
        font-size: 40px;
        text-align: center;
    }

    .texto-formulario p {
        font-size: 22px;
        text-align: center;
    }

    .input label {
        display: block;
        font-size: 22px;
        font-weight: bold;
        margin: 10px 0;
    }

    .password-olvidada a {
        display: inline-block;
        margin-top: 20px;
        font-size: 22px;
    }

    .input input {
        width: 100%;
        padding: 10px 16px;
        outline: none;
    }

    .input input[type="submit"] {
        background-color: var(--azulGris);
        color: var(--blanco);
        font-size: 22px;
        font-weight: bold;
        border: none;
        margin-top: 20px;
        transition: background-color .3s ease-in-out;
    }

    .input input[type="submit"]:hover {

        cursor: pointer;
        background-color: var(--azulOscuro);
    }

    .inputContainer {
        position: relative;
        height: 45px;
        width: 90%;
        margin-bottom: 17px;
    }

    .signupFrm {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh;
    }

    .formu2 {
        text-align: center;

    }

    .formu {
        margin: 0px auto;
    }
    /*input */
    .inputContainer {
  position: relative;
  height: 45px;
  width: 90%;
  margin-bottom: 17px;
}

.input {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 100%;
  border: 1px solid #DADCE0;
  border-radius: 7px;
  font-size: 16px;
  padding: 0 20px;
  outline: none;
  background: none;
  z-index: 1;
}

.input2 {
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  border: 1px solid #DADCE0;
  border-radius: 7px;
  font-size: 16px;
  padding: 0 20px;
  outline: none;
  background: none;
  z-index: 1;
}

.label {
  position: absolute;
  top: 15px;
  left: 15px;
  padding: 0 4px;
  background-color: white;
  color: #686767;
  font-size: 16px;
  transition: 0.5s;
  z-index: 0;
}

.input:focus + .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
  color: #1100ff;
}

.input:not(:placeholder-shown) + .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
}

.input:focus {
  border: 2px solid #1100ff;
}
/*botones */
.submitBtn {
  display: block;
  margin-left: auto;
  padding: 15px 30px;
  border: none;
  background-color: #1100ff;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 30px;
}

.submitBtn:hover {
  background-color: #1100ff;
  transform: translateY(-2px);
}
</style>

<body>
    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario"></div>
            <form action="" method="POST" class="formulario">
                <div class="texto-formulario">
                    <h2>HOTEL CONTROLLER</h2>
                    <P>Inicia Sesion con tu cuenta</P>
                </div>
                <div class="inputContainer">
                    <input type="text" name="" id="" class="input">
                    <label for="" class="label">USUARIO:</label>
                </div>
                <div class="inputContainer">
                    <input type="text" name="" id="" class="input">
                    <label for="" class="label">CONTRASEÑA:</label>
                </div>
                <input type="submit" value="INGRESAR" class="submitBtn">
            </form>
    </div>
</body>

</html>